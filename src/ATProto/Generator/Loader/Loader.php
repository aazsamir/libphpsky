<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Loader;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BlobDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BooleanDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BytesDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\CidLinkDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\IOData;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Message;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ParamsDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\RecordDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\SubscriptionDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\TokenDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\UnknownDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\LexiconType;

class Loader
{
    public function load(string $path): Lexicons
    {
        $path = realpath($path);

        if ($path === false) {
            throw new \Exception(\sprintf('Path %s is not a directory', $path));
        }

        $files = $this->lexiconsInPath($path);
        $lexicons = [];

        foreach ($files as $file) {
            $lexicon = $this->makeLexicon($file);
            $lexicons[] = $lexicon;
        }

        return new Lexicons($lexicons);
    }

    /**
     * @return string[]
     */
    private function lexiconsInPath(string $path): array
    {
        $it = new \RecursiveDirectoryIterator($path);
        $it = new \RecursiveIteratorIterator($it);

        $files = [];

        foreach ($it as $file) {
            /** @var \SplFileInfo $file */
            if ($file->getExtension() === 'json') {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    private function makeLexicon(string $file): Lexicon
    {
        $filecontent = file_get_contents($file);

        if ($filecontent === false) {
            throw new \Exception(\sprintf('Error while reading %s', $file));
        }

        /**
         * @var array{
         *  lexicon: ?int,
         *  id: ?string,
         *  revision?: int,
         *  description?: ?string,
         *  defs: ?array<string, array<string, mixed>>
         * }|null
         */
        $data = json_decode($filecontent, true);

        if (!\is_array($data)) {
            throw new \Exception(\sprintf('Error while decoding %s', $file));
        }

        if (!\is_int($data['lexicon'])) {
            throw new \Exception(\sprintf('Lexicon name must be a string in %s', $file));
        }

        if (!\is_string($data['id'])) {
            throw new \Exception(\sprintf('Lexicon id must be a string in %s', $file));
        }

        if (!\is_array($data['defs'])) {
            throw new \Exception(\sprintf('Defs must be an array in %s', $file));
        }

        $lexicon = new Lexicon(
            lexicon: $data['lexicon'],
            id: $data['id'],
            revision: $data['revision'] ?? null,
            description: $data['description'] ?? null,
        );
        $lexicon->setDefs($this->makeDefs($data['defs'], $lexicon));

        return $lexicon;
    }

    /**
     * @param array<string, mixed> $defs
     */
    private function makeDefs(array $defs, Lexicon $lexicon): Defs
    {
        $result = [];

        foreach ($defs as $name => $def) {
            $this->assertArrayMap($def);
            $result[] = $this->makeDef($name, $def, $lexicon);
        }

        return new Defs($result);
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeDef(string $name, array $def, Lexicon $lexicon): Def
    {
        if (!isset($def['type']) || !\is_string($def['type'])) {
            throw new \Exception(\sprintf('Type is required for def %s', $name));
        }

        $type = LexiconType::from($def['type']);

        return match ($type) {
            LexiconType::BOOLEAN => $this->makeBooleanDef($name, $def, $lexicon),
            LexiconType::INTEGER => $this->makeIntegerDef($name, $def, $lexicon),
            LexiconType::STRING => $this->makeStringDef($name, $def, $lexicon),
            LexiconType::BYTES => $this->makeBytesDef($name, $def, $lexicon),
            LexiconType::CID_LINK => $this->makeCidLinkDef($name, $def, $lexicon),
            LexiconType::BLOB => $this->makeBlobDef($name, $def, $lexicon),
            LexiconType::ARRAY => $this->makeArrayDef($name, $def, $lexicon),
            LexiconType::OBJECT => $this->makeObjectDef($name, $def, $lexicon),
            LexiconType::PARAMS => $this->makeParamsDef($name, $def, $lexicon),
            LexiconType::TOKEN => $this->makeTokenDef($name, $def, $lexicon),
            LexiconType::REF => $this->makeRefDef($name, $def, $lexicon),
            LexiconType::UNION => $this->makeUnionDef($name, $def, $lexicon),
            LexiconType::RECORD => $this->makeRecordDef($name, $def, $lexicon),
            LexiconType::QUERY => $this->makeQueryDef($name, $def, $lexicon),
            LexiconType::PROCEDURE => $this->makeProcedureDef($name, $def, $lexicon),
            LexiconType::SUBSCRIPTION => $this->makeSubscriptionDef($name, $def, $lexicon),
            LexiconType::UNKNOWN => new UnknownDef($name, $lexicon),
            LexiconType::NULL => throw new \Exception('Null type is not allowed?'),
        };
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeBooleanDef(string $name, array $def, Lexicon $lexicon): BooleanDef
    {
        $default = $def['default'] ?? null;
        $const = $def['const'] ?? null;

        if (
            $default !== null
            && !\is_bool($default)
        ) {
            throw new \Exception(\sprintf('Default must be a boolean for def %s', $name));
        }

        if ($const !== null && !\is_bool($const)) {
            throw new \Exception(\sprintf('Const must be a boolean for def %s', $name));
        }

        return new BooleanDef(
            name: $name,
            lexicon: $lexicon,
            default: $default,
            const: $const,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeIntegerDef(string $name, array $def, Lexicon $lexicon): IntegerDef
    {
        $minimum = $def['minimum'] ?? null;
        $maximum = $def['maximum'] ?? null;
        $enum = $def['enum'] ?? null;
        $default = $def['default'] ?? null;
        $const = $def['const'] ?? null;

        if ($minimum !== null && !\is_int($minimum)) {
            throw new \Exception(\sprintf('Minimum must be an integer for def %s', $name));
        }
        if ($maximum !== null && !\is_int($maximum)) {
            throw new \Exception(\sprintf('Maximum must be an integer for def %s', $name));
        }
        if ($enum !== null) {
            $this->assertArrayMap($enum);

            throw new \Exception(\sprintf('Enum must be an array for def %s', $name));
        }
        if ($default !== null && !\is_int($default)) {
            throw new \Exception(\sprintf('Default must be an integer for def %s', $name));
        }
        if ($const !== null && !\is_int($const)) {
            throw new \Exception(\sprintf('Const must be an integer for def %s', $name));
        }

        return new IntegerDef(
            name: $name,
            lexicon: $lexicon,
            minimum: $minimum,
            maximum: $maximum,
            enum: $enum,
            default: $default,
            const: $const,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeStringDef(string $name, array $def, Lexicon $lexicon): StringDef
    {
        $format = $def['format'] ?? null;
        $maxLength = $def['maxLength'] ?? null;
        $minLength = $def['minLength'] ?? null;
        $maxGraphenes = $def['maxGraphenes'] ?? null;
        $minGraphenes = $def['minGraphenes'] ?? null;
        $knownValues = $def['knownValues'] ?? null;
        $enum = $def['enum'] ?? null;
        $default = $def['default'] ?? null;
        $const = $def['const'] ?? null;

        if ($format !== null && !\is_string($format)) {
            throw new \Exception(\sprintf('Format must be a string for def %s', $name));
        }
        if ($maxLength !== null && !\is_int($maxLength)) {
            throw new \Exception(\sprintf('MaxLength must be an integer for def %s', $name));
        }
        if ($minLength !== null && !\is_int($minLength)) {
            throw new \Exception(\sprintf('MinLength must be an integer for def %s', $name));
        }
        if ($maxGraphenes !== null && !\is_int($maxGraphenes)) {
            throw new \Exception(\sprintf('MaxGraphenes must be an integer for def %s', $name));
        }
        if ($minGraphenes !== null && !\is_int($minGraphenes)) {
            throw new \Exception(\sprintf('MinGraphenes must be an integer for def %s', $name));
        }
        if ($knownValues !== null) {
            $this->assertStrings($knownValues);
        }
        if ($enum !== null) {
            $this->assertStrings($enum);
        }
        if ($default !== null && !\is_string($default)) {
            throw new \Exception(\sprintf('Default must be a string for def %s', $name));
        }
        if ($const !== null && !\is_string($const)) {
            throw new \Exception(\sprintf('Const must be a string for def %s', $name));
        }

        return new StringDef(
            name: $name,
            lexicon: $lexicon,
            format: $format,
            maxLength: $maxLength,
            minLength: $minLength,
            maxGraphenes: $maxGraphenes,
            minGraphenes: $minGraphenes,
            knownValues: $knownValues,
            enum: $enum,
            default: $default,
            const: $const,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeBytesDef(string $name, array $def, Lexicon $lexicon): BytesDef
    {
        $maxLength = $def['maxLength'] ?? null;
        $minLength = $def['minLength'] ?? null;

        if ($maxLength !== null && !\is_int($maxLength)) {
            throw new \Exception(\sprintf('MaxLength must be an integer for def %s', $name));
        }
        if ($minLength !== null && !\is_int($minLength)) {
            throw new \Exception(\sprintf('MinLength must be an integer for def %s', $name));
        }

        return new BytesDef(
            name: $name,
            lexicon: $lexicon,
            maxLength: $maxLength,
            minLength: $minLength,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeCidLinkDef(string $name, array $def, Lexicon $lexicon): CidLinkDef
    {
        return new CidLinkDef(
            name: $name,
            lexicon: $lexicon,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeBlobDef(string $name, array $def, Lexicon $lexicon): BlobDef
    {
        $accept = $def['accept'] ?? null;
        $maxSize = $def['maxSize'] ?? null;

        if ($accept !== null && !\is_array($accept)) {
            throw new \Exception(\sprintf('Accept must be a string for def %s', $name));
        }
        if ($maxSize !== null && !\is_int($maxSize)) {
            throw new \Exception(\sprintf('MaxSize must be an integer for def %s', $name));
        }

        return new BlobDef(
            name: $name,
            lexicon: $lexicon,
            accept: $accept,
            maxSize: $maxSize,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeArrayDef(string $name, array $def, Lexicon $lexicon): ArrayDef
    {
        $items = $def['items'] ?? null;
        $minLength = $def['minLength'] ?? null;
        $maxLength = $def['maxLength'] ?? null;

        if (!\is_array($items)) {
            throw new \Exception(\sprintf('Items is required for def %s', $name));
        }
        $this->assertArrayMap($items);
        if ($minLength !== null && !\is_int($minLength)) {
            throw new \Exception(\sprintf('MinLength must be an integer for def %s', $name));
        }
        if ($maxLength !== null && !\is_int($maxLength)) {
            throw new \Exception(\sprintf('MaxLength must be an integer for def %s', $name));
        }

        return new ArrayDef(
            name: $name,
            lexicon: $lexicon,
            items: $this->makeDef($name . 'Item', $items, $lexicon),
            minLength: $minLength,
            maxLength: $maxLength,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeObjectDef(string $name, array $def, Lexicon $lexicon): ObjectDef
    {
        $properties = $def['properties'] ?? null;
        $required = $def['required'] ?? null;
        $nullable = $def['nullable'] ?? null;

        if (!\is_array($properties)) {
            throw new \Exception(\sprintf('Properties is required for def %s', $name));
        }
        $this->assertArrayMap($properties);
        if ($required !== null) {
            $this->assertStrings($required);
        }
        if ($nullable !== null) {
            $this->assertStrings($nullable);
        }

        return new ObjectDef(
            name: $name,
            lexicon: $lexicon,
            properties: $this->makeDefs($properties, $lexicon),
            required: $required,
            nullable: $nullable,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeParamsDef(string $name, array $def, Lexicon $lexicon): ParamsDef
    {
        $properties = $def['properties'] ?? null;
        $required = $def['required'] ?? null;

        if (!\is_array($properties)) {
            throw new \Exception(\sprintf('Properties is required for def %s', $name));
        }
        $this->assertArrayMap($properties);
        if ($required !== null) {
            $this->assertStrings($required);
        }

        return new ParamsDef(
            name: $name,
            lexicon: $lexicon,
            properties: $this->makeDefs($properties, $lexicon),
            required: $required ?? null,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeTokenDef(string $name, array $def, Lexicon $lexicon): TokenDef
    {
        return new TokenDef(
            name: $name,
            lexicon: $lexicon,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeRefDef(string $name, array $def, Lexicon $lexicon): RefDef
    {
        $ref = $def['ref'] ?? null;

        if (!\is_string($ref)) {
            throw new \Exception(\sprintf('Ref is required for def %s', $name));
        }

        return new RefDef(
            name: $name,
            lexicon: $lexicon,
            ref: $ref,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeUnionDef(string $name, array $def, Lexicon $lexicon): UnionDef
    {
        $refs = $def['refs'] ?? null;
        $closed = $def['closed'] ?? null;

        if (!\is_array($refs)) {
            throw new \Exception(\sprintf('Refs is required for def %s', $name));
        }
        if ($closed !== null && !\is_bool($closed)) {
            throw new \Exception(\sprintf('Closed must be a boolean for def %s', $name));
        }

        $this->assertStrings($refs);

        return new UnionDef(
            name: $name,
            lexicon: $lexicon,
            refs: $refs,
            closed: $closed,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeRecordDef(string $name, array $def, Lexicon $lexicon): RecordDef
    {
        $key = $def['key'] ?? null;
        $record = $def['record'] ?? null;
        $description = $def['description'] ?? null;

        if (!\is_string($key)) {
            throw new \Exception(\sprintf('Key is required for def %s', $name));
        }
        if (!\is_array($record)) {
            throw new \Exception(\sprintf('Record is required for def %s', $name));
        }
        $this->assertArrayMap($record);
        if (
            $description !== null
            && !\is_string($description)
        ) {
            throw new \Exception('Description must be a string or null');
        }

        return new RecordDef(
            name: $name,
            lexicon: $lexicon,
            key: $key,
            record: $this->makeObjectDef($name . 'Record', $record, $lexicon),
            description: $description,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeQueryDef(string $name, array $def, Lexicon $lexicon): QueryDef
    {
        $output = $def['output'] ?? null;
        $parameters = $def['parameters'] ?? null;
        $description = $def['description'] ?? null;

        if ($output !== null) {
            if (!\is_array($output)) {
                throw new \Exception('Output must be an array');
            }

            $this->assertArrayMap($output);

            $output = $this->makeIOData($output, false, $lexicon);
        }

        if ($parameters !== null) {
            if (!\is_array($parameters)) {
                throw new \Exception('Parameters must be an array');
            }

            $this->assertArrayMap($parameters);

            $parameters = $this->makeParamsDef($name, $parameters, $lexicon);
        }

        if (
            $description !== null
            && !\is_string($description)
        ) {
            throw new \Exception('Description must be a string or null');
        }

        return new QueryDef(
            name: $name,
            lexicon: $lexicon,
            parameters: $parameters,
            output: $output,
            description: $description,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeIOData(array $def, bool $input, Lexicon $lexicon): IOData
    {
        $name = $input ? 'input' : 'output';
        $schema = $def['schema'] ?? null;
        $encoding = $def['encoding'] ?? null;
        $description = $def['description'] ?? null;

        if ($schema !== null) {
            if (!\is_array($schema)) {
                throw new \Exception('Schema must be an array');
            }

            $this->assertArrayMap($schema);

            $schema = $this->makeDef($name, $schema, $lexicon);
        }

        if (!\is_string($encoding)) {
            throw new \Exception('Encoding must be a string');
        }

        if (
            $description !== null
            && !\is_string($description)
        ) {
            throw new \Exception('Description must be a string or null');
        }

        return new IOData(
            encoding: $encoding,
            description: $description,
            schema: $schema,
        );
    }

    /**
     * @param array<string, mixed> $def
     */
    private function makeProcedureDef(string $name, array $def, Lexicon $lexicon): ProcedureDef
    {
        $parameters = $def['parameters'] ?? null;
        $output = $def['output'] ?? null;
        $input = $def['input'] ?? null;
        $description = $def['description'] ?? null;

        if ($parameters !== null) {
            if (!\is_array($parameters)) {
                throw new \Exception('Parameters must be an array');
            }

            $this->assertArrayMap($parameters);

            $parameters = $this->makeParamsDef($name, $parameters, $lexicon);
        }

        if ($output !== null) {
            if (!\is_array($output)) {
                throw new \Exception('Output must be an array');
            }

            $this->assertArrayMap($output);

            $output = $this->makeIOData($output, false, $lexicon);
        }

        if ($input !== null) {
            if (!\is_array($input)) {
                throw new \Exception('Input must be an array');
            }

            $this->assertArrayMap($input);

            $input = $this->makeIOData($input, true, $lexicon);
        }

        if (
            $description !== null
            && !\is_string($description)
        ) {
            throw new \Exception('Description must be a string or null');
        }

        return new ProcedureDef(
            name: $name,
            lexicon: $lexicon,
            parameters: $parameters,
            output: $output,
            input: $input,
            description: $description,
        );
    }

    /**
     * @param array<mixed> $def
     */
    private function makeSubscriptionDef(string $name, array $def, Lexicon $lexicon): SubscriptionDef
    {
        $message = $def['message'] ?? null;
        $parameters = $def['parameters'] ?? null;
        $description = $def['description'] ?? null;

        if ($message !== null) {
            if (!\is_array($message)) {
                throw new \Exception('Message must be an array');
            }

            $this->assertArrayMap($message);

            $message = $this->makeMessage($message, $lexicon);
        }

        if (!\is_array($parameters)) {
            throw new \Exception('Parameters must be an array');
        }
        $this->assertArrayMap($parameters);

        if (
            $description !== null
            && !\is_string($description)
        ) {
            throw new \Exception('Description must be a string or null');
        }

        return new SubscriptionDef(
            name: $name,
            lexicon: $lexicon,
            parameters: $this->makeParamsDef($name, $parameters, $lexicon),
            message: $message,
            description: $description,
        );
    }

    /**
     * @param array<mixed> $def
     */
    private function makeMessage(array $def, Lexicon $lexicon): Message
    {
        $schema = $def['schema'] ?? null;
        $description = $def['description'] ?? null;

        if (!\is_array($schema)) {
            throw new \Exception('Schema is required');
        }

        $this->assertArrayMap($schema);

        if (
            $description !== null
            && !\is_string($description)
        ) {
            throw new \Exception('Description must be a string or null');
        }

        return new Message(
            schema: $this->makeUnionDef('noname', $schema, $lexicon),
            description: $description ?? null,
        );
    }

    /**
     * @phpstan-assert array<string, mixed> $array
     */
    private function assertArrayMap(mixed $array): void
    {
        if (!\is_array($array)) {
            throw new \Exception('Must be an array');
        }

        foreach ($array as $key => $_) {
            if (!\is_string($key)) {
                throw new \Exception('Keys must be strings');
            }
        }
    }

    /**
     * @phpstan-assert string[] $array
     */
    private function assertStrings(mixed $array): void
    {
        if (!\is_array($array)) {
            throw new \Exception('Must be an array');
        }

        foreach ($array as $value) {
            if (!\is_string($value)) {
                throw new \Exception('Values must be strings');
            }
        }
    }
}

<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\UploadBlob;

/**
 * Upload a new blob, to be referenced from a repository record. The blob will be deleted if it is not referenced within a time window (eg, minutes). Blob restrictions (mimetype, size, etc) are enforced when the reference is created. Requires auth, implemented by PDS.
 * procedure
 */
class UploadBlob implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.uploadBlob';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\UploadBlob\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}

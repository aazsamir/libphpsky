# Model

Libphpsky data model is fully generated from the AT Protocol definition. Let's take a look at the generation process.

## Generation

Generated classes are located in the `Aazsamir\Libphpsky\Model` namespace.

Given the following AT Protocol definition:

```json
{
  "lexicon": 1,
  "id": "com.atproto.identity.resolveHandle",
  "defs": {
    "main": {
      "type": "query",
      "description": "Resolves a handle (domain name) to a DID.",
      "parameters": {
        "type": "params",
        "required": ["handle"],
        "properties": {
          "handle": {
            "type": "string",
            "format": "handle",
            "description": "The handle to resolve."
          }
        }
      },
      "output": {
        "encoding": "application/json",
        "schema": {
          "type": "object",
          "required": ["did"],
          "properties": {
            "did": { "type": "string", "format": "did" }
          }
        }
      }
    }
  }
}
```
Let's look at the resulting class:

```php
<?php

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle;

/**
 * Resolves a handle (domain name) to a DID.
 * query
 */
class ResolveHandle implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.resolveHandle';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $handle): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
```

First, `id` equals `com.atproto.identity.resolveHandle`.

It corresponds to the `Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle` namespace.

By convention, the `main` object is the default method of lexicon, so the class is named `ResolveHandle`.

It is of type `query`, so generated class has a `query` method.

It has a single property `handle`, so the `query` method has a single parameter `$handle` with type `string`.

The output is an object with a single property `did`, so the `query` method returns an object called `Output` with a single property `$did`.

## Meta client

`ATProtoMetaClient` is also fully generated, and aggregates all the methods from the AT Protocol.

Given previous example of `com.atproto.identity.resolveHandle`, the `ATProtoMetaClient` will have a method `comAtprotoIdentityResolveHandle`.

```php
<?php

namespace Aazsamir\Libphpsky\Model\Meta;

class ATProtoMetaClient
{
    /**
     * Resolves a handle (domain name) to a DID.
     */
    public function comAtprotoIdentityResolveHandle(
        string $handle,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle($this->client, $this->token);

        return $action->query(...func_get_args());
    }
    // ...
}
```

You can see, that it's only a convenient wrapper around all the generated classes.
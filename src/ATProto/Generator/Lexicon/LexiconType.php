<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Lexicon;

enum LexiconType: string
{
    case NULL = 'null';
    case BOOLEAN = 'boolean';
    case INTEGER = 'integer';
    case STRING = 'string';
    case BYTES = 'bytes';
    case CID_LINK = 'cid-link';
    case BLOB = 'blob';
    case ARRAY = 'array';
    case OBJECT = 'object';
    case PARAMS = 'params';
    case TOKEN = 'token';
    case REF = 'ref';
    case UNION = 'union';
    case UNKNOWN = 'unknown';
    case RECORD = 'record';
    case QUERY = 'query';
    case PROCEDURE = 'procedure';
    case SUBSCRIPTION = 'subscription';
}

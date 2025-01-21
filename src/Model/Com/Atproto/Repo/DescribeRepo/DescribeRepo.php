<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo;

/**
 * Get information about an account and repository, including the list of collections. Does not require auth.
 * query
 */
class DescribeRepo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.describeRepo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $repo The handle or DID of the repo.
     */
    public function query(string $repo): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}

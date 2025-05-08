<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\ListVerifications;

/**
 * List verifications
 * query
 */
class ListVerifications implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.verification.listVerifications';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $cursor Pagination cursor
     * @param ?int $limit Maximum number of results to return
     * @param ?\DateTimeInterface $createdAfter Filter to verifications created after this timestamp
     * @param ?\DateTimeInterface $createdBefore Filter to verifications created before this timestamp
     * @param ?array<string> $issuers  Filter to verifications from specific issuers
     * @param ?array<string> $subjects  Filter to specific verified DIDs
     * @param ?string $sortDirection Sort direction for creation date
     * @param ?bool $isRevoked Filter to verifications that are revoked or not. By default, includes both.
     */
    public function query(
        ?string $cursor = null,
        ?int $limit = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdBefore = null,
        ?array $issuers = null,
        ?array $subjects = null,
        ?string $sortDirection = null,
        ?bool $isRevoked = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\ListVerifications\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param ?string $cursor Pagination cursor
     * @param ?int $limit Maximum number of results to return
     * @param ?\DateTimeInterface $createdAfter Filter to verifications created after this timestamp
     * @param ?\DateTimeInterface $createdBefore Filter to verifications created before this timestamp
     * @param ?array<string> $issuers  Filter to verifications from specific issuers
     * @param ?array<string> $subjects  Filter to specific verified DIDs
     * @param ?string $sortDirection Sort direction for creation date
     * @param ?bool $isRevoked Filter to verifications that are revoked or not. By default, includes both.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?string $cursor = null,
        ?int $limit = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdBefore = null,
        ?array $issuers = null,
        ?array $subjects = null,
        ?string $sortDirection = null,
        ?bool $isRevoked = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}

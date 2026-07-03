<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreviews;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Get public information about groups from join links. The output array matches the input codes one-to-one by position (and each view also carries its 'code'). Disabled codes return a disabledJoinLinkPreviewView, and codes that do not map to a previewable link return an invalidJoinLinkPreviewView.
 * query
 */
class GetJoinLinkPreviews implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.getJoinLinkPreviews';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $codes
     */
    public function query(array $codes): GetJoinLinkPreviewsOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreviews\GetJoinLinkPreviewsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param array<string> $codes
     * @return array<string, mixed>
     */
    public function rawQuery(array $codes): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}

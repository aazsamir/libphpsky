<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\PutPreferences;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.actor.putPreferences';

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\AdultContentPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ContentLabelPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\SavedFeedsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\SavedFeedsPrefV2|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\PersonalDetailsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\FeedViewPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ThreadViewPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\InterestsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\MutedWordsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\HiddenPostsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\BskyAppStatePref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\LabelersPref> */
    public array $preferences = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\AdultContentPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ContentLabelPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\SavedFeedsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\SavedFeedsPrefV2|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\PersonalDetailsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\FeedViewPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ThreadViewPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\InterestsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\MutedWordsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\HiddenPostsPref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\BskyAppStatePref|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\LabelersPref> $preferences
     */
    public static function new(array $preferences): self
    {
        $instance = new self();
        $instance->preferences = $preferences;

        return $instance;
    }
}

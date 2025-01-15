<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\PutPreferences;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.actor.putPreferences';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\AdultContentPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ContentLabelPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPrefV2|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\PersonalDetailsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\FeedViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ThreadViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\InterestsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\MutedWordsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\HiddenPostsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\BskyAppStatePref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\LabelersPref> */
    public array $preferences = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\AdultContentPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ContentLabelPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPrefV2|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\PersonalDetailsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\FeedViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ThreadViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\InterestsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\MutedWordsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\HiddenPostsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\BskyAppStatePref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\LabelersPref> $preferences
     */
    public static function new(array $preferences): self
    {
        $instance = new self();
        $instance->preferences = $preferences;

        return $instance;
    }
}

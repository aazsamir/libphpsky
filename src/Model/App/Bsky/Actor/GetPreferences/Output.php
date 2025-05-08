<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetPreferences;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.actor.getPreferences';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\AdultContentPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ContentLabelPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPrefV2|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\PersonalDetailsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\FeedViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ThreadViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\InterestsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\MutedWordsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\HiddenPostsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\BskyAppStatePref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\LabelersPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\PostInteractionSettingsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\VerificationPrefs> */
    public array $preferences = [];

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['preferences'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\AdultContentPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ContentLabelPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeedsPrefV2|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\PersonalDetailsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\FeedViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ThreadViewPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\InterestsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\MutedWordsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\HiddenPostsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\BskyAppStatePref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\LabelersPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\PostInteractionSettingsPref|\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\VerificationPrefs> $preferences
     */
    public static function new(array $preferences): self
    {
        $instance = new self();
        $instance->preferences = $preferences;

        return $instance;
    }
}

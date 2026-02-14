<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * The Age Assurance configuration for a specific region.
 * object
 */
class ConfigRegion implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'configRegion';
    public const ID = 'app.bsky.ageassurance.defs';

    /** @var string The ISO 3166-1 alpha-2 country code this configuration applies to. */
    public string $countryCode;

    /** @var ?string The ISO 3166-2 region code this configuration applies to. If omitted, the configuration applies to the entire country. */
    public ?string $regionCode;

    /** @var int The minimum age (as a whole integer) required to use Bluesky in this region. */
    public int $minAccessAge;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleDefault|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfDeclaredOverAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfDeclaredUnderAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAssuredOverAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAssuredUnderAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAccountNewerThan|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAccountOlderThan> The ordered list of Age Assurance rules that apply to this region. Rules should be applied in order, and the first matching rule determines the access level granted. The rules array should always include a default rule as the last item. */
    public array $rules = [];

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
        return ['countryCode', 'minAccessAge', 'rules'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleDefault|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfDeclaredOverAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfDeclaredUnderAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAssuredOverAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAssuredUnderAge|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAccountNewerThan|\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegionRuleIfAccountOlderThan> $rules
     */
    public static function new(string $countryCode, int $minAccessAge, array $rules, ?string $regionCode = null): self
    {
        $instance = new self();
        $instance->countryCode = $countryCode;
        $instance->minAccessAge = $minAccessAge;
        $instance->rules = $rules;
        if ($regionCode !== null) {
            $instance->regionCode = $regionCode;
        }

        return $instance;
    }
}

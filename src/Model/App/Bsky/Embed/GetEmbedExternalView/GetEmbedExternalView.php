<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\GetEmbedExternalView;

/**
 * Resolve one or more AT-URIs into the data needed to render an enhanced external embed. Returns `associatedRefs` (strongRefs to embed into a post's external.associatedRefs), the raw `associatedRecords`, and a hydrated `view`. The response is empty (`{}`) when no records were resolvable, or when validation determined the resolved records don't actually back the requested URL; clients should fall back to their own link-card rendering in that case and skip writing strongRefs to the post.
 * query
 */
class GetEmbedExternalView implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.getEmbedExternalView';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $url The canonical web URL the embed represents (typically the URL the user pasted into the composer). Used as the returned view's `uri`. May be used for validation in the future.
     * @param array<string> $uris  AT-URIs of any Atmosphere records that can be resolved and used to construct #externalView views. Example: a site.standard.document and optionally its associated site.standard.publication.
     */
    public function query(string $url, array $uris): GetEmbedExternalViewOutput
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Embed\GetEmbedExternalView\GetEmbedExternalViewOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $url The canonical web URL the embed represents (typically the URL the user pasted into the composer). Used as the returned view's `uri`. May be used for validation in the future.
     * @param array<string> $uris  AT-URIs of any Atmosphere records that can be resolved and used to construct #externalView views. Example: a site.standard.document and optionally its associated site.standard.publication.
     * @return array<string, mixed>
     */
    public function rawQuery(string $url, array $uris): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}

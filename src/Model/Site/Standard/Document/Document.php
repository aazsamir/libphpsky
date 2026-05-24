<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Document;

/**
 * object
 */
class Document implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'site.standard.document';

    /** @var ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef Strong reference to a Bluesky post. Useful to keep track of comments off-platform. */
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $bskyPostRef;
    public mixed $content;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Site\Standard\Document\Contributor> */
    public ?array $contributors = [];

    /** @var ?string Image to used for thumbnail or cover image. Less than 1MB is size. */
    public ?string $coverImage;

    /** @var ?string A brief description or excerpt from the document. */
    public ?string $description;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null Self-label values for this post. Effectively content warnings. */
    public mixed $labels;
    public mixed $links;

    /** @var ?string Combine with site or publication url to construct a canonical URL to the document. Prepend with a leading slash. */
    public ?string $path;

    /** @var \DateTimeInterface Timestamp of the documents publish time. */
    public \DateTimeInterface $publishedAt;

    /** @var string Points to a publication record (at://) or a publication url (https://) for loose documents. Avoid trailing slashes. */
    public string $site;

    /** @var ?array<string> Array of strings used to tag or categorize the document. Avoid prepending tags with hashtags. */
    public ?array $tags = [];

    /** @var ?string Plaintext representation of the documents contents. Should not contain markdown or other formatting. */
    public ?string $textContent;

    /** @var string Title of the document. */
    public string $title;

    /** @var ?\DateTimeInterface Timestamp of the documents last edit. */
    public ?\DateTimeInterface $updatedAt;

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
        return ['site', 'title', 'publishedAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Site\Standard\Document\Contributor> $contributors
     * @param array<string> $tags
     */
    public static function new(
        \DateTimeInterface $publishedAt,
        string $site,
        string $title,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $bskyPostRef = null,
        mixed $content = null,
        ?array $contributors = [],
        ?string $coverImage = null,
        ?string $description = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        mixed $links = null,
        ?string $path = null,
        ?array $tags = [],
        ?string $textContent = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $instance = new self();
        $instance->publishedAt = $publishedAt;
        $instance->site = $site;
        $instance->title = $title;
        if ($bskyPostRef !== null) {
            $instance->bskyPostRef = $bskyPostRef;
        }
        if ($content !== null) {
            $instance->content = $content;
        }
        if ($contributors !== null) {
            $instance->contributors = $contributors;
        }
        if ($coverImage !== null) {
            $instance->coverImage = $coverImage;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($links !== null) {
            $instance->links = $links;
        }
        if ($path !== null) {
            $instance->path = $path;
        }
        if ($tags !== null) {
            $instance->tags = $tags;
        }
        if ($textContent !== null) {
            $instance->textContent = $textContent;
        }
        if ($updatedAt !== null) {
            $instance->updatedAt = $updatedAt;
        }

        return $instance;
    }
}

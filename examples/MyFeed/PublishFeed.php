<?php

declare(strict_types=1);

namespace Examples\MyFeed;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\AuthConfig;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Generator\Generator;
use Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord;
use Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;

class PublishFeed
{
    private ATProtoMetaClient $metaClient;
    private AuthConfig $authConfig;
    private string $hostname;

    public function __construct()
    {
        $this->authConfig = (new ATProtoClientBuilder())->defaultAuthConfig();
        $this->metaClient = new ATProtoMetaClient();

        if (!isset($_ENV['FEED_HOSTNAME']) || !\is_string($_ENV['FEED_HOSTNAME'])) {
            throw new \RuntimeException('FEED_HOSTNAME is required');
        }

        $this->hostname = $_ENV['FEED_HOSTNAME'];
    }

    public function publishFeed(): void
    {
        if ($this->authConfig->login() === null) {
            throw new \RuntimeException('Provide ATPROTO_LOGIN and ATPROTO_PASSWORD');
        }

        $myself = $this->metaClient->comAtprotoIdentityResolveHandle($this->authConfig->login());

        $record = new Generator();
        $record->did = 'did:web:' . $this->hostname;
        $record->displayName = 'Libphpsky Feed';
        $record->description = 'Libphpsky Feed Description';
        $record->createdAt = new \DateTimeImmutable();

        $input = new PutRecord\Input();
        $input->repo = $myself->did;
        $input->collection = Generator::ID;
        $input->rkey = 'libphpsky-feed';
        $input->record = $record;
        $input->validate = true;

        $response = $this->metaClient->comAtprotoRepoPutRecord($input);

        dump($response);
    }

    public function unpublishFeed(): void
    {
        if ($this->authConfig->login() === null) {
            throw new \RuntimeException('Provide ATPROTO_LOGIN and ATPROTO_PASSWORD');
        }

        $myself = $this->metaClient->comAtprotoIdentityResolveHandle($this->authConfig->login());

        $input = new DeleteRecord\Input();
        $input->repo = $myself->did;
        $input->collection = Generator::ID;
        $input->rkey = 'libphpsky-feed';

        $response = $this->metaClient->comAtprotoRepoDeleteRecord($input);

        dump($response);
    }
}

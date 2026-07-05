<?php

declare(strict_types=1);

namespace Tests\Unit\Client\Facade;

use Aazsamir\Libphpsky\Client\Facade\ATProtoFacade;
use Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandleOutput;
use Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo\DescribeRepoOutput;
use Tests\Stub\ATProtoClientStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
class ATProtoFacadeTest extends TestCase
{
    private ATProtoClientStub $atprotoClient;
    private ATProtoFacade $facade;

    protected function setUp(): void
    {
        $this->atprotoClient = new ATProtoClientStub();
        $this->facade = new ATProtoFacade($this->atprotoClient);
    }

    public function testGetPdsByHandle(): void
    {
        $this->atprotoClient->addResponse(ResolveHandleOutput::new(
            did: 'did:plc:1234567890abcdef',
        ));
        $this->atprotoClient->addResponse(DescribeRepoOutput::new(
            handle: 'test',
            did: 'did:plc:1234567890abcdef',
            didDoc: [
                'service' => [
                    [
                        'id' => '#atproto_pds',
                        'type' => 'AtprotoPersonalDataServer',
                        'serviceEndpoint' => 'https://pds.example.com',
                    ],
                ],
            ],
            collections: [],
            handleIsCorrect: true,
        ));

        $pds = $this->facade->getPdsByHandle('test');

        self::assertSame('https://pds.example.com', $pds);
    }

    public function testGetAuthServerByHandle(): void
    {
        $this->atprotoClient->addResponse(ResolveHandleOutput::new(
            did: 'did:plc:1234567890abcdef',
        ));
        $this->atprotoClient->addResponse(DescribeRepoOutput::new(
            handle: 'test',
            did: 'did:plc:1234567890abcdef',
            didDoc: [
                'service' => [
                    [
                        'id' => '#atproto_pds',
                        'type' => 'AtprotoPersonalDataServer',
                        'serviceEndpoint' => 'https://pds.example.com',
                    ],
                ],
            ],
            collections: [],
            handleIsCorrect: true,
        ));
        $this->atprotoClient->addResponse([
            'authorization_servers' => [
                'https://auth.example.com',
            ],
        ]);

        $authServer = $this->facade->getAuthServerByHandle('test');

        self::assertSame('https://auth.example.com', $authServer);
    }

    public function testGetAuthServerMetadata(): void
    {
        $this->atprotoClient->addResponse([
            'issuer' => 'https://bsky.social',
            'authorization_endpoint' => 'https://bsky.social/oauth/authorize',
            'token_endpoint' => 'https://bsky.social/oauth/token',
            'response_types_supported' => ['code'],
            'grant_types_supported' => ['authorization_code', 'refresh_token'],
            'code_challenge_methods_supported' => ['S256'],
            'token_endpoint_auth_methods_supported' => [
                'none',
                'private_key_jwt',
            ],
            'token_endpoint_auth_signing_alg_values_supported' => [
                'RS256',
                'RS384',
            ],
            'scopes_supported' => [
                'atproto',
                'transition:generic',
            ],
            'authorization_response_iss_parameter_supported' => true,
            'require_pushed_authorization_requests' => true,
            'dpop_signing_alg_values_supported' => [
                'RS256',
                'RS384',
            ],
            'require_request_uri_registration' => true,
            'client_id_metadata_document_supported' => true,
            'pushed_authorization_request_endpoint' => 'https://bsky.social/oauth/par',
            'request_parameter_supported' => true,
            'request_uri_parameter_supported' => true,
            'subject_types_supported' => ['public'],
            'response_modes_supported' => ['query', 'fragment', 'form_post'],
            'ui_locales_supported' => ['en-US'],
            'display_values_supported' => ['page', 'popup', 'touch'],
            'request_object_signing_alg_values_supported' => ['RS256', 'RS384'],
            'request_object_encryption_alg_values_supported' => [],
            'request_object_encryption_enc_values_supported' => [],
            'jwks_uri' => 'https://bsky.social/oauth/jwks',
            'revocation_endpoint' => 'https://bsky.social/oauth/revoke',
            'prompt_values_supported' => ['none', 'login', 'consent', 'select_account', 'create'],
        ]);

        $metadata = $this->facade->getAuthServerMetadata('https://bsky.social');

        self::assertEquals('https://bsky.social', $metadata->issuer);
        self::assertEquals('https://bsky.social/oauth/authorize', $metadata->authorizationEndpoint);
        self::assertEquals('https://bsky.social/oauth/token', $metadata->tokenEndpoint);
        self::assertEquals(['code'], $metadata->responseTypesSupported);
        self::assertEquals(['authorization_code', 'refresh_token'], $metadata->grantTypesSupported);
        self::assertEquals(['S256'], $metadata->codeChallengeMethodsSupported);
        self::assertEquals(['none', 'private_key_jwt'], $metadata->tokenEndpointAuthMethodsSupported);
        self::assertEquals(['RS256', 'RS384'], $metadata->tokenEndpointAuthSigningAlgValuesSupported);
        self::assertEquals(['atproto', 'transition:generic'], $metadata->scopesSupported);
        self::assertTrue($metadata->authorizationResponseIssParameterSupported);
        self::assertTrue($metadata->requirePushedAuthorizationRequests);
        self::assertEquals(['RS256', 'RS384'], $metadata->dpopSigningAlgValuesSupported);
        self::assertTrue($metadata->requireRequestUriRegistration);
        self::assertTrue($metadata->clientIdMetadataDocumentSupported);
        self::assertEquals('https://bsky.social/oauth/par', $metadata->pushedAuthorizationRequestEndpoint);
        self::assertNotEmpty($metadata->additionalProperties);
    }
}

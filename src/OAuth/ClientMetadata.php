<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

readonly class ClientMetadata implements \JsonSerializable
{
    /**
     * @param string[] $grantTypes
     * @param string[] $responseTypes
     * @param string[] $redirectUris
     * @param mixed[]|null $jwks
     */
    public function __construct(
        public string $clientId,
        public array $redirectUris,
        public ?string $clientName = null,
        public ?ApplicationType $applicationType = ApplicationType::WEB,
        public array $grantTypes = ['authorization_code', 'refresh_token'],
        public string $scope = 'atproto',
        public array $responseTypes = ['code'],
        public ?string $tokenEndpointAuthMethod = null,
        public ?string $tokenEndpointAuthSIgningAlg = null,
        public ?bool $dpopBoundAccessTokens = true,
        public ?array $jwks = null,
        public ?string $jwksUri = null,
        public ?string $clientUri = null,
        public ?string $logoUri = null,
        public ?string $tosUri = null,
        public ?string $policyUri = null,
    ) {
        if (empty($clientId)) {
            throw new InvalidClientMetadata('clientId must not be empty');
        }

        if (empty($grantTypes)) {
            throw new InvalidClientMetadata('grantTypes must not be empty');
        }

        if (!\in_array('authorization_code', $grantTypes, true)) {
            throw new InvalidClientMetadata('grantTypes must include "authorization_code"');
        }

        if (empty($scope)) {
            throw new InvalidClientMetadata('scope must not be empty');
        }

        if (!str_contains($scope, 'atproto')) {
            throw new InvalidClientMetadata('scope must include "atproto"');
        }

        if (empty($responseTypes)) {
            throw new InvalidClientMetadata('responseTypes must not be empty');
        }

        if (!\in_array('code', $responseTypes, true)) {
            throw new InvalidClientMetadata('responseTypes must include "code"');
        }

        if (empty($redirectUris)) {
            throw new InvalidClientMetadata('redirectUris must not be empty');
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_filter([
            'client_id' => $this->clientId,
            'client_name' => $this->clientName,
            'application_type' => $this->applicationType?->value,
            'grant_types' => $this->grantTypes,
            'scope' => $this->scope,
            'response_types' => $this->responseTypes,
            'redirect_uris' => $this->redirectUris,
            'token_endpoint_auth_method' => $this->tokenEndpointAuthMethod,
            'token_endpoint_auth_signing_alg' => $this->tokenEndpointAuthSIgningAlg,
            'dpop_bound_access_tokens' => $this->dpopBoundAccessTokens,
            'jwks' => $this->jwks,
            'jwks_uri' => $this->jwksUri,
            'client_uri' => $this->clientUri,
            'logo_uri' => $this->logoUri,
            'tos_uri' => $this->tosUri,
            'policy_uri' => $this->policyUri,
        ]);
    }
}

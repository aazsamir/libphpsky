<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\Facade;

readonly class AuthServerMetadata
{
    /**
     * @param string[] $responseTypesSupported
     * @param string[] $grantTypesSupported
     * @param string[] $codeChallengeMethodsSupported
     * @param string[] $tokenEndpointAuthMethodsSupported
     * @param string[] $tokenEndpointAuthSigningAlgValuesSupported
     * @param string[] $scopesSupported
     * @param string[] $dpopSigningAlgValuesSupported
     * @param array<mixed, mixed> $additionalProperties
     */
    public function __construct(
        public string $issuer,
        public string $authorizationEndpoint,
        public string $tokenEndpoint,
        public array $responseTypesSupported,
        public array $grantTypesSupported,
        public array $codeChallengeMethodsSupported,
        public array $tokenEndpointAuthMethodsSupported,
        public array $tokenEndpointAuthSigningAlgValuesSupported,
        public array $scopesSupported,
        public bool $authorizationResponseIssParameterSupported,
        public bool $requirePushedAuthorizationRequests,
        public array $dpopSigningAlgValuesSupported,
        public ?bool $requireRequestUriRegistration,
        public bool $clientIdMetadataDocumentSupported,
        public string $pushedAuthorizationRequestEndpoint,
        public array $additionalProperties = [],
    ) {}

    /**
     * @param array<mixed, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $additionalProperties = $data;
        unset(
            $additionalProperties['issuer'],
            $additionalProperties['authorization_endpoint'],
            $additionalProperties['token_endpoint'],
            $additionalProperties['response_types_supported'],
            $additionalProperties['grant_types_supported'],
            $additionalProperties['code_challenge_methods_supported'],
            $additionalProperties['token_endpoint_auth_methods_supported'],
            $additionalProperties['token_endpoint_auth_signing_alg_values_supported'],
            $additionalProperties['scopes_supported'],
            $additionalProperties['authorization_response_iss_parameter_supported'],
            $additionalProperties['require_pushed_authorization_requests'],
            $additionalProperties['dpop_signing_alg_values_supported'],
            $additionalProperties['require_request_uri_registration'],
            $additionalProperties['client_id_metadata_document_supported'],
            $additionalProperties['pushed_authorization_request_endpoint'],
        );

        \assert(\is_string($data['issuer']));
        \assert(\is_string($data['authorization_endpoint']));
        \assert(\is_string($data['token_endpoint']));
        \assert(\is_array($data['response_types_supported']));
        \assert(\is_array($data['grant_types_supported']));
        \assert(\is_array($data['code_challenge_methods_supported']));
        \assert(\is_array($data['token_endpoint_auth_methods_supported']));
        \assert(\is_array($data['token_endpoint_auth_signing_alg_values_supported']));
        \assert(\is_array($data['scopes_supported']));
        \assert(\is_bool($data['authorization_response_iss_parameter_supported']));
        \assert(\is_bool($data['require_pushed_authorization_requests']));
        \assert(\is_array($data['dpop_signing_alg_values_supported']));
        \assert(!isset($data['require_request_uri_registration']) || \is_bool($data['require_request_uri_registration']));
        \assert(!isset($data['client_id_metadata_document_supported']) || \is_bool($data['client_id_metadata_document_supported']));
        \assert(\is_string($data['pushed_authorization_request_endpoint']));

        /**
         * @var array{
         *   issuer: string,
         *   authorization_endpoint: string,
         *   token_endpoint: string,
         *   response_types_supported: string[],
         *   grant_types_supported: string[],
         *   code_challenge_methods_supported: string[],
         *   token_endpoint_auth_methods_supported: string[],
         *   token_endpoint_auth_signing_alg_values_supported: string[],
         *   scopes_supported: string[],
         *   authorization_response_iss_parameter_supported: bool,
         *   require_pushed_authorization_requests: bool,
         *   dpop_signing_alg_values_supported: string[],
         *   require_request_uri_registration?: bool,
         *   client_id_metadata_document_supported?: bool,
         *   pushed_authorization_request_endpoint: string,
         * } $data
         */

        return new self(
            issuer: $data['issuer'],
            authorizationEndpoint: $data['authorization_endpoint'],
            tokenEndpoint: $data['token_endpoint'],
            responseTypesSupported: $data['response_types_supported'],
            grantTypesSupported: $data['grant_types_supported'],
            codeChallengeMethodsSupported: $data['code_challenge_methods_supported'],
            tokenEndpointAuthMethodsSupported: $data['token_endpoint_auth_methods_supported'],
            tokenEndpointAuthSigningAlgValuesSupported: $data['token_endpoint_auth_signing_alg_values_supported'],
            scopesSupported: $data['scopes_supported'],
            authorizationResponseIssParameterSupported: $data['authorization_response_iss_parameter_supported'],
            requirePushedAuthorizationRequests: $data['require_pushed_authorization_requests'],
            dpopSigningAlgValuesSupported: $data['dpop_signing_alg_values_supported'],
            requireRequestUriRegistration: $data['require_request_uri_registration'] ?? null,
            clientIdMetadataDocumentSupported: $data['client_id_metadata_document_supported'] ?? false,
            pushedAuthorizationRequestEndpoint: $data['pushed_authorization_request_endpoint'],
            additionalProperties: $additionalProperties,
        );
    }
}

<?php

declare(strict_types=1);

namespace Tests\Model\Com\Atproto\Server\CreateSession;

use Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\Input;
use Tests\Model\TestCase;

class CreateSessionTest extends TestCase
{
    public function testProcedure(): void
    {
        $this->mockResponse($this->jsonres($this->valid()));

        $response = $this->client->comAtprotoServerCreateSession(
            Input::new(
                identifier: 'samorollo.bsky.social',
                password: 'password',
            ),
        );

        $this->assertEquals('did:plc:rbkeag6b36ghkibhr6x235pm', $response->did);
        $this->assertEquals(
            [
                '@context' => [
                    'https://www.w3.org/ns/did/v1',
                    'https://w3id.org/security/multikey/v1',
                    'https://w3id.org/security/suites/secp256k1-2019/v1',
                ],
                'id' => 'did:plc:rbkeag6b36ghkibhr6x235pm',
                'alsoKnownAs' => [
                    'at://samorollo.bsky.social',
                ],
                'verificationMethod' => [
                    [
                        'id' => 'did:plc:rbkeag6b36ghkibhr6x235pm#atproto',
                        'type' => 'Multikey',
                        'controller' => 'did:plc:rbkeag6b36ghkibhr6x235pm',
                        'publicKeyMultibase' => 'AAAAAAAAAAA',
                    ],
                ],
                'service' => [
                    [
                        'id' => '#atproto_pds',
                        'type' => 'AtprotoPersonalDataServer',
                        'serviceEndpoint' => 'https://cordyceps.us-west.host.bsky.network',
                    ],
                ],
            ],
            $response->didDoc,
        );
        $this->assertEquals('samorollo.bsky.social', $response->handle);
        $this->assertEquals('sutikkukun@gmail.com', $response->email);
        $this->assertEquals(true, $response->emailConfirmed);
        $this->assertEquals(false, $response->emailAuthFactor);
        $this->assertEquals('XXXXXXXXXXXXXXX', $response->accessJwt);
        $this->assertEquals('YYYYYYYYYYYYYYY', $response->refreshJwt);
        $this->assertEquals(true, $response->active);
    }

    public function valid(): string
    {
        return <<<JSON
        {
            "did": "did:plc:rbkeag6b36ghkibhr6x235pm",
            "didDoc": {
                "@context": [
                    "https://www.w3.org/ns/did/v1",
                    "https://w3id.org/security/multikey/v1",
                    "https://w3id.org/security/suites/secp256k1-2019/v1"
                ],
                "id": "did:plc:rbkeag6b36ghkibhr6x235pm",
                "alsoKnownAs": [
                    "at://samorollo.bsky.social"
                ],
                "verificationMethod": [
                    {
                        "id": "did:plc:rbkeag6b36ghkibhr6x235pm#atproto",
                        "type": "Multikey",
                        "controller": "did:plc:rbkeag6b36ghkibhr6x235pm",
                        "publicKeyMultibase": "AAAAAAAAAAA"
                    }
                ],
                "service": [
                    {
                        "id": "#atproto_pds",
                        "type": "AtprotoPersonalDataServer",
                        "serviceEndpoint": "https://cordyceps.us-west.host.bsky.network"
                    }
                ]
            },
            "handle": "samorollo.bsky.social",
            "email": "sutikkukun@gmail.com",
            "emailConfirmed": true,
            "emailAuthFactor": false,
            "accessJwt": "XXXXXXXXXXXXXXX",
            "refreshJwt": "YYYYYYYYYYYYYYY",
            "active": true
        }
        JSON;
    }
}

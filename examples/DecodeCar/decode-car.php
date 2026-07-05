<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Car\CarDeserializer;
use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$client = ATProtoMetaClient::default();
$carDecoder = CarDeserializer::default();
/** @var string */
$handle = ATProtoClientBuilder::default()->defaultAuthConfig()->login();
/** @var string */
$did = $client->comAtprotoIdentityResolveHandle()->query($handle)->did;
/** @var string */
$car = $client->comAtprotoSyncGetRepo()->query($did);
$decoded = $carDecoder->decodeString($car);
dd($decoded);

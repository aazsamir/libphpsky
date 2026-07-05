# CARv1

ATProto is heavily using CARv1 format for data transfer. Libphpsky provides a simple decoder.

```php
<?php
$client = ATProtoMetaClient::default();
$carDecoder = CarDeserializer::default();
$handle = ATProtoClientBuilder::default()->defaultAuthConfig()->login();
$did = $client->comAtprotoIdentityResolveHandle()->query($handle)->did;
$car = $client->comAtprotoSyncGetRepo()->query($did);
$decoded = $carDecoder->decodeString($car);
dump($decoded);
```
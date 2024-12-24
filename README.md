# Libphpsky

Libphpsky is a PHP library designed to interact with the Bluesky decentralized social media protocol.

It was created in a few days, at the moment it's more like a proof of concept and you probably shouldn't use it. But it looks like it works, so give it some time to put it into better shape.

This is not an official library and is not affiliated with Bluesky.

## Table of Contents

-   [Installation](#installation)
-   [Usage](#usage)
-   [Features](#features)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

To install Libphpsky, you can use Composer:

```sh
composer require aazsamir/libphpsky
```

## Usage

```php
$createSession = new CreateSession();
$input = new Input();
$input->identifier = $username;
$input->password = $password;
$input->authFactorToken = 'testing-purpose';
$response = $createSession->procedure($input);
$accessJwt = $response->accessJwt;

$resolveHandle = new ResolveHandle();
$response = $resolveHandle->query('bsky.app');
$did = $response->did;

$getProfile = new GetProfile();
$response = $getProfile->withAuth($accessJwt)->query($did);
```

## Features

-   All types generated from the Bluesky protocol schema
-   Queries
-   Procedures
-   Authorization

## Contributing

As you can see, it's poorly written, have no tests, and phpstan is not complaining only because of runtime validation. So, big refactor is needed. If you still aren't scared, feel free to contribute.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

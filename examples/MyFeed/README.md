# MyFeed example

This is example of publishing custom feed. It contains code to publish, unpublish and serve feed.

## Usage

Make sure you are authorized, by setting `ATPROTO_LOGIN` and `ATPROTO_PASSWORD` environment variables.
```
export ATPROTO_LOGIN=your_login
export ATPROTO_PASSWORD=your_password
```

Also, set your domain at which you want to publish feed:
```
export FEED_HOSTNAME=your_domain
```
> Tip: You can use `ngrok` to expose your local server to the internet, for testing purposes.

Publish feed:
```bash
php ./examples/MyFeed/publish-feed.php
```

Serve feed:
```bash
cd ./examples/MyFeed
php -S localhost:8000 feed-generation.php
```

Unpublish feed:
```bash
php ./examples/MyFeed/unpublish-feed.php
```
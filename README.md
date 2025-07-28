# Resend PHP


## Examples

Send email with:

- [PHP](example/README.md)
- [Laravel](https://github.com/resend/resend-laravel-example)

## Getting started

> **Requires [PHP 8.2+](https://php.net/releases/)**

First, install Resend via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require liucf/neon-sdk-php
```

Then, interact with Resend's API:

```php
$neon = Neon::client('napi_123456789');

$resend->emails->send([
    'from' => 'onboarding@resend.dev',
    'to' => 'user@gmail.com',
    'subject' => 'hello world',
    'text' => 'it works!',
]);
```

> **Note**
> This client is inspired by [OpenAI PHP](https://github.com/openai-php).

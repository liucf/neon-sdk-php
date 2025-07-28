# Neon PHP SDK

## Examples
- [PHP](example/README.md)

## Table of Contents
- [Get Started](#get-started)
- [Usage](#usage)
  - [ApiKeys Resource](#apikes-resource)



## Getting started

> **Requires [PHP 8.2+](https://php.net/releases/)**

First, install via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require liucf/neon-sdk-php
```

Then, interact with Neon's API:

## Usage

### `ApiKeys` Resource

#### `list`
```php
$neon = Neon::client('napi_123456789');

$neon->ApiKeys()->list();
```

#### `create`
```php
$neon = Neon::client('napi_123456789');
$neon->ApiKeys()->create(['key_name' => 'Test API Key from SDK']);
```

#### `revoke`
```php
$neon = Neon::client('napi_123456789');
$neon->ApiKeys()->revoke('2188549');
```

> **Note**
> This client is inspired by [OpenAI PHP](https://github.com/openai-php).

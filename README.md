# Neon PHP SDK

## Examples
- [PHP](example/README.md)

## Table of Contents
- [Get Started](#get-started)
- [Usage](#usage)
  - [ApiKeys Resource](#apikes-resource)
  - [Regions Resource](#regions-resource)



## Getting started

> **Requires [PHP 8.2+](https://php.net/releases/)**

First, install via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require liucf/neon-sdk-php
```

Then, interact with Neon's API by creating a client instance with your API key:
```php
$neon = Neon::client('napi_123456789');
```
## Usage

### `ApiKeys` Resource

#### `list`
```php
$neon->apiKeys()->list();
```

#### `create`
```php
$neon->apiKeys()->create(['key_name' => 'Test API Key from SDK']);
```

#### `revoke`
```php
$neon->apiKeys()->revoke('2188549');
```


### `Regions` Resource

#### `list`
```php
$neon->regions()->list();
```

> **Note**
> This client is inspired by [OpenAI PHP](https://github.com/openai-php).

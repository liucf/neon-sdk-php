# Neon PHP SDK

## Table of Contents
- [Get Started](#get-started)
- [Usage](#usage)
  - [ApiKeys Resource](#apikeys-resource)
  - [Operations Resource](#operations-resource)
  - [Projects Resource](#projects-resource)
  - [Branches Resource](#branches-resource)
  - [Endpoints Resource](#endpoints-resource)
  - [Regions Resource](#regions-resource)
  - [Users Resource](#users-resource)
  - [Consumption Resource](#consumption-resource)
  - [Organizations Resource](#organizations-resource)
  - [Auth Resource](#auth-resource)
  - [DataAPI Resource](#dataapi-resource)

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

### `Operations` Resource
#### `list`
```php
$neon->operations()->list('royal-hall-84927440');
```

or with parameters `limit` and `cursor`:
```php
$neon->operations()->list('royal-hall-84927440', [
    'limit' => 2,
    'cursor' => '2025-07-27T01:45:32.898729Z',
]);
```

#### `retrieve`
```php
$neon->operations()->retrieve('royal-hall-84927440', '33d65f33-eabe-4f46-b945-123456789abc');
```

### `Projects` Resource

#### `list`
```php
$neon->projects()->list(['project' => ['org_id' => 'org_123456789']]);
```

#### `create`
```php
$neon->projects()->create(['project' => ['name' => 'test_project']]);
```

#### `listShared`
```php
$neon->projects()->listShared();
```

#### `retrieve`
```php
$neon->projects()->retrieve('project_123456789');
```

#### `update`
```php
$neon->projects()->update('project_123456789', ['project' => ['name' => 'updated_project_name']]);
```

#### `delete`
```php
$neon->projects()->delete('project_123456789');
```

#### `listPermissions`
```php
$neon->projects()->listPermissions('project_123456789');
```

#### `grantPermission`
```php
$neon->projects()->grantPermission('project_123456789', ['email' => 'user@example.com']);
```

#### `revokePermission`
```php
$neon->projects()->revokePermission('project_123456789', 'permission_id');
```

#### `getAvailablePreloadLibraries`
```php
$neon->projects()->getAvailablePreloadLibraries('project_123456789');
```

#### `createTransferRequest`
```php
$neon->projects()->createTransferRequest('project_123456789', ['target_email' => 'target@example.com']);
```

#### `acceptTransferRequest`
```php
$neon->projects()->acceptTransferRequest('project_123456789', 'request_id', ['org_id' => 'org_987654321']);
```

#### `listJwks`
```php
$neon->projects()->listJwks('project_123456789');
```

#### `addJwks`
```php
$neon->projects()->addJwks('project_123456789', [
    'jwks_url' => 'https://example.com/.well-known/jwks.json',
    'provider_name' => 'Auth0'
]);
```

#### `deleteJwks`
```php
$neon->projects()->deleteJwks('project_123456789', 'jwks_id');
```

#### `getConnectionUri`
```php
$neon->projects()->getConnectionUri('project_123456789', [
    'database_name' => 'main',
    'role_name' => 'user'
]);
```

#### `listVpcEndpoints`
```php
$neon->projects()->listVpcEndpoints('project_123456789');
```

#### `setVpcEndpoint`
```php
$neon->projects()->setVpcEndpoint('project_123456789', 'vpc_endpoint_id');
```

#### `deleteVpcEndpoint`
```php
$neon->projects()->deleteVpcEndpoint('project_123456789', 'vpc_endpoint_id');
```

### `Branches` Resource

#### `list`
```php
$neon->branches()->list('project_123456789');
```

#### `list` with parameters
```php
$neon->branches()->list('project_123456789', [
    'search' => 'test',
    'sort_by' => 'name',
    'sort_order' => 'asc',
    'limit' => 10
]);
```

#### `create`
```php
$neon->branches()->create('project_123456789', [
    'branch' => [
        'name' => 'test-branch',
        'parent_id' => 'br-main-12345'
    ]
]);
```

#### `create` without parameters (auto-generated name)
```php
$neon->branches()->create('project_123456789');
```

#### `count`
```php
$neon->branches()->count('project_123456789');
```

#### `retrieve`
```php
$neon->branches()->retrieve('project_123456789', 'br-branch-test-12345');
```

#### `update`
```php
$neon->branches()->update('project_123456789', 'br-branch-test-12345', [
    'branch' => [
        'name' => 'updated-branch-name'
    ]
]);
```

#### `delete`
```php
$neon->branches()->delete('project_123456789', 'br-branch-test-12345');
```

#### `restore`
```php
$neon->branches()->restore('project_123456789', 'br-branch-test-12345', [
    'source_branch_id' => 'br-main-12345',
    'timestamp' => '2025-07-26T12:00:00Z'
]);
```

#### `setAsDefault`
```php
$neon->branches()->setAsDefault('project_123456789', 'br-branch-test-12345');
```

#### `getSchema`
```php
$neon->branches()->getSchema('project_123456789', 'br-branch-test-12345', [
    'db_name' => 'main',
    'format' => 'sql'
]);
```

#### `getSchema` with timestamp
```php
$neon->branches()->getSchema('project_123456789', 'br-branch-test-12345', [
    'db_name' => 'main',
    'timestamp' => '2025-07-26T12:00:00Z',
    'format' => 'json'
]);
```

#### `compareSchema`
```php
$neon->branches()->compareSchema('project_123456789', 'br-branch-test-12345', [
    'target_branch_id' => 'br-main-12345',
    'db_name' => 'main'
]);
```

#### `listEndpoints`
```php
$neon->branches()->listEndpoints('project_123456789', 'br-branch-test-12345');
```

#### `listDatabases`
```php
$neon->branches()->listDatabases('project_123456789', 'br-branch-test-12345');
```

#### `listRoles`
```php
$neon->branches()->listRoles('project_123456789', 'br-branch-test-12345');
```

### `Endpoints` Resource

#### `list`
```php
$neon->endpoints()->list('project_123456789');
```

#### `create`
```php
$neon->endpoints()->create('project_123456789', [
    'endpoint' => [
        'branch_id' => 'br-branch-test-12345',
        'type' => 'read_write',
        'autoscaling_limit_min_cu' => 1,
        'autoscaling_limit_max_cu' => 2
    ]
]);
```

#### `create` read-only endpoint
```php
$neon->endpoints()->create('project_123456789', [
    'endpoint' => [
        'branch_id' => 'br-branch-test-12345',
        'type' => 'read_only',
        'autoscaling_limit_min_cu' => 0.25,
        'autoscaling_limit_max_cu' => 1
    ]
]);
```

#### `retrieve`
```php
$neon->endpoints()->retrieve('project_123456789', 'ep-endpoint-123456');
```

#### `update`
```php
$neon->endpoints()->update('project_123456789', 'ep-endpoint-123456', [
    'endpoint' => [
        'autoscaling_limit_max_cu' => 4,
        'suspend_timeout_seconds' => 600
    ]
]);
```

#### `delete`
```php
$neon->endpoints()->delete('project_123456789', 'ep-endpoint-123456');
```

#### `start`
```php
$neon->endpoints()->start('project_123456789', 'ep-endpoint-123456');
```

#### `suspend`
```php
$neon->endpoints()->suspend('project_123456789', 'ep-endpoint-123456');
```

#### `restart`
```php
$neon->endpoints()->restart('project_123456789', 'ep-endpoint-123456');
```

### `Users` Resource

#### `me`
```php
$neon->users()->me();
```

#### `organizations`
```php
$neon->users()->organizations();
```

#### `transferProjects`
```php
$neon->users()->transferProjects([
    'project_ids' => ['royal-hall-11111111', 'golden-sunset-22222222'],
    'org_id' => 'org-123456'
]);
```

#### `authDetails`
```php
$neon->users()->authDetails();
```

### `Consumption` Resource

#### `account`
```php
$neon->consumption()->account();
```

#### `account` with parameters
```php
$neon->consumption()->account([
    'from' => '2025-07-01T00:00:00Z',
    'to' => '2025-07-31T23:59:59Z',
    'granularity' => 'monthly'
]);
```

#### `projects`
```php
$neon->consumption()->projects();
```

#### `projects` with parameters
```php
$neon->consumption()->projects([
    'from' => '2025-07-01T00:00:00Z',
    'to' => '2025-07-31T23:59:59Z',
    'granularity' => 'daily',
    'org_id' => 'org-123456'
]);
```

### `Organizations` Resource

#### `retrieve`
```php
$neon->organizations()->retrieve('org-morning-bread-81040908');
```

#### `listApiKeys`
```php
$neon->organizations()->listApiKeys('org-morning-bread-81040908');
```

#### `createApiKey`
```php
$neon->organizations()->createApiKey('org-morning-bread-81040908', [
    'key_name' => 'production-api-key'
]);
```

#### `revokeApiKey`
```php
$neon->organizations()->revokeApiKey('org-morning-bread-81040908', 165434);
```

#### `getMembers`
```php
$neon->organizations()->getMembers('org-morning-bread-81040908');
```

#### `updateMember`
```php
$neon->organizations()->updateMember('org-morning-bread-81040908', 'user-123', [
    'role' => 'admin'
]);
```

#### `removeMember`
```php
$neon->organizations()->removeMember('org-morning-bread-81040908', 'user-123');
```

#### `createInvitation`
```php
$neon->organizations()->createInvitation('org-morning-bread-81040908', [
    'email' => 'user@example.com',
    'role' => 'member'
]);
```

#### `listInvitations`
```php
$neon->organizations()->listInvitations('org-morning-bread-81040908');
```

#### `revokeInvitation`
```php
$neon->organizations()->revokeInvitation('org-morning-bread-81040908', 123);
```

#### `resendInvitation`
```php
$neon->organizations()->resendInvitation('org-morning-bread-81040908', 123);
```

#### `transferProjects`
```php
$neon->organizations()->transferProjects('org-morning-bread-81040908', [
    'project_ids' => ['project-123', 'project-456']
]);
```

#### `listVpcEndpoints`
```php
$neon->organizations()->listVpcEndpoints('org-morning-bread-81040908');
```

#### `getVpcEndpointDetails`
```php
$neon->organizations()->getVpcEndpointDetails('org-morning-bread-81040908', 'us-east-1', 'vpce-123');
```

#### `assignVpcEndpoint`
```php
$neon->organizations()->assignVpcEndpoint('org-morning-bread-81040908', 'us-east-1', 'vpce-123', [
    'label' => 'production-vpc'
]);
```

#### `deleteVpcEndpoint`
```php
$neon->organizations()->deleteVpcEndpoint('org-morning-bread-81040908', 'us-east-1', 'vpce-123');
```


### `Regions` Resource

#### `list`
```php
$neon->regions()->list();
```

### `Auth` Resource

#### `createIntegration`
```php
$neon->auth()->createIntegration([
    'project_id' => 'project_123456789',
    'auth_provider' => 'auth0',
    'domain' => 'example.auth0.com'
]);
```

#### `listRedirectUriWhitelistDomains`
```php
$neon->auth()->listRedirectUriWhitelistDomains('project_123456789');
```

#### `addDomainToRedirectUriWhitelist`
```php
$neon->auth()->addDomainToRedirectUriWhitelist('project_123456789', [
    'domain' => 'https://example.com'
]);
```

#### `deleteDomainFromRedirectUriWhitelist`
```php
$neon->auth()->deleteDomainFromRedirectUriWhitelist('project_123456789', [
    'domain' => 'https://example.com'
]);
```

#### `createProviderSdkKeys`
```php
$neon->auth()->createProviderSdkKeys([
    'project_id' => 'project_123456789',
    'provider' => 'supabase'
]);
```

#### `createUser`
```php
$neon->auth()->createUser([
    'project_id' => 'project_123456789',
    'email' => 'user@example.com',
    'password' => 'securepassword123'
]);
```

#### `deleteUser`
```php
$neon->auth()->deleteUser('project_123456789', 'auth_user_123');
```

#### `transferProviderProject`
```php
$neon->auth()->transferProviderProject([
    'project_id' => 'project_123456789',
    'target_project_id' => 'project_987654321'
]);
```

#### `listIntegrations`
```php
$neon->auth()->listIntegrations('project_123456789');
```

#### `listOauthProviders`
```php
$neon->auth()->listOauthProviders('project_123456789');
```

#### `addOauthProvider`
```php
$neon->auth()->addOauthProvider('project_123456789', [
    'provider_type' => 'google',
    'client_id' => 'google_client_id',
    'client_secret' => 'google_client_secret'
]);
```

#### `updateOauthProvider`
```php
$neon->auth()->updateOauthProvider('project_123456789', 'oauth_provider_123', [
    'client_secret' => 'new_client_secret'
]);
```

#### `deleteOauthProvider`
```php
$neon->auth()->deleteOauthProvider('project_123456789', 'oauth_provider_123');
```

#### `getEmailServerConfig`
```php
$neon->auth()->getEmailServerConfig('project_123456789');
```

#### `updateEmailServerConfig`
```php
$neon->auth()->updateEmailServerConfig('project_123456789', [
    'smtp_host' => 'smtp.example.com',
    'smtp_port' => 587,
    'smtp_user' => 'admin@example.com'
]);
```

#### `deleteIntegration`
```php
$neon->auth()->deleteIntegration('project_123456789', 'auth0');
```

### `DataAPI` Resource

#### `create`
```php
$neon->dataAPI()->create('project_123456789', 'br-branch-test-12345');
```

#### `create` with parameters
```php
$neon->dataAPI()->create('project_123456789', 'br-branch-test-12345', [
    'database_name' => 'main',
    'role_name' => 'neondb_owner'
]);
```

#### `get`
```php
$neon->dataAPI()->get('project_123456789', 'br-branch-test-12345');
```

#### `delete`
```php
$neon->dataAPI()->delete('project_123456789', 'br-branch-test-12345');
```

> **Note**
> This client is inspired by [OpenAI PHP](https://github.com/openai-php).

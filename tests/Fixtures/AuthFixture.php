<?php

function authIntegrationResource(): array
{
    return [
        'auth_provider' => 'mock',
        'auth_provider_project_id' => 'auth-project-123',
        'pub_client_key' => 'pub_key_123',
        'secret_server_key' => 'secret_key_123',
        'jwks_url' => 'https://auth.example.com/.well-known/jwks.json',
        'schema_name' => 'neon_auth',
        'table_name' => 'users_sync',
    ];
}

function authRedirectUriWhitelistResource(): array
{
    return [
        'domains' => [
            [
                'domain' => 'https://example.com',
                'auth_provider' => 'mock',
            ],
            [
                'domain' => 'https://app.example.com',
                'auth_provider' => 'mock',
            ],
        ],
    ];
}

function authProviderSdkKeysResource(): array
{
    return [
        'auth_provider' => 'mock',
        'auth_provider_project_id' => 'auth-project-123',
        'pub_client_key' => 'pub_key_456',
        'secret_server_key' => 'secret_key_456',
        'jwks_url' => 'https://auth.example.com/.well-known/jwks.json',
        'schema_name' => 'neon_auth',
        'table_name' => 'users_sync',
    ];
}

function authUserResource(): array
{
    return [
        'id' => 'user-789',
    ];
}

function authTransferProjectResource(): array
{
    return [
        'url' => 'https://auth-provider.com/transfer?token=transfer-token-123',
    ];
}

function authIntegrationsResource(): array
{
    return [
        'data' => [
            [
                'auth_provider' => 'mock',
                'auth_provider_project_id' => 'auth-project-123',
                'branch_id' => 'br-wispy-meadow-118737',
                'db_name' => 'neondb',
                'created_at' => '2024-02-23T17:42:25Z',
                'owned_by' => 'neon',
                'jwks_url' => 'https://auth.example.com/.well-known/jwks.json',
            ],
        ],
    ];
}

function authOauthProvidersResource(): array
{
    return [
        'providers' => [
            [
                'id' => 'google',
                'type' => 'standard',
                'client_id' => 'google-client-123',
                'client_secret' => 'google-secret-123',
            ],
            [
                'id' => 'github',
                'type' => 'shared',
            ],
        ],
    ];
}

function authOauthProviderResource(): array
{
    return [
        'id' => 'microsoft',
        'type' => 'standard',
        'client_id' => 'microsoft-client-456',
        'client_secret' => 'microsoft-secret-456',
    ];
}

function authOauthProviderUpdatedResource(): array
{
    return [
        'id' => 'google',
        'type' => 'standard',
        'client_id' => 'google-client-updated',
        'client_secret' => 'google-secret-updated',
    ];
}

function authEmailServerConfigResource(): array
{
    return [
        'type' => 'standard',
        'host' => 'smtp.example.com',
        'port' => 587,
        'username' => 'noreply@example.com',
        'password' => 'smtp-password',
        'sender_email' => 'noreply@example.com',
        'sender_name' => 'Example App',
    ];
}

function authEmailServerConfigUpdatedResource(): array
{
    return [
        'type' => 'standard',
        'host' => 'smtp.newhost.com',
        'port' => 465,
        'username' => 'auth@newhost.com',
        'password' => 'new-smtp-password',
        'sender_email' => 'auth@newhost.com',
        'sender_name' => 'New Auth Service',
    ];
}

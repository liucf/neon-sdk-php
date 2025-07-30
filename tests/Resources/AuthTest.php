<?php

describe('Auth', function () {
    test('create integration', function () {
        $client = mockClient(
            'POST',
            'projects/auth/create',
            [
                'auth_provider' => 'mock',
                'project_id' => 'spring-example-302709',
                'branch_id' => 'br-wispy-meadow-118737',
                'database_name' => 'neondb',
            ],
            authIntegrationResource()
        );

        $result = $client->auth()->createIntegration([
            'auth_provider' => 'mock',
            'project_id' => 'spring-example-302709',
            'branch_id' => 'br-wispy-meadow-118737',
            'database_name' => 'neondb',
        ]);

        expect($result)->toBe(authIntegrationResource());
    });

    test('list redirect uri whitelist domains', function () {
        $client = mockClient(
            'GET',
            'projects/spring-example-302709/auth/domains',
            [],
            authRedirectUriWhitelistResource()
        );

        $result = $client->auth()->listRedirectUriWhitelistDomains('spring-example-302709');

        expect($result)->toBe(authRedirectUriWhitelistResource());
    });

    test('add domain to redirect uri whitelist', function () {
        $client = mockClient(
            'POST',
            'projects/spring-example-302709/auth/domains',
            [
                'domain' => 'https://newapp.example.com',
                'auth_provider' => 'mock',
            ],
            []
        );

        $result = $client->auth()->addDomainToRedirectUriWhitelist('spring-example-302709', [
            'domain' => 'https://newapp.example.com',
            'auth_provider' => 'mock',
        ]);

        expect($result)->toBe([]);
    });

    test('delete domain from redirect uri whitelist', function () {
        $transporter = Mockery::mock(\Neon\Contracts\TransporterContract::class);
        $transporter->shouldReceive('request')->once()->andReturn([]);

        $client = new \Neon\Client($transporter);

        $result = $client->auth()->deleteDomainFromRedirectUriWhitelist('spring-example-302709', [
            'auth_provider' => 'mock',
            'domains' => [
                ['domain' => 'https://oldapp.example.com'],
            ],
        ]);

        expect($result)->toBe([]);
    });

    test('create provider sdk keys', function () {
        $client = mockClient(
            'POST',
            'projects/auth/keys',
            [
                'project_id' => 'spring-example-302709',
                'auth_provider' => 'mock',
            ],
            authProviderSdkKeysResource()
        );

        $result = $client->auth()->createProviderSdkKeys([
            'project_id' => 'spring-example-302709',
            'auth_provider' => 'mock',
        ]);

        expect($result)->toBe(authProviderSdkKeysResource());
    });

    test('create user', function () {
        $client = mockClient(
            'POST',
            'projects/auth/user',
            [
                'project_id' => 'spring-example-302709',
                'auth_provider' => 'mock',
                'email' => 'user@example.com',
                'name' => 'John Doe',
            ],
            authUserResource()
        );

        $result = $client->auth()->createUser([
            'project_id' => 'spring-example-302709',
            'auth_provider' => 'mock',
            'email' => 'user@example.com',
            'name' => 'John Doe',
        ]);

        expect($result)->toBe(authUserResource());
    });

    test('delete user', function () {
        $client = mockClient(
            'DELETE',
            'projects/spring-example-302709/auth/users/user-789',
            [],
            []
        );

        $result = $client->auth()->deleteUser('spring-example-302709', 'user-789');

        expect($result)->toBe([]);
    });

    test('transfer provider project', function () {
        $client = mockClient(
            'POST',
            'projects/auth/transfer_ownership',
            [
                'project_id' => 'spring-example-302709',
                'auth_provider' => 'mock',
            ],
            authTransferProjectResource()
        );

        $result = $client->auth()->transferProviderProject([
            'project_id' => 'spring-example-302709',
            'auth_provider' => 'mock',
        ]);

        expect($result)->toBe(authTransferProjectResource());
    });

    test('list integrations', function () {
        $client = mockClient(
            'GET',
            'projects/spring-example-302709/auth/integrations',
            [],
            authIntegrationsResource()
        );

        $result = $client->auth()->listIntegrations('spring-example-302709');

        expect($result)->toBe(authIntegrationsResource());
    });

    test('list oauth providers', function () {
        $client = mockClient(
            'GET',
            'projects/spring-example-302709/auth/oauth_providers',
            [],
            authOauthProvidersResource()
        );

        $result = $client->auth()->listOauthProviders('spring-example-302709');

        expect($result)->toBe(authOauthProvidersResource());
    });

    test('add oauth provider', function () {
        $client = mockClient(
            'POST',
            'projects/spring-example-302709/auth/oauth_providers',
            [
                'id' => 'microsoft',
                'client_id' => 'microsoft-client-456',
                'client_secret' => 'microsoft-secret-456',
            ],
            authOauthProviderResource()
        );

        $result = $client->auth()->addOauthProvider('spring-example-302709', [
            'id' => 'microsoft',
            'client_id' => 'microsoft-client-456',
            'client_secret' => 'microsoft-secret-456',
        ]);

        expect($result)->toBe(authOauthProviderResource());
    });

    test('update oauth provider', function () {
        $client = mockClient(
            'PATCH',
            'projects/spring-example-302709/auth/oauth_providers/google',
            [
                'client_id' => 'google-client-updated',
                'client_secret' => 'google-secret-updated',
            ],
            authOauthProviderUpdatedResource()
        );

        $result = $client->auth()->updateOauthProvider('spring-example-302709', 'google', [
            'client_id' => 'google-client-updated',
            'client_secret' => 'google-secret-updated',
        ]);

        expect($result)->toBe(authOauthProviderUpdatedResource());
    });

    test('delete oauth provider', function () {
        $client = mockClient(
            'DELETE',
            'projects/spring-example-302709/auth/oauth_providers/microsoft',
            [],
            []
        );

        $result = $client->auth()->deleteOauthProvider('spring-example-302709', 'microsoft');

        expect($result)->toBe([]);
    });

    test('get email server config', function () {
        $client = mockClient(
            'GET',
            'projects/spring-example-302709/auth/email_server/',
            [],
            authEmailServerConfigResource()
        );

        $result = $client->auth()->getEmailServerConfig('spring-example-302709');

        expect($result)->toBe(authEmailServerConfigResource());
    });

    test('update email server config', function () {
        $client = mockClient(
            'PATCH',
            'projects/spring-example-302709/auth/email_server/',
            [
                'type' => 'standard',
                'host' => 'smtp.newhost.com',
                'port' => 465,
                'username' => 'auth@newhost.com',
                'password' => 'new-smtp-password',
                'sender_email' => 'auth@newhost.com',
                'sender_name' => 'New Auth Service',
            ],
            authEmailServerConfigUpdatedResource()
        );

        $result = $client->auth()->updateEmailServerConfig('spring-example-302709', [
            'type' => 'standard',
            'host' => 'smtp.newhost.com',
            'port' => 465,
            'username' => 'auth@newhost.com',
            'password' => 'new-smtp-password',
            'sender_email' => 'auth@newhost.com',
            'sender_name' => 'New Auth Service',
        ]);

        expect($result)->toBe(authEmailServerConfigUpdatedResource());
    });

    test('delete integration', function () {
        $client = mockClient(
            'DELETE',
            'projects/spring-example-302709/auth/integration/mock',
            [],
            []
        );

        $result = $client->auth()->deleteIntegration('spring-example-302709', 'mock');

        expect($result)->toBe([]);
    });
})->group('Auth');

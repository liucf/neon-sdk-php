<?php

describe('Users', function () {
    test('me', function () {
        $client = mockClient(
            'GET',
            'users/me',
            [],
            userResource()
        );

        $result = $client->users()->me();

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('user-123456')
            ->and($result['email'])
            ->toBe('user@example.com')
            ->and($result['name'])
            ->toBe('John Doe')
            ->and($result['login'])
            ->toBe('johndoe')
            ->and($result['plan'])
            ->toBe('pro')
            ->and($result['projects_limit'])
            ->toBe(10)
            ->and($result['branches_limit'])
            ->toBe(100)
            ->and($result['billing_account']['id'])
            ->toBe('billing-123456')
            ->and($result['billing_account']['plan'])
            ->toBe('pro');
    });

    test('organizations', function () {
        $client = mockClient(
            'GET',
            'users/me/organizations',
            [],
            userOrganizationsResource()
        );

        $result = $client->users()->organizations();

        expect($result)
            ->toBeArray()
            ->organizations
            ->toHaveCount(2)
            ->and($result['organizations'][0]['id'])
            ->toBe('org-123456')
            ->and($result['organizations'][0]['name'])
            ->toBe('My Company')
            ->and($result['organizations'][0]['slug'])
            ->toBe('my-company')
            ->and($result['organizations'][1]['id'])
            ->toBe('org-789012')
            ->and($result['organizations'][1]['name'])
            ->toBe('My Startup')
            ->and($result['organizations'][1]['slug'])
            ->toBe('my-startup');
    });

    test('transferProjects', function () {
        $client = mockClient(
            'POST',
            'users/me/projects/transfer',
            [
                'project_ids' => ['royal-hall-11111111'],
                'org_id' => 'org-123456',
            ],
            userTransferProjectsResource()
        );

        $result = $client->users()->transferProjects([
            'project_ids' => ['royal-hall-11111111'],
            'org_id' => 'org-123456',
        ]);

        expect($result)
            ->toBeArray()
            ->projects
            ->toHaveCount(1)
            ->and($result['projects'][0]['id'])
            ->toBe('royal-hall-11111111')
            ->and($result['projects'][0]['name'])
            ->toBe('transferred-project-1')
            ->and($result['projects'][0]['org_id'])
            ->toBe('org-123456');
    });

    test('authDetails', function () {
        $client = mockClient(
            'GET',
            'auth',
            [],
            userAuthDetailsResource()
        );

        $result = $client->users()->authDetails();

        expect($result)
            ->toBeArray()
            ->and($result['type'])
            ->toBe('api_key')
            ->and($result['user_id'])
            ->toBe('user-123456')
            ->and($result['api_key_id'])
            ->toBe('ak-123456789')
            ->and($result['scopes'])
            ->toHaveCount(2)
            ->and($result['scopes'])
            ->toContain('read', 'write')
            ->and($result['last_used_from_addr'])
            ->toBe('192.168.1.100');
    });
});

<?php

describe('Organizations', function () {
    test('retrieve', function () {
        $client = mockClient(
            'GET',
            'organizations/org-morning-bread-81040908',
            [],
            organizationResource()
        );

        $result = $client->organizations()->retrieve('org-morning-bread-81040908');

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('org-morning-bread-81040908')
            ->and($result['name'])
            ->toBe('MyOrganization')
            ->and($result['plan'])
            ->toBe('scale');
    });

    test('list api keys', function () {
        $client = mockClient(
            'GET',
            'organizations/org-morning-bread-81040908/api_keys',
            [],
            organizationApiKeysResource()
        );

        $result = $client->organizations()->listApiKeys('org-morning-bread-81040908');

        expect($result)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($result[0]['id'])
            ->toBe(165432)
            ->and($result[0]['name'])
            ->toBe('orgkey_1');
    });

    test('create api key', function () {
        $client = mockClient(
            'POST',
            'organizations/org-morning-bread-81040908/api_keys',
            ['key_name' => 'org-api-key'],
            organizationCreateApiKeyResource()
        );

        $result = $client->organizations()->createApiKey('org-morning-bread-81040908', [
            'key_name' => 'org-api-key',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(165434)
            ->and($result['name'])
            ->toBe('org-api-key')
            ->and($result['key'])
            ->toBeString();
    });

    test('revoke api key', function () {
        $client = mockClient(
            'DELETE',
            'organizations/org-morning-bread-81040908/api_keys/165434',
            [],
            organizationRevokeApiKeyResource()
        );

        $result = $client->organizations()->revokeApiKey('org-morning-bread-81040908', 165434);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(165434)
            ->and($result['revoked'])
            ->toBeTrue();
    });

    test('get members', function () {
        $client = mockClient(
            'GET',
            'organizations/org-morning-bread-81040908/members',
            [],
            organizationMembersResource()
        );

        $result = $client->organizations()->getMembers('org-morning-bread-81040908');

        expect($result)
            ->toBeArray()
            ->members
            ->toHaveCount(2)
            ->and($result['members'][0]['id'])
            ->toBe('user-123')
            ->and($result['members'][0]['role'])
            ->toBe('admin');
    });

    test('update member', function () {
        $client = mockClient(
            'PATCH',
            'organizations/org-morning-bread-81040908/members/user-123',
            ['role' => 'admin'],
            organizationUpdateMemberResource()
        );

        $result = $client->organizations()->updateMember('org-morning-bread-81040908', 'user-123', [
            'role' => 'admin',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['role'])
            ->toBe('admin');
    });

    test('remove member', function () {
        $client = mockClient(
            'DELETE',
            'organizations/org-morning-bread-81040908/members/user-123',
            [],
            organizationRemoveMemberResource()
        );

        $result = $client->organizations()->removeMember('org-morning-bread-81040908', 'user-123');

        expect($result)
            ->toBeArray()
            ->and($result['user_id'])
            ->toBe('user-123');
    });

    test('create invitation', function () {
        $client = mockClient(
            'POST',
            'organizations/org-morning-bread-81040908/invitations',
            ['email' => 'user@example.com', 'role' => 'member'],
            organizationCreateInvitationResource()
        );

        $result = $client->organizations()->createInvitation('org-morning-bread-81040908', [
            'email' => 'user@example.com',
            'role' => 'member',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['email'])
            ->toBe('user@example.com')
            ->and($result['role'])
            ->toBe('member');
    });

    test('list invitations', function () {
        $client = mockClient(
            'GET',
            'organizations/org-morning-bread-81040908/invitations',
            [],
            organizationInvitationsResource()
        );

        $result = $client->organizations()->listInvitations('org-morning-bread-81040908');

        expect($result)
            ->toBeArray()
            ->invitations
            ->toHaveCount(2);
    });

    test('revoke invitation', function () {
        $client = mockClient(
            'DELETE',
            'organizations/org-morning-bread-81040908/invitations/123',
            [],
            organizationRevokeInvitationResource()
        );

        $result = $client->organizations()->revokeInvitation('org-morning-bread-81040908', 123);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(123)
            ->and($result['status'])
            ->toBe('revoked');
    });

    test('resend invitation', function () {
        $client = mockClient(
            'POST',
            'organizations/org-morning-bread-81040908/invitations/123/resend',
            [],
            organizationResendInvitationResource()
        );

        $result = $client->organizations()->resendInvitation('org-morning-bread-81040908', 123);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(123)
            ->and($result['status'])
            ->toBe('sent');
    });

    test('transfer projects', function () {
        $client = mockClient(
            'POST',
            'organizations/org-morning-bread-81040908/transfer',
            ['project_ids' => ['project-123', 'project-456']],
            organizationTransferProjectsResource()
        );

        $result = $client->organizations()->transferProjects('org-morning-bread-81040908', [
            'project_ids' => ['project-123', 'project-456'],
        ]);

        expect($result)
            ->toBeArray()
            ->transferred_projects
            ->toHaveCount(2);
    });

    test('list vpc endpoints', function () {
        $client = mockClient(
            'GET',
            'organizations/org-morning-bread-81040908/vpc_endpoints',
            [],
            organizationVpcEndpointsResource()
        );

        $result = $client->organizations()->listVpcEndpoints('org-morning-bread-81040908');

        expect($result)
            ->toBeArray()
            ->vpc_endpoints
            ->toHaveCount(1);
    });

    test('get vpc endpoint details', function () {
        $client = mockClient(
            'GET',
            'organizations/org-morning-bread-81040908/vpc/region/us-east-1/vpc_endpoints/vpce-123',
            [],
            organizationVpcEndpointDetailsResource()
        );

        $result = $client->organizations()->getVpcEndpointDetails('org-morning-bread-81040908', 'us-east-1', 'vpce-123');

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('vpce-123')
            ->and($result['state'])
            ->toBe('available');
    });

    test('assign vpc endpoint', function () {
        $client = mockClient(
            'POST',
            'organizations/org-morning-bread-81040908/vpc/region/us-east-1/vpc_endpoints/vpce-123',
            ['label' => 'production-vpc'],
            organizationAssignVpcEndpointResource()
        );

        $result = $client->organizations()->assignVpcEndpoint('org-morning-bread-81040908', 'us-east-1', 'vpce-123', [
            'label' => 'production-vpc',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('vpce-123')
            ->and($result['label'])
            ->toBe('production-vpc');
    });

    test('delete vpc endpoint', function () {
        $client = mockClient(
            'DELETE',
            'organizations/org-morning-bread-81040908/vpc/region/us-east-1/vpc_endpoints/vpce-123',
            [],
            organizationDeleteVpcEndpointResource()
        );

        $result = $client->organizations()->deleteVpcEndpoint('org-morning-bread-81040908', 'us-east-1', 'vpce-123');

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('vpce-123')
            ->and($result['status'])
            ->toBe('deleted');
    });
});

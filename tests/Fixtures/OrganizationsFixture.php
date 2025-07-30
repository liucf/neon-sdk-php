<?php

function organizationResource(): array
{
    return [
        'id' => 'org-morning-bread-81040908',
        'name' => 'MyOrganization',
        'handle' => 'my-organization-handle-81040908',
        'plan' => 'scale',
        'managed_by' => 'console',
        'created_at' => '2024-02-23T17:42:25Z',
        'updated_at' => '2024-02-26T20:41:25Z',
    ];
}

function organizationApiKeysResource(): array
{
    return [
        [
            'id' => 165432,
            'name' => 'orgkey_1',
            'created_at' => '2022-11-15T20:13:35Z',
            'created_by' => [
                'id' => '629982cc-de05-43db-ae16-28f2399c4910',
                'name' => 'John Smith',
                'image' => 'http://link.to.image',
            ],
            'last_used_at' => '2022-11-15T20:22:51Z',
            'last_used_from_addr' => '192.0.2.255',
        ],
        [
            'id' => 165433,
            'name' => 'orgkey_2',
            'created_at' => '2022-11-15T20:12:36Z',
            'created_by' => [
                'id' => '629982cc-de05-43db-ae16-28f2399c4910',
                'name' => 'John Smith',
                'image' => 'http://link.to.image',
            ],
            'last_used_at' => '2022-11-15T20:15:04Z',
            'last_used_from_addr' => '192.0.2.255',
        ],
    ];
}

function organizationCreateApiKeyResource(): array
{
    return [
        'id' => 165434,
        'key' => '9v1faketcjbl4sn1013keyd43n2a8qlfakeog8yvp40hx16keyjo1bpds4y2dfms3',
        'name' => 'org-api-key',
        'created_at' => '2022-11-15T20:13:35Z',
        'created_by' => '629982cc-de05-43db-ae16-28f2399c4910',
    ];
}

function organizationRevokeApiKeyResource(): array
{
    return [
        'id' => 165434,
        'name' => 'org-api-key',
        'created_at' => '2022-11-15T20:13:35Z',
        'created_by' => '629982cc-de05-43db-ae16-28f2399c4910',
        'last_used_at' => '2022-11-15T20:15:04Z',
        'last_used_from_addr' => '192.0.2.255',
        'revoked' => true,
    ];
}

function organizationMembersResource(): array
{
    return [
        'members' => [
            [
                'id' => 'user-123',
                'email' => 'admin@example.com',
                'name' => 'Admin User',
                'role' => 'admin',
                'joined_at' => '2024-02-23T17:42:25Z',
            ],
            [
                'id' => 'user-456',
                'email' => 'member@example.com',
                'name' => 'Member User',
                'role' => 'member',
                'joined_at' => '2024-02-24T10:15:30Z',
            ],
        ],
    ];
}

function organizationUpdateMemberResource(): array
{
    return [
        'id' => 'user-123',
        'email' => 'admin@example.com',
        'name' => 'Admin User',
        'role' => 'admin',
        'joined_at' => '2024-02-23T17:42:25Z',
    ];
}

function organizationRemoveMemberResource(): array
{
    return [
        'user_id' => 'user-123',
        'status' => 'removed',
    ];
}

function organizationCreateInvitationResource(): array
{
    return [
        'id' => 123,
        'email' => 'user@example.com',
        'role' => 'member',
        'status' => 'pending',
        'created_at' => '2024-02-25T14:30:00Z',
        'expires_at' => '2024-03-25T14:30:00Z',
    ];
}

function organizationInvitationsResource(): array
{
    return [
        'invitations' => [
            [
                'id' => 123,
                'email' => 'user1@example.com',
                'role' => 'member',
                'status' => 'pending',
                'created_at' => '2024-02-25T14:30:00Z',
                'expires_at' => '2024-03-25T14:30:00Z',
            ],
            [
                'id' => 124,
                'email' => 'user2@example.com',
                'role' => 'admin',
                'status' => 'pending',
                'created_at' => '2024-02-25T15:45:00Z',
                'expires_at' => '2024-03-25T15:45:00Z',
            ],
        ],
    ];
}

function organizationRevokeInvitationResource(): array
{
    return [
        'id' => 123,
        'email' => 'user@example.com',
        'role' => 'member',
        'status' => 'revoked',
    ];
}

function organizationResendInvitationResource(): array
{
    return [
        'id' => 123,
        'email' => 'user@example.com',
        'role' => 'member',
        'status' => 'sent',
    ];
}

function organizationTransferProjectsResource(): array
{
    return [
        'transferred_projects' => [
            [
                'id' => 'project-123',
                'name' => 'Project One',
                'status' => 'transferred',
            ],
            [
                'id' => 'project-456',
                'name' => 'Project Two',
                'status' => 'transferred',
            ],
        ],
    ];
}

function organizationVpcEndpointsResource(): array
{
    return [
        'vpc_endpoints' => [
            [
                'id' => 'vpce-123',
                'region_id' => 'us-east-1',
                'label' => 'production-vpc',
                'state' => 'available',
                'created_at' => '2024-02-20T10:00:00Z',
            ],
        ],
    ];
}

function organizationVpcEndpointDetailsResource(): array
{
    return [
        'id' => 'vpce-123',
        'region_id' => 'us-east-1',
        'label' => 'production-vpc',
        'state' => 'available',
        'policy_document' => '{}',
        'created_at' => '2024-02-20T10:00:00Z',
        'updated_at' => '2024-02-20T10:00:00Z',
    ];
}

function organizationAssignVpcEndpointResource(): array
{
    return [
        'id' => 'vpce-123',
        'region_id' => 'us-east-1',
        'label' => 'production-vpc',
        'state' => 'available',
        'policy_document' => '{}',
    ];
}

function organizationDeleteVpcEndpointResource(): array
{
    return [
        'id' => 'vpce-123',
        'status' => 'deleted',
    ];
}

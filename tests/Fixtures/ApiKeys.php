<?php

function apiKeyResource(): array
{
    return [
        'id' => 2180775,
        'name' => 'Test API Key',
        'created_at' => '2025-07-25T00:16:39Z',
        'created_by' => createdByResource(),
        'last_used_at' => '2025-07-25T00:16:59Z',
        'last_used_from_addr' => '121.98.61.200,34.211.200.85',
    ];
}

function apiKeyRevokeResource(): array
{
    return [
        'id' => 2180775,
        'name' => 'Test API Key',
        'created_at' => '2025-07-25T00:16:39Z',
        'created_by' => '9d0e0c69-6f45-487f-881e-f5f56023bd4d',
        'last_used_at' => '2025-07-25T00:16:59Z',
        'last_used_from_addr' => '121.98.61.200,34.211.200.85',
        'revoked' => true,
    ];
}

function apiKeyListResource(): array
{
    return [
        apiKeyResource(),
        apiKeyResource(),
    ];
}

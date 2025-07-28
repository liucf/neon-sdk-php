<?php

function apiKeyResource(): array
{
    return [
        'id' => 2180775,
        'name' => 'Test API Key',
        'created_at' => "2025-07-25T00:16:39Z",
        'created_by' => createdByResource(),
        'last_used_at' => "2025-07-25T00:16:59Z",
        'last_used_from_addr' => "121.98.61.200,34.211.200.85"
    ];
}


function apiKeyListResource(): array
{
    return [
        'object' => 'list',
        'data' => [
            apiKeyResource(),
            apiKeyResource()
        ]
    ];
}

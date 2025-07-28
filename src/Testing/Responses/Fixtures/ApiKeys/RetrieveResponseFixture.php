<?php

declare(strict_types=1);

namespace Neon\Testing\Responses\Fixtures\ApiKeys;

final class RetrieveResponseFixture
{
    public const ATTRIBUTES = [
        'id' => 2180775,
        'name' => 'Test API Key',
        'created_at' => '2025-07-25T00:16:39Z',
        'created_by' => [
            'id' => '9d0e0c69-6f45-487f-881e-f5f56023bd4d',
            'name' => 'John Doe',
            'image' => 'https://lh3.googleusercontent.com/a/ACg8ocLbT17bXqZiNnjmdxJcI1UyPnR92T3BMB_WpmSPZJaHxAr8AA=s96-c',
        ],
        'last_used_at' => '2025-07-25T00:16:59Z',
        'last_used_from_addr' => '121.98.61.200,34.211.200.85'
    ];
}

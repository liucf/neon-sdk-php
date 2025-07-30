<?php

/**
 * Returns account consumption metrics resource for testing.
 */
function consumptionAccountResource(): array
{
    return [
        'periods' => [
            [
                'period_id' => 'period-123456',
                'consumption' => [
                    'active_time_seconds' => 3600,
                    'compute_time_seconds' => 1800,
                    'written_data_bytes' => 1073741824,
                    'synthetic_storage_size_bytes' => 2147483648,
                ],
                'period_start' => '2025-07-01T00:00:00Z',
                'period_end' => '2025-07-31T23:59:59Z',
                'projects' => [
                    [
                        'project_id' => 'royal-hall-11111111',
                        'project_name' => 'my-project',
                        'consumption' => [
                            'active_time_seconds' => 1800,
                            'compute_time_seconds' => 900,
                            'written_data_bytes' => 536870912,
                            'synthetic_storage_size_bytes' => 1073741824,
                        ],
                    ],
                ],
            ],
        ],
    ];
}

/**
 * Returns project consumption metrics resource for testing.
 */
function consumptionProjectsResource(): array
{
    return [
        'projects' => [
            [
                'project_id' => 'royal-hall-11111111',
                'project_name' => 'my-project-1',
                'periods' => [
                    [
                        'period_id' => 'period-123456',
                        'consumption' => [
                            'active_time_seconds' => 1800,
                            'compute_time_seconds' => 900,
                            'written_data_bytes' => 536870912,
                            'synthetic_storage_size_bytes' => 1073741824,
                        ],
                        'period_start' => '2025-07-01T00:00:00Z',
                        'period_end' => '2025-07-31T23:59:59Z',
                    ],
                ],
            ],
            [
                'project_id' => 'golden-sunset-22222222',
                'project_name' => 'my-project-2',
                'periods' => [
                    [
                        'period_id' => 'period-789012',
                        'consumption' => [
                            'active_time_seconds' => 1800,
                            'compute_time_seconds' => 900,
                            'written_data_bytes' => 268435456,
                            'synthetic_storage_size_bytes' => 536870912,
                        ],
                        'period_start' => '2025-07-01T00:00:00Z',
                        'period_end' => '2025-07-31T23:59:59Z',
                    ],
                ],
            ],
        ],
    ];
}

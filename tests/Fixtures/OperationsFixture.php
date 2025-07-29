<?php

function operationResource(): array
{
    return [
        'id' => '33d65f33-eabe-4f46-b945-aa2bb7772xxx',
        'project_id' => 'royal-hall-11111111',
        'branch_id' => 'br-billowing-lab-xxxxxx',
        'endpoint_id' => 'ep-royal-unit-xxxxxx',
        'action' => 'check_availability',
        'status' => 'finished',
        'failures_count' => 0,
        'created_at' => '2025-07-27T12:36:32Z',
        'updated_at' => '2025-07-27T12:36:35Z',
        'total_duration_ms' => 3000,
    ];
}

function operationListResource(): array
{
    return [
        'operations' => [
            operationResource(),
            operationResource(),
        ],
        'pagination' => [
            'cursor' => '2025-07-27T01:45:32.898729Z',
        ],
    ];
}

<?php

function regionResource(): array
{
    return [
        'region_id' => 'aws-us-east-2',
        'name' => 'AWS US East 2 (Ohio)',
        'default' => false,
        'geo_lat' => '39.96',
        'geo_long' => '-83',
    ];
}

function regionListResource(): array
{
    return [
        regionResource(),
        regionResource(),
    ];
}

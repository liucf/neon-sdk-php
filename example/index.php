<?php

require __DIR__ . '/vendor/autoload.php';

$neon = Neon::client('napi_bchxv45w3o8lve9m1oeuij5der2iovx9yuz4dq9bpyz7pn9p4m56hsa7od23y2gs');

try {
    $apiKeys = $neon->apiKeys()->list();
} catch (Exception $e) {
    exit('Error: ' . $e->getMessage());
}

echo json_encode($apiKeys);

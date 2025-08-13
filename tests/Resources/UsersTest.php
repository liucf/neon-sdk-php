<?php

use Neon\Responses\Users\AuthDetailsResponse;
use Neon\Responses\Users\MeResponse;
use Neon\Responses\Users\OrganizationResponse;
use Neon\Responses\Users\OrganizationsResponse;
use Neon\Responses\Users\TransferProjectsResponse;
use Neon\ValueObjects\Transporter\Response;

describe('Users', function () {
    test('me', function () {
        $client = mockClient(
            'GET',
            'users/me',
            [],
            Response::from(userResource())
        );

        $result = $client->users()->me();

        expect($result)
            ->toBeInstanceOf(MeResponse::class)
            ->id->toBe('user-123456')
            ->email->toBe('user@example.com')
            ->name->toBe('John Doe')
            ->login->toBe('johndoe')
            ->plan->toBe('free_v2')
            ->projectsLimit->toBe(10)
            ->branchesLimit->toBe(100)
            ->billingAccount->toBeNull();
    });

    test('organizations', function () {
        $client = mockClient(
            'GET',
            'users/me/organizations',
            [],
            Response::from(userOrganizationsResource())
        );

        $result = $client->users()->organizations();

        expect($result)
            ->toBeInstanceOf(OrganizationsResponse::class)
            ->organizations->toHaveCount(2)
            ->organizations->each->toBeInstanceOf(OrganizationResponse::class);
    });

    test('transferProjects successful', function () {
        $client = mockClient(
            'POST',
            'users/me/projects/transfer',
            [
                'project_ids' => ['royal-hall-11111111'],
                'destination_org_id' => 'org-123456',
            ],
            Response::from([])
        );

        $result = $client->users()->transferProjects([
            'project_ids' => ['royal-hall-11111111'],
            'destination_org_id' => 'org-123456',
        ]);
        expect($result)
            ->toBeInstanceOf(TransferProjectsResponse::class);
    });

    test('authDetails', function () {
        $client = mockClient(
            'GET',
            'auth',
            [],
            Response::from(userAuthDetailsResource())
        );

        $result = $client->users()->authDetails();

        expect($result)
            ->toBeInstanceOf(AuthDetailsResponse::class)
            ->accountId->toBe('9d0e0c69-f8b2-4c1a-9d0e-0c69f8b24xxx')
            ->authMethod->toBe('api_key_user')
            ->authData->toBe('1234567890abcdef');   
    });
});

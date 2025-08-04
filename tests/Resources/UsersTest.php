<?php

use Neon\Responses\Users\AuthDetailsResponse;
use Neon\Responses\Users\BillingAccountResponse;
use Neon\Responses\Users\MeResponse;
use Neon\Responses\Users\OrganizationResponse;
use Neon\Responses\Users\OrganizationsResponse;
use Neon\Responses\Users\ProjectResponse;
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
            ->plan->toBe('pro')
            ->projectsLimit->toBe(10)
            ->branchesLimit->toBe(100)
            ->billingAccount->toBeInstanceOf(BillingAccountResponse::class)
            ->billingAccount->id->toBe('billing-123456')
            ->billingAccount->plan->toBe('pro');
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

    test('transferProjects', function () {
        $client = mockClient(
            'POST',
            'users/me/projects/transfer',
            [
                'project_ids' => ['royal-hall-11111111'],
                'org_id' => 'org-123456',
            ],
            Response::from(userTransferProjectsResource())
        );

        $result = $client->users()->transferProjects([
            'project_ids' => ['royal-hall-11111111'],
            'org_id' => 'org-123456',
        ]);

        expect($result)
            ->toBeInstanceOf(TransferProjectsResponse::class)
            ->projects->toHaveCount(1)
            ->projects->each->toBeInstanceOf(ProjectResponse::class);
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
            ->type->toBe('api_key')
            ->userId->toBe('user-123456')
            ->apiKeyId->toBe('ak-123456789')
            ->scopes->toHaveCount(2)
            ->scopes->toContain('read', 'write')
            ->lastUsedFromAddr->toBe('192.168.1.100');
    });
});

<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\Responses\Users\AuthDetailsResponse;
use Neon\Responses\Users\MeResponse;
use Neon\Responses\Users\OrganizationsResponse;
use Neon\Responses\Users\TransferProjectsResponse;
use Neon\ValueObjects\Transporter\Payload;

final class Users
{
    use Concerns\Transportable;

    /**
     * Retrieves information about the current Neon user account.
     *
     * @see https://api-docs.neon.tech/reference/getcurrentuserinfo
     */
    public function me(): MeResponse
    {
        $payload = Payload::list('users/me');

        $response = $this->transporter->request($payload);

        return MeResponse::from($response->data());
    }

    /**
     * Retrieves information about the current Neon user's organizations.
     *
     * @see https://api-docs.neon.tech/reference/getcurrentuserorganizations
     */
    public function organizations(): OrganizationsResponse
    {
        $payload = Payload::list('users/me/organizations');

        $response = $this->transporter->request($payload);

        return OrganizationsResponse::from($response->data());
    }

    /**
     * Transfers selected projects from your personal account to a specified organization.
     *
     * @param  array<string, mixed>  $data
     *
     * @see https://api-docs.neon.tech/reference/transferprojectsfromusertoorg
     */
    public function transferProjects(array $data): TransferProjectsResponse
    {
        $payload = Payload::create('users/me/projects/transfer', $data);

        $response = $this->transporter->request($payload);

        return TransferProjectsResponse::from($response->data());
    }

    /**
     * Returns auth information about the passed credentials.
     *
     * @see https://api-docs.neon.tech/reference/getauthdetails
     */
    public function authDetails(): AuthDetailsResponse
    {
        $payload = Payload::list('auth');

        $response = $this->transporter->request($payload);

        return AuthDetailsResponse::from($response->data());
    }
}

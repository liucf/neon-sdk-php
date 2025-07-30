<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\Contracts\TransporterContract;
use Neon\ValueObjects\Transporter\Payload;

final class Users
{
    public function __construct(private readonly TransporterContract $transporter) {}

    /**
     * Retrieves information about the current Neon user account.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getcurrentuserinfo
     */
    public function me(): array
    {
        $payload = Payload::list('users/me');

        return $this->transporter->request($payload);
    }

    /**
     * Retrieves information about the current Neon user's organizations.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getcurrentuserorganizations
     */
    public function organizations(): array
    {
        $payload = Payload::list('users/me/organizations');

        return $this->transporter->request($payload);
    }

    /**
     * Transfers selected projects from your personal account to a specified organization.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/transferprojectsfromusertoorg
     */
    public function transferProjects(array $data): array
    {
        $payload = Payload::create('users/me/projects/transfer', $data);

        return $this->transporter->request($payload);
    }

    /**
     * Returns auth information about the passed credentials.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getauthdetails
     */
    public function authDetails(): array
    {
        $payload = Payload::list('auth');

        return $this->transporter->request($payload);
    }
}

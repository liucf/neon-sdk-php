<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class Organizations
{
    use Concerns\Transportable;

    /**
     * Retrieve organization details
     *
     * Retrieves information about the specified organization.
     *
     * @return array<string, mixed>
     */
    public function retrieve(string $orgId): array
    {
        $payload = Payload::retrieve('organizations', $orgId);

        return $this->transporter->request($payload);
    }

    /**
     * List organization API keys
     *
     * Retrieves the API keys for the specified organization.
     * The response does not include API key tokens. A token is only provided when creating an API key.
     *
     * @return array<string, mixed>
     */
    public function listApiKeys(string $orgId): array
    {
        $payload = Payload::list("organizations/{$orgId}/api_keys");

        return $this->transporter->request($payload);
    }

    /**
     * Create organization API key
     *
     * Creates an API key for the specified organization.
     * The key_name is a user-specified name for the key.
     * This method returns an id and key. The key is a randomly generated, 64-bit token required to access the Neon API.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function createApiKey(string $orgId, array $parameters): array
    {
        $payload = Payload::create("organizations/{$orgId}/api_keys", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Revoke organization API key
     *
     * Revokes the specified API key for an organization.
     * An API key that is no longer needed can be revoked.
     * This action cannot be reversed.
     *
     * @return array<string, mixed>
     */
    public function revokeApiKey(string $orgId, int $keyId): array
    {
        $payload = Payload::delete("organizations/{$orgId}/api_keys", (string) $keyId);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve organization members details
     *
     * Retrieves information about the specified organization members.
     *
     * @return array<string, mixed>
     */
    public function getMembers(string $orgId): array
    {
        $payload = Payload::list("organizations/{$orgId}/members");

        return $this->transporter->request($payload);
    }

    /**
     * Update role for organization member
     *
     * Updates the role for the specified organization member.
     * Only an admin can perform this action.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function updateMember(string $orgId, string $userId, array $parameters): array
    {
        $payload = Payload::modify("organizations/{$orgId}/members", $userId, $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Remove organization member
     *
     * Removes the specified member from the organization.
     * Only an admin can perform this action.
     *
     * @return array<string, mixed>
     */
    public function removeMember(string $orgId, string $userId): array
    {
        $payload = Payload::delete("organizations/{$orgId}/members", $userId);

        return $this->transporter->request($payload);
    }

    /**
     * Create organization invitation
     *
     * Creates an invitation to join the organization.
     * Only an admin can perform this action.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function createInvitation(string $orgId, array $parameters): array
    {
        $payload = Payload::create("organizations/{$orgId}/invitations", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * List organization invitations
     *
     * Retrieves all pending invitations for the specified organization.
     *
     * @return array<string, mixed>
     */
    public function listInvitations(string $orgId): array
    {
        $payload = Payload::list("organizations/{$orgId}/invitations");

        return $this->transporter->request($payload);
    }

    /**
     * Revoke organization invitation
     *
     * Revokes the specified invitation to join the organization.
     * Only an admin can perform this action.
     *
     * @return array<string, mixed>
     */
    public function revokeInvitation(string $orgId, int $invitationId): array
    {
        $payload = Payload::delete("organizations/{$orgId}/invitations", (string) $invitationId);

        return $this->transporter->request($payload);
    }

    /**
     * Resend organization invitation
     *
     * Resends the specified invitation to join the organization.
     * Only an admin can perform this action.
     *
     * @return array<string, mixed>
     */
    public function resendInvitation(string $orgId, int $invitationId): array
    {
        $payload = Payload::create("organizations/{$orgId}/invitations/{$invitationId}/resend", []);

        return $this->transporter->request($payload);
    }

    /**
     * Transfer projects to organization
     *
     * Transfer projects from personal account to the organization.
     * The user must be an organization admin to use this API.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function transferProjects(string $orgId, array $parameters): array
    {
        $payload = Payload::create("organizations/{$orgId}/transfer", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * List VPC endpoints
     *
     * Retrieves a list of VPC endpoints for the organization.
     * A VPC endpoint enables a secure connection between a Neon project in your cloud account
     * and other AWS cloud services, bypassing the public internet.
     *
     * @return array<string, mixed>
     */
    public function listVpcEndpoints(string $orgId): array
    {
        $payload = Payload::list("organizations/{$orgId}/vpc_endpoints");

        return $this->transporter->request($payload);
    }

    /**
     * Get VPC endpoint details
     *
     * Retrieves details for the specified VPC endpoint.
     * A VPC endpoint enables a secure connection between a Neon project in your cloud account
     * and other AWS cloud services, bypassing the public internet.
     *
     * @return array<string, mixed>
     */
    public function getVpcEndpointDetails(string $orgId, string $regionId, string $endpointId): array
    {
        $payload = Payload::retrieve("organizations/{$orgId}/vpc/region/{$regionId}/vpc_endpoints", $endpointId);

        return $this->transporter->request($payload);
    }

    /**
     * Assign or update VPC endpoint
     *
     * Assigns a VPC endpoint to a Neon organization or updates its existing assignment.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function assignVpcEndpoint(string $orgId, string $regionId, string $endpointId, array $parameters): array
    {
        $payload = Payload::create("organizations/{$orgId}/vpc/region/{$regionId}/vpc_endpoints/{$endpointId}", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Delete VPC endpoint
     *
     * Deletes the VPC endpoint from the specified Neon organization.
     * If you delete a VPC endpoint from a Neon organization, that VPC endpoint cannot be added back to the Neon organization.
     *
     * @return array<string, mixed>
     */
    public function deleteVpcEndpoint(string $orgId, string $regionId, string $vpcEndpointId): array
    {
        $payload = Payload::delete("organizations/{$orgId}/vpc/region/{$regionId}/vpc_endpoints", $vpcEndpointId);

        return $this->transporter->request($payload);
    }
}

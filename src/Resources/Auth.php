<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class Auth
{
    use Concerns\Transportable;

    /**
     * Create Neon Auth integration
     *
     * Creates a project on a third-party authentication provider's platform for use with Neon Auth.
     * Use this endpoint if the frontend integration flow can't be used.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function createIntegration(array $parameters): array
    {
        $payload = Payload::create('projects/auth/create', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * List domains in redirect_uri whitelist
     *
     * Lists the domains in the redirect_uri whitelist for the specified project.
     *
     * @return array<string, mixed>
     */
    public function listRedirectUriWhitelistDomains(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/auth/domains");

        return $this->transporter->request($payload);
    }

    /**
     * Add domain to redirect_uri whitelist
     *
     * Adds a domain to the redirect_uri whitelist for the specified project.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function addDomainToRedirectUriWhitelist(string $projectId, array $parameters): array
    {
        $payload = Payload::create("projects/{$projectId}/auth/domains", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Delete domain from redirect_uri whitelist
     *
     * Deletes a domain from the redirect_uri whitelist for the specified project.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function deleteDomainFromRedirectUriWhitelist(string $projectId, array $parameters): array
    {
        $payload = Payload::deleteWithBody("projects/{$projectId}/auth/domains", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Create Auth Provider SDK keys
     *
     * Generates SDK or API Keys for the auth provider. These might be called different things depending
     * on the auth provider you're using, but are generally used for setting up the frontend and backend SDKs.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function createProviderSdkKeys(array $parameters): array
    {
        $payload = Payload::create('projects/auth/keys', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Create new auth user
     *
     * Creates a new user in Neon Auth.
     * The user will be created in your neon_auth.users_sync table and automatically propagated to your auth project.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function createUser(array $parameters): array
    {
        $payload = Payload::create('projects/auth/user', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Delete auth user
     *
     * Deletes the auth user for the specified project.
     *
     * @return array<string, mixed>
     */
    public function deleteUser(string $projectId, string $authUserId): array
    {
        $payload = Payload::delete("projects/{$projectId}/auth/users", $authUserId);

        return $this->transporter->request($payload);
    }

    /**
     * Transfer Neon-managed auth project to your own account
     *
     * Transfer ownership of your Neon-managed auth project to your own auth provider account.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function transferProviderProject(array $parameters): array
    {
        $payload = Payload::create('projects/auth/transfer_ownership', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Lists active integrations with auth providers
     *
     * Retrieves all active integrations with auth providers for the specified project.
     *
     * @return array<string, mixed>
     */
    public function listIntegrations(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/auth/integrations");

        return $this->transporter->request($payload);
    }

    /**
     * List OAuth providers
     *
     * Lists the OAuth providers for the specified project.
     *
     * @return array<string, mixed>
     */
    public function listOauthProviders(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/auth/oauth_providers");

        return $this->transporter->request($payload);
    }

    /**
     * Add a OAuth provider
     *
     * Adds a OAuth provider to the specified project.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function addOauthProvider(string $projectId, array $parameters): array
    {
        $payload = Payload::create("projects/{$projectId}/auth/oauth_providers", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Update OAuth provider
     *
     * Updates a OAuth provider for the specified project.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function updateOauthProvider(string $projectId, string $oauthProviderId, array $parameters): array
    {
        $payload = Payload::modify("projects/{$projectId}/auth/oauth_providers", $oauthProviderId, $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Delete OAuth provider
     *
     * Deletes a OAuth provider from the specified project.
     *
     * @return array<string, mixed>
     */
    public function deleteOauthProvider(string $projectId, string $oauthProviderId): array
    {
        $payload = Payload::delete("projects/{$projectId}/auth/oauth_providers", $oauthProviderId);

        return $this->transporter->request($payload);
    }

    /**
     * Get email server configuration
     *
     * Gets the email server configuration for the specified project.
     *
     * @return array<string, mixed>
     */
    public function getEmailServerConfig(string $projectId): array
    {
        $payload = Payload::retrieve("projects/{$projectId}/auth/email_server", '');

        return $this->transporter->request($payload);
    }

    /**
     * Update email server configuration
     *
     * Updates the email server configuration for the specified project.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function updateEmailServerConfig(string $projectId, array $parameters): array
    {
        $payload = Payload::modify("projects/{$projectId}/auth/email_server", '', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Delete integration with auth provider
     *
     * Deletes the integration with the specified auth provider.
     *
     * @return array<string, mixed>
     */
    public function deleteIntegration(string $projectId, string $authProvider): array
    {
        $payload = Payload::delete("projects/{$projectId}/auth/integration", $authProvider);

        return $this->transporter->request($payload);
    }
}

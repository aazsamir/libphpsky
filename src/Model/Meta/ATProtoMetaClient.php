<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Meta;

class ATProtoMetaClient
{
    private \Aazsamir\Libphpsky\Client\ATProtoClientInterface $client;
    private ?string $token;

    public function __construct(
        ?\Aazsamir\Libphpsky\Client\ATProtoClientInterface $client = null,
        ?string $token = null,
    ) {
        if ($client === null) {
            $client = \Aazsamir\Libphpsky\Client\ATProtoClientBuilder::getDefault();
        }
        $this->client = $client;
        $this->token = $token;
    }

    public function chatBskyModerationUpdateActorAccess(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\UpdateActorAccess\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\UpdateActorAccess\UpdateActorAccess($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * @param ?string $convoId Conversation that the message is from. NOTE: this field will eventually be required.
     */
    public function chatBskyModerationGetMessageContext(
        string $messageId,
        ?string $convoId = null,
        ?int $before = null,
        ?int $after = null,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext\GetMessageContext($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    public function chatBskyModerationGetActorMetadata(
        string $actor,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata\GetActorMetadata($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    public function chatBskyActorDeleteAccount(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\DeleteAccount\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\DeleteAccount\DeleteAccount($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    public function chatBskyActorExportAccountData(): mixed
    {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\ExportAccountData\ExportAccountData($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    public function chatBskyConvoSendMessageBatch(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\Input $input,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\SendMessageBatch($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    public function chatBskyConvoGetLog(
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetLog\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetLog\GetLog($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    public function chatBskyConvoMuteConvo(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo\Input $input,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo\MuteConvo($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    public function chatBskyConvoGetMessages(
        string $convoId,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetMessages\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetMessages\GetMessages($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    public function chatBskyConvoLeaveConvo(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LeaveConvo\Input $input,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LeaveConvo\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LeaveConvo\LeaveConvo($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    public function chatBskyConvoDeleteMessageForSelf(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\DeleteMessageForSelf\Input $input,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\DeleteMessageForSelf\DeleteMessageForSelf($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * @param array<string> $members
     */
    public function chatBskyConvoGetConvoForMembers(
        array $members,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvoForMembers\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvoForMembers\GetConvoForMembers($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    public function chatBskyConvoUnmuteConvo(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo\Input $input,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo\UnmuteConvo($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    public function chatBskyConvoListConvos(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos\ListConvos($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    public function chatBskyConvoSendMessage(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessage\Input $input,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessage\SendMessage($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    public function chatBskyConvoUpdateRead(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead\Input $input,
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead\Output {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead\UpdateRead($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    public function chatBskyConvoGetConvo(string $convoId): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvo\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvo\GetConvo($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Administrative action to update an account's email.
     */
    public function comAtprotoAdminUpdateAccountEmail(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountEmail\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountEmail\UpdateAccountEmail($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Disable some set of codes and/or all codes associated with a set of users.
     */
    public function comAtprotoAdminDisableInviteCodes(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableInviteCodes\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableInviteCodes\DisableInviteCodes($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get an admin view of invite codes.
     */
    public function comAtprotoAdminGetInviteCodes(
        ?string $sort = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetInviteCodes\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetInviteCodes\GetInviteCodes($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Disable an account from receiving new invite codes, but does not invalidate existing codes.
     */
    public function comAtprotoAdminDisableAccountInvites(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableAccountInvites\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableAccountInvites\DisableAccountInvites($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get details about an account.
     */
    public function comAtprotoAdminGetAccountInfo(
        string $did,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfo\GetAccountInfo($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get details about some accounts.
     * @param array<string> $dids
     */
    public function comAtprotoAdminGetAccountInfos(
        array $dids,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfos\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfos\GetAccountInfos($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Delete a user account as an administrator.
     */
    public function comAtprotoAdminDeleteAccount(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DeleteAccount\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DeleteAccount\DeleteAccount($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Administrative action to update an account's handle.
     */
    public function comAtprotoAdminUpdateAccountHandle(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountHandle\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountHandle\UpdateAccountHandle($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Update the service-specific admin status of a subject (account, record, or blob).
     */
    public function comAtprotoAdminUpdateSubjectStatus(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus\UpdateSubjectStatus($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Send email to a user's account email address.
     */
    public function comAtprotoAdminSendEmail(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail\SendEmail($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Re-enable an account's ability to receive invite codes.
     */
    public function comAtprotoAdminEnableAccountInvites(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\EnableAccountInvites\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\EnableAccountInvites\EnableAccountInvites($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get the service-specific admin status of a subject (account, record, or blob).
     */
    public function comAtprotoAdminGetSubjectStatus(
        ?string $did = null,
        ?string $uri = null,
        ?string $blob = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetSubjectStatus\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetSubjectStatus\GetSubjectStatus($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Update the password for a user account as an administrator.
     */
    public function comAtprotoAdminUpdateAccountPassword(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountPassword\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountPassword\UpdateAccountPassword($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get list of accounts that matches your search query.
     */
    public function comAtprotoAdminSearchAccounts(
        ?string $email = null,
        ?string $cursor = null,
        ?int $limit = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SearchAccounts\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SearchAccounts\SearchAccounts($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Request a service to persistently crawl hosted repos. Expected use is new PDS instances declaring their existence to Relays. Does not require auth.
     */
    public function comAtprotoSyncRequestCrawl(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\RequestCrawl\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\RequestCrawl\RequestCrawl($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Enumerates all the DID, rev, and commit CID for all repos hosted by this service. Does not require auth; implemented by PDS and Relay.
     */
    public function comAtprotoSyncListRepos(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos\ListRepos($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get the hosting status for a repository, on this server. Expected to be implemented by PDS and Relay.
     * @param string $did The DID of the repo.
     */
    public function comAtprotoSyncGetRepoStatus(
        string $did,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepoStatus\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepoStatus\GetRepoStatus($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Download a repository export as CAR file. Optionally only a 'diff' since a previous revision. Does not require auth; implemented by PDS.
     * @param string $did The DID of the repo.
     * @param ?string $since The revision ('rev') of the repo to create a diff from.
     */
    public function comAtprotoSyncGetRepo(string $did, ?string $since = null): mixed
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepo\GetRepo($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Notify a crawling service of a recent update, and that crawling should resume. Intended use is after a gap between repo stream events caused the crawling service to disconnect. Does not require auth; implemented by Relay.
     */
    public function comAtprotoSyncNotifyOfUpdate(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\NotifyOfUpdate\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\NotifyOfUpdate\NotifyOfUpdate($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get data blocks needed to prove the existence or non-existence of record in the current version of repo. Does not require auth.
     * @param string $did The DID of the repo.
     * @param string $rkey Record Key
     * @param ?string $commit DEPRECATED: referenced a repo commit by CID, and retrieved record as of that commit
     */
    public function comAtprotoSyncGetRecord(
        string $did,
        string $collection,
        string $rkey,
        ?string $commit = null,
    ): mixed {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRecord\GetRecord($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a blob associated with a given account. Returns the full blob as originally uploaded. Does not require auth; implemented by PDS.
     * @param string $did The DID of the account.
     * @param string $cid The CID of the blob to fetch
     */
    public function comAtprotoSyncGetBlob(string $did, string $cid): mixed
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlob\GetBlob($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get data blocks from a given repo, by CID. For example, intermediate MST nodes, or records. Does not require auth; implemented by PDS.
     * @param string $did The DID of the repo.
     * @param array<string> $cids
     */
    public function comAtprotoSyncGetBlocks(string $did, array $cids): mixed
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlocks\GetBlocks($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * List blob CIDs for an account, since some repo revision. Does not require auth; implemented by PDS.
     * @param string $did The DID of the repo.
     * @param ?string $since Optional revision of the repo to list blobs since.
     */
    public function comAtprotoSyncListBlobs(
        string $did,
        ?string $since = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs\ListBlobs($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get the current commit CID & revision of the specified repo. Does not require auth.
     * @param string $did The DID of the repo.
     */
    public function comAtprotoSyncGetLatestCommit(
        string $did,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetLatestCommit\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetLatestCommit\GetLatestCommit($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * DEPRECATED - please use com.atproto.sync.getRepo instead
     * @param string $did The DID of the repo.
     */
    public function comAtprotoSyncGetCheckout(string $did): mixed
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetCheckout\GetCheckout($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * DEPRECATED - please use com.atproto.sync.getLatestCommit instead
     * @param string $did The DID of the repo.
     */
    public function comAtprotoSyncGetHead(string $did): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHead\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHead\GetHead($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Submit a moderation report regarding an atproto account or record. Implemented by moderation services (with PDS proxying), and requires auth.
     */
    public function comAtprotoModerationCreateReport(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport\CreateReport($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Validates a PLC operation to ensure that it doesn't violate a service's constraints or get the identity into a bad state, then submits it to the PLC registry
     */
    public function comAtprotoIdentitySubmitPlcOperation(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SubmitPlcOperation\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SubmitPlcOperation\SubmitPlcOperation($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Request an email with a code to in order to request a signed PLC operation. Requires Auth.
     */
    public function comAtprotoIdentityRequestPlcOperationSignature(): void
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\RequestPlcOperationSignature\RequestPlcOperationSignature($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Resolves a handle (domain name) to a DID.
     * @param string $handle The handle to resolve.
     */
    public function comAtprotoIdentityResolveHandle(
        string $handle,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Signs a PLC operation to update some value(s) in the requesting DID's document.
     */
    public function comAtprotoIdentitySignPlcOperation(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation\SignPlcOperation($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Updates the current account's handle. Verifies handle validity, and updates did:plc document if necessary. Implemented by PDS, and requires auth.
     */
    public function comAtprotoIdentityUpdateHandle(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\UpdateHandle\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\UpdateHandle\UpdateHandle($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Describe the credentials that should be included in the DID doc of an account that is migrating to this service.
     */
    public function comAtprotoIdentityGetRecommendedDidCredentials(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\GetRecommendedDidCredentials\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\GetRecommendedDidCredentials\GetRecommendedDidCredentials($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Check accounts location in signup queue.
     */
    public function comAtprotoTempCheckSignupQueue(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue\CheckSignupQueue($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Add a handle to the set of reserved handles.
     */
    public function comAtprotoTempAddReservedHandle(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle\AddReservedHandle($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Request a verification code to be sent to the supplied phone number
     */
    public function comAtprotoTempRequestPhoneVerification(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\RequestPhoneVerification\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\RequestPhoneVerification\RequestPhoneVerification($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * DEPRECATED: use queryLabels or subscribeLabels instead -- Fetch all labels from a labeler created after a certain date.
     */
    public function comAtprotoTempFetchLabels(
        ?int $since = null,
        ?int $limit = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\FetchLabels\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\FetchLabels\FetchLabels($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Import a repo in the form of a CAR file. Requires Content-Length HTTP header to be set.
     */
    public function comAtprotoRepoImportRepo(): void
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ImportRepo\ImportRepo($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Returns a list of missing blobs for the requesting account. Intended to be used in the account migration flow.
     */
    public function comAtprotoRepoListMissingBlobs(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs\ListMissingBlobs($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Delete a repository record, or ensure it doesn't exist. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoDeleteRecord(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord\DeleteRecord($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Create a single new repository record. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoCreateRecord(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord\CreateRecord($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Get a single record from a repository. Does not require auth.
     * @param string $repo The handle or DID of the repo.
     * @param string $collection The NSID of the record collection.
     * @param string $rkey The Record Key.
     * @param ?string $cid The CID of the version of the record. If not specified, then return the most recent version.
     */
    public function comAtprotoRepoGetRecord(
        string $repo,
        string $collection,
        string $rkey,
        ?string $cid = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\GetRecord\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\GetRecord\GetRecord($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * List a range of records in a repository, matching a specific collection. Does not require auth.
     * @param string $repo The handle or DID of the repo.
     * @param string $collection The NSID of the record type.
     * @param ?int $limit The number of records to return.
     * @param ?string $rkeyStart DEPRECATED: The lowest sort-ordered rkey to start from (exclusive)
     * @param ?string $rkeyEnd DEPRECATED: The highest sort-ordered rkey to stop at (exclusive)
     * @param ?bool $reverse Flag to reverse the order of the returned records.
     */
    public function comAtprotoRepoListRecords(
        string $repo,
        string $collection,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $rkeyStart = null,
        ?string $rkeyEnd = null,
        ?bool $reverse = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords\ListRecords($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get information about an account and repository, including the list of collections. Does not require auth.
     * @param string $repo The handle or DID of the repo.
     */
    public function comAtprotoRepoDescribeRepo(
        string $repo,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo\DescribeRepo($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Write a repository record, creating or updating it as needed. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoPutRecord(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord\PutRecord($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Apply a batch transaction of repository creates, updates, and deletes. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoApplyWrites(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\ApplyWrites($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Upload a new blob, to be referenced from a repository record. The blob will be deleted if it is not referenced within a time window (eg, minutes). Blob restrictions (mimetype, size, etc) are enforced when the reference is created. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoUploadBlob(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\UploadBlob\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\UploadBlob\UploadBlob($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Find labels relevant to the provided AT-URI patterns. Public endpoint for moderation services, though may return different or additional results with auth.
     * @param array<string> $uriPatterns  List of AT URI patterns to match (boolean 'OR'). Each may be a prefix (ending with '*'; will match inclusive of the string leading to '*'), or a full URI.
     * @param ?array<string> $sources  Optional list of label sources (DIDs) to filter on.
     */
    public function comAtprotoLabelQueryLabels(
        array $uriPatterns,
        ?array $sources = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Label\QueryLabels\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Label\QueryLabels\QueryLabels($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get information about the current auth session. Requires auth.
     */
    public function comAtprotoServerGetSession(): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetSession\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetSession\GetSession($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Request a token in order to update email.
     */
    public function comAtprotoServerRequestEmailUpdate(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailUpdate\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailUpdate\RequestEmailUpdate($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Delete the current session. Requires auth.
     */
    public function comAtprotoServerDeleteSession(): void
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteSession\DeleteSession($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Refresh an authentication session. Requires auth using the 'refreshJwt' (not the 'accessJwt').
     */
    public function comAtprotoServerRefreshSession(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RefreshSession\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RefreshSession\RefreshSession($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Delete an actor's account with a token and password. Can only be called after requesting a deletion token. Requires auth.
     */
    public function comAtprotoServerDeleteAccount(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteAccount\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteAccount\DeleteAccount($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Revoke an App Password by name.
     */
    public function comAtprotoServerRevokeAppPassword(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RevokeAppPassword\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RevokeAppPassword\RevokeAppPassword($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Initiate a user account deletion via email.
     */
    public function comAtprotoServerRequestAccountDelete(): void
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestAccountDelete\RequestAccountDelete($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Create an account. Implemented by PDS.
     */
    public function comAtprotoServerCreateAccount(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAccount\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAccount\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAccount\CreateAccount($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Reserve a repo signing key, for use with account creation. Necessary so that a DID PLC update operation can be constructed during an account migraiton. Public and does not require auth; implemented by PDS. NOTE: this endpoint may change when full account migration is implemented.
     */
    public function comAtprotoServerReserveSigningKey(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey\ReserveSigningKey($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Deactivates a currently active account. Stops serving of repo, and future writes to repo until reactivated. Used to finalize account migration with the old host after the account has been activated on the new host.
     */
    public function comAtprotoServerDeactivateAccount(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeactivateAccount\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeactivateAccount\DeactivateAccount($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Request an email with a code to confirm ownership of email.
     */
    public function comAtprotoServerRequestEmailConfirmation(): void
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailConfirmation\RequestEmailConfirmation($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get a signed token on behalf of the requesting DID for the requested service.
     * @param string $aud The DID of the service that the token will be used to authenticate with
     * @param ?int $exp The time in Unix Epoch seconds that the JWT expires. Defaults to 60 seconds in the future. The service may enforce certain time bounds on tokens depending on the requested scope.
     * @param ?string $lxm Lexicon (XRPC) method to bind the requested token to
     */
    public function comAtprotoServerGetServiceAuth(
        string $aud,
        ?int $exp = null,
        ?string $lxm = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetServiceAuth\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetServiceAuth\GetServiceAuth($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Returns the status of an account, especially as pertaining to import or recovery. Can be called many times over the course of an account migration. Requires auth and can only be called pertaining to oneself.
     */
    public function comAtprotoServerCheckAccountStatus(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CheckAccountStatus\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CheckAccountStatus\CheckAccountStatus($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Describes the server's account creation requirements and capabilities. Implemented by PDS.
     */
    public function comAtprotoServerDescribeServer(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer\DescribeServer($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Create invite codes.
     */
    public function comAtprotoServerCreateInviteCodes(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes\CreateInviteCodes($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Get all invite codes for the current account. Requires auth.
     * @param ?bool $createAvailable Controls whether any new 'earned' but not 'created' invites should be created.
     */
    public function comAtprotoServerGetAccountInviteCodes(
        ?bool $includeUsed = null,
        ?bool $createAvailable = null,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetAccountInviteCodes\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetAccountInviteCodes\GetAccountInviteCodes($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Confirm an email using a token from com.atproto.server.requestEmailConfirmation.
     */
    public function comAtprotoServerConfirmEmail(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ConfirmEmail\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ConfirmEmail\ConfirmEmail($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Update an account's email.
     */
    public function comAtprotoServerUpdateEmail(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\UpdateEmail\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\UpdateEmail\UpdateEmail($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Create an App Password.
     */
    public function comAtprotoServerCreateAppPassword(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAppPassword\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAppPassword\AppPassword {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAppPassword\CreateAppPassword($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * List all App Passwords.
     */
    public function comAtprotoServerListAppPasswords(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords\ListAppPasswords($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Create an authentication session.
     */
    public function comAtprotoServerCreateSession(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\CreateSession($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Initiate a user account password reset via email.
     */
    public function comAtprotoServerRequestPasswordReset(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestPasswordReset\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestPasswordReset\RequestPasswordReset($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Activates a currently deactivated account. Used to finalize account migration after the account's repo is imported and identity is setup.
     */
    public function comAtprotoServerActivateAccount(): void
    {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ActivateAccount\ActivateAccount($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Create an invite code.
     */
    public function comAtprotoServerCreateInviteCode(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCode\Input $input,
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCode\Output {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCode\CreateInviteCode($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Reset a user account password using a token.
     */
    public function comAtprotoServerResetPassword(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ResetPassword\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ResetPassword\ResetPassword($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get status details for a video processing job.
     */
    public function appBskyVideoGetJobStatus(
        string $jobId,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetJobStatus\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetJobStatus\GetJobStatus($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get video upload limits for the authenticated user.
     */
    public function appBskyVideoGetUploadLimits(): \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetUploadLimits\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetUploadLimits\GetUploadLimits($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Upload a video to be processed then stored on the PDS.
     */
    public function appBskyVideoUploadVideo(): \Aazsamir\Libphpsky\Model\App\Bsky\Video\UploadVideo\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Video\UploadVideo\UploadVideo($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Find actor suggestions for a prefix search term. Expected use is for auto-completion during text field entry. Does not require auth.
     * @param ?string $term DEPRECATED: use 'q' instead.
     * @param ?string $q Search query prefix; not a full query string.
     */
    public function appBskyActorSearchActorsTypeahead(
        ?string $term = null,
        ?string $q = null,
        ?int $limit = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActorsTypeahead\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActorsTypeahead\SearchActorsTypeahead($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get detailed profile views of multiple actors.
     * @param array<string> $actors
     */
    public function appBskyActorGetProfiles(
        array $actors,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfiles\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfiles\GetProfiles($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Set the private preferences attached to the account.
     */
    public function appBskyActorPutPreferences(
        \Aazsamir\Libphpsky\Model\App\Bsky\Actor\PutPreferences\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\PutPreferences\PutPreferences($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get detailed profile view of an actor. Does not require auth, but contains relevant metadata with auth.
     * @param string $actor Handle or DID of account to fetch profile of.
     */
    public function appBskyActorGetProfile(
        string $actor,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfile\GetProfile($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of suggested actors. Expected use is discovery of accounts to follow during new account onboarding.
     */
    public function appBskyActorGetSuggestions(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetSuggestions\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetSuggestions\GetSuggestions($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Find actors (profiles) matching search criteria. Does not require auth.
     * @param ?string $term DEPRECATED: use 'q' instead.
     * @param ?string $q Search query string. Syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     */
    public function appBskyActorSearchActors(
        ?string $term = null,
        ?string $q = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActors\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActors\SearchActors($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get private preferences attached to the current account. Expected use is synchronization between multiple devices, and import/export during account migration. Requires auth.
     */
    public function appBskyActorGetPreferences(): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetPreferences\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetPreferences\GetPreferences($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Notify server that the requesting account has seen notifications. Requires auth.
     */
    public function appBskyNotificationUpdateSeen(
        \Aazsamir\Libphpsky\Model\App\Bsky\Notification\UpdateSeen\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\UpdateSeen\UpdateSeen($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Register to receive push notifications, via a specified service, for the requesting account. Requires auth.
     */
    public function appBskyNotificationRegisterPush(
        \Aazsamir\Libphpsky\Model\App\Bsky\Notification\RegisterPush\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\RegisterPush\RegisterPush($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Set notification-related preferences for an account. Requires auth.
     */
    public function appBskyNotificationPutPreferences(
        \Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferences\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferences\PutPreferences($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Enumerate notifications for the requesting account. Requires auth.
     * @param ?array<string> $reasons  Notification reasons to include in response.
     */
    public function appBskyNotificationListNotifications(
        ?array $reasons = null,
        ?int $limit = null,
        ?bool $priority = null,
        ?string $cursor = null,
        ?\DateTimeInterface $seenAt = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\ListNotifications($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Count the number of unread notifications for the requesting account. Requires auth.
     */
    public function appBskyNotificationGetUnreadCount(
        ?bool $priority = null,
        ?\DateTimeInterface $seenAt = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetUnreadCount\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetUnreadCount\GetUnreadCount($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get information about a list of labeler services.
     * @param array<string> $dids
     */
    public function appBskyLabelerGetServices(
        array $dids,
        ?bool $detailed = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Labeler\GetServices\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Labeler\GetServices\GetServices($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a hydrated feed from an actor's selected feed generator. Implemented by App View.
     */
    public function appBskyFeedGetFeed(
        string $feed,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeed\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeed\GetFeed($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of suggested feeds (feed generators) for the requesting account.
     */
    public function appBskyFeedGetSuggestedFeeds(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetSuggestedFeeds\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetSuggestedFeeds\GetSuggestedFeeds($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get information about a feed generator, including policies and offered feed URIs. Does not require auth; implemented by Feed Generator services (not App View).
     */
    public function appBskyFeedDescribeFeedGenerator(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator\DescribeFeedGenerator($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of feeds (feed generator records) created by the actor (in the actor's repo).
     */
    public function appBskyFeedGetActorFeeds(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorFeeds\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorFeeds\GetActorFeeds($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of reposts for a given post.
     * @param string $uri Reference (AT-URI) of post record
     * @param ?string $cid If supplied, filters to reposts of specific version (by CID) of the post record.
     */
    public function appBskyFeedGetRepostedBy(
        string $uri,
        ?string $cid = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetRepostedBy\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetRepostedBy\GetRepostedBy($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a feed of recent posts from a list (posts and reposts from any actors on the list). Does not require auth.
     * @param string $list Reference (AT-URI) to the list record.
     */
    public function appBskyFeedGetListFeed(
        string $list,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetListFeed\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetListFeed\GetListFeed($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Gets post views for a specified list of posts (by AT-URI). This is sometimes referred to as 'hydrating' a 'feed skeleton'.
     * @param array<string> $uris  List of post AT-URIs to return hydrated views for.
     */
    public function appBskyFeedGetPosts(array $uris): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPosts\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPosts\GetPosts($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get information about a feed generator. Implemented by AppView.
     * @param string $feed AT-URI of the feed generator record.
     */
    public function appBskyFeedGetFeedGenerator(
        string $feed,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerator\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerator\GetFeedGenerator($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get information about a list of feed generators.
     * @param array<string> $feeds
     */
    public function appBskyFeedGetFeedGenerators(
        array $feeds,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerators\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerators\GetFeedGenerators($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of posts liked by an actor. Requires auth, actor must be the requesting account.
     */
    public function appBskyFeedGetActorLikes(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorLikes\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorLikes\GetActorLikes($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get posts in a thread. Does not require auth, but additional metadata and filtering will be applied for authed requests.
     * @param string $uri Reference (AT-URI) to post record.
     * @param ?int $depth How many levels of reply depth should be included in response.
     * @param ?int $parentHeight How many levels of parent (and grandparent, etc) post to include.
     */
    public function appBskyFeedGetPostThread(
        string $uri,
        ?int $depth = null,
        ?int $parentHeight = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPostThread\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPostThread\GetPostThread($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a view of the requesting account's home timeline. This is expected to be some form of reverse-chronological feed.
     * @param ?string $algorithm Variant 'algorithm' for timeline. Implementation-specific. NOTE: most feed flexibility has been moved to feed generator mechanism.
     */
    public function appBskyFeedGetTimeline(
        ?string $algorithm = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetTimeline\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetTimeline\GetTimeline($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Find posts matching search criteria, returning views of those posts.
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @param ?string $sort Specifies the ranking order of results.
     * @param ?string $since Filter results for posts after the indicated datetime (inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?string $until Filter results for posts before the indicated datetime (not inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYY-MM-DD).
     * @param ?string $mentions Filter to posts which mention the given account. Handles are resolved to DID before query-time. Only matches rich-text facet mentions.
     * @param ?string $author Filter to posts by the given account. Handles are resolved to DID before query-time.
     * @param ?string $lang Filter to posts in the given language. Expected to be based on post language field, though server may override language detection.
     * @param ?string $domain Filter to posts with URLs (facet links or embeds) linking to the given domain (hostname). Server may apply hostname normalization.
     * @param ?string $url Filter to posts with links (facet links or embeds) pointing to this URL. Server may apply URL normalization or fuzzy matching.
     * @param ?array<string> $tag  Filter to posts with the given tag (hashtag), based on rich-text facet or tag field. Do not include the hash (#) prefix. Multiple tags can be specified, with 'AND' matching.
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
     */
    public function appBskyFeedSearchPosts(
        string $q,
        ?string $sort = null,
        ?string $since = null,
        ?string $until = null,
        ?string $mentions = null,
        ?string $author = null,
        ?string $lang = null,
        ?string $domain = null,
        ?string $url = null,
        ?array $tag = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts\SearchPosts($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get like records which reference a subject (by AT-URI and CID).
     * @param string $uri AT-URI of the subject (eg, a post record).
     * @param ?string $cid CID of the subject record (aka, specific version of record), to filter likes.
     */
    public function appBskyFeedGetLikes(
        string $uri,
        ?string $cid = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes\GetLikes($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of quotes for a given post.
     * @param string $uri Reference (AT-URI) of post record
     * @param ?string $cid If supplied, filters to quotes of specific version (by CID) of the post record.
     */
    public function appBskyFeedGetQuotes(
        string $uri,
        ?string $cid = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes\GetQuotes($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a view of an actor's 'author feed' (post and reposts by the author). Does not require auth.
     * @param ?string $filter Combinations of post/repost types to include in response.
     */
    public function appBskyFeedGetAuthorFeed(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $filter = null,
        ?bool $includePins = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetAuthorFeed\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetAuthorFeed\GetAuthorFeed($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a skeleton of a feed provided by a feed generator. Auth is optional, depending on provider requirements, and provides the DID of the requester. Implemented by Feed Generator Service.
     * @param string $feed Reference to feed generator record describing the specific feed being requested.
     */
    public function appBskyFeedGetFeedSkeleton(
        string $feed,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton\GetFeedSkeleton($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Send information about interactions with feed items back to the feed generator that served them.
     */
    public function appBskyFeedSendInteractions(
        \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SendInteractions\Input $input,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SendInteractions\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SendInteractions\SendInteractions($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Enumerates the lists created by a specified account (actor).
     * @param string $actor The account (actor) to enumerate lists from.
     */
    public function appBskyGraphGetLists(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetLists\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetLists\GetLists($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Find starter packs matching search criteria. Does not require auth.
     * @param string $q Search query string. Syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     */
    public function appBskyGraphSearchStarterPacks(
        string $q,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\SearchStarterPacks\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\SearchStarterPacks\SearchStarterPacks($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get views for a list of starter packs.
     * @param array<string> $uris
     */
    public function appBskyGraphGetStarterPacks(
        array $uris,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacks\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacks\GetStarterPacks($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Creates a mute relationship for the specified list of accounts. Mutes are private in Bluesky. Requires auth.
     */
    public function appBskyGraphMuteActorList(
        \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActorList\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActorList\MuteActorList($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Enumerates accounts which follow a specified account (actor).
     */
    public function appBskyGraphGetFollowers(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollowers\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollowers\GetFollowers($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Enumerates accounts which a specified account (actor) follows.
     */
    public function appBskyGraphGetFollows(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollows\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollows\GetFollows($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Unmutes the specified thread. Requires auth.
     */
    public function appBskyGraphUnmuteThread(\Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteThread\Input $input): void
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteThread\UnmuteThread($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get a list of starter packs created by the actor.
     */
    public function appBskyGraphGetActorStarterPacks(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetActorStarterPacks\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetActorStarterPacks\GetActorStarterPacks($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Enumerates public relationships between one account, and a list of other accounts. Does not require auth.
     * @param string $actor Primary account requesting relationships for.
     * @param ?array<string> $others  List of 'other' accounts to be related back to the primary.
     */
    public function appBskyGraphGetRelationships(
        string $actor,
        ?array $others = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetRelationships\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetRelationships\GetRelationships($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get mod lists that the requesting account (actor) is blocking. Requires auth.
     */
    public function appBskyGraphGetListBlocks(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListBlocks\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListBlocks\GetListBlocks($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Mutes a thread preventing notifications from the thread and any of its children. Mutes are private in Bluesky. Requires auth.
     */
    public function appBskyGraphMuteThread(\Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteThread\Input $input): void
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteThread\MuteThread($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Creates a mute relationship for the specified account. Mutes are private in Bluesky. Requires auth.
     */
    public function appBskyGraphMuteActor(\Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActor\Input $input): void
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActor\MuteActor($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Enumerates accounts that the requesting account (actor) currently has muted. Requires auth.
     */
    public function appBskyGraphGetMutes(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetMutes\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetMutes\GetMutes($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Unmutes the specified account. Requires auth.
     */
    public function appBskyGraphUnmuteActor(\Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActor\Input $input): void
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActor\UnmuteActor($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Unmutes the specified list of accounts. Requires auth.
     */
    public function appBskyGraphUnmuteActorList(
        \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActorList\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActorList\UnmuteActorList($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Enumerates accounts which follow a specified account (actor) and are followed by the viewer.
     */
    public function appBskyGraphGetKnownFollowers(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetKnownFollowers\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetKnownFollowers\GetKnownFollowers($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Enumerates follows similar to a given account (actor). Expected use is to recommend additional accounts immediately after following one account.
     */
    public function appBskyGraphGetSuggestedFollowsByActor(
        string $actor,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetSuggestedFollowsByActor\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetSuggestedFollowsByActor\GetSuggestedFollowsByActor($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Gets a view of a starter pack.
     * @param string $starterPack Reference (AT-URI) of the starter pack record.
     */
    public function appBskyGraphGetStarterPack(
        string $starterPack,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPack\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPack\GetStarterPack($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Enumerates which accounts the requesting account is currently blocking. Requires auth.
     */
    public function appBskyGraphGetBlocks(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetBlocks\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetBlocks\GetBlocks($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Gets a 'view' (with additional context) of a specified list.
     * @param string $list Reference (AT-URI) of the list record to hydrate.
     */
    public function appBskyGraphGetList(
        string $list,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList\GetList($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Enumerates mod lists that the requesting account (actor) currently has muted. Requires auth.
     */
    public function appBskyGraphGetListMutes(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListMutes\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListMutes\GetListMutes($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of trending topics
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries). Used to boost followed accounts in ranking.
     */
    public function appBskyUnspeccedGetTrendingTopics(
        ?string $viewer = null,
        ?int $limit = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics\GetTrendingTopics($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Backend Starter Pack search, returns only skeleton.
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries).
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
     */
    public function appBskyUnspeccedSearchStarterPacksSkeleton(
        string $q,
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton\SearchStarterPacksSkeleton($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get miscellaneous runtime configuration.
     */
    public function appBskyUnspeccedGetConfig(): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig\GetConfig($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a list of suggestions (feeds and users) tagged with categories
     */
    public function appBskyUnspeccedGetTaggedSuggestions(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\GetTaggedSuggestions($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Backend Actors (profile) search, returns only skeleton.
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended. For typeahead search, only simple term match is supported, not full syntax.
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries). Used to boost followed accounts in ranking.
     * @param ?bool $typeahead If true, acts as fast/simple 'typeahead' query.
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
     */
    public function appBskyUnspeccedSearchActorsSkeleton(
        string $q,
        ?string $viewer = null,
        ?bool $typeahead = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchActorsSkeleton\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchActorsSkeleton\SearchActorsSkeleton($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get a skeleton of suggested actors. Intended to be called and then hydrated through app.bsky.actor.getSuggestions
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries). Used to boost followed accounts in ranking.
     * @param ?string $relativeToDid DID of the account to get suggestions relative to. If not provided, suggestions will be based on the viewer.
     */
    public function appBskyUnspeccedGetSuggestionsSkeleton(
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $relativeToDid = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton\GetSuggestionsSkeleton($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * An unspecced view of globally popular feed generators.
     */
    public function appBskyUnspeccedGetPopularFeedGenerators(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $query = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPopularFeedGenerators\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPopularFeedGenerators\GetPopularFeedGenerators($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Backend Posts search, returns only skeleton
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @param ?string $sort Specifies the ranking order of results.
     * @param ?string $since Filter results for posts after the indicated datetime (inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?string $until Filter results for posts before the indicated datetime (not inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYY-MM-DD).
     * @param ?string $mentions Filter to posts which mention the given account. Handles are resolved to DID before query-time. Only matches rich-text facet mentions.
     * @param ?string $author Filter to posts by the given account. Handles are resolved to DID before query-time.
     * @param ?string $lang Filter to posts in the given language. Expected to be based on post language field, though server may override language detection.
     * @param ?string $domain Filter to posts with URLs (facet links or embeds) linking to the given domain (hostname). Server may apply hostname normalization.
     * @param ?string $url Filter to posts with links (facet links or embeds) pointing to this URL. Server may apply URL normalization or fuzzy matching.
     * @param ?array<string> $tag  Filter to posts with the given tag (hashtag), based on rich-text facet or tag field. Do not include the hash (#) prefix. Multiple tags can be specified, with 'AND' matching.
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries). Used for 'from:me' queries.
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
     */
    public function appBskyUnspeccedSearchPostsSkeleton(
        string $q,
        ?string $sort = null,
        ?string $since = null,
        ?string $until = null,
        ?string $mentions = null,
        ?string $author = null,
        ?string $lang = null,
        ?string $domain = null,
        ?string $url = null,
        ?array $tag = null,
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchPostsSkeleton\Output {
        $action = new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchPostsSkeleton\SearchPostsSkeleton($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Administrative action to update an existing communication template. Allows passing partial fields to patch specific fields only.
     */
    public function toolsOzoneCommunicationUpdateTemplate(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\UpdateTemplate\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\Defs\TemplateView {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\UpdateTemplate\UpdateTemplate($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Administrative action to create a new, re-usable communication (email for now) template.
     */
    public function toolsOzoneCommunicationCreateTemplate(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\CreateTemplate\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\Defs\TemplateView {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\CreateTemplate\CreateTemplate($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Delete a communication template.
     */
    public function toolsOzoneCommunicationDeleteTemplate(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\DeleteTemplate\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\DeleteTemplate\DeleteTemplate($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get list of all communication templates.
     */
    public function toolsOzoneCommunicationListTemplates(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\ListTemplates\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\ListTemplates\ListTemplates($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get details about a repository.
     */
    public function toolsOzoneModerationGetRepo(
        string $did,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepo\GetRepo($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get details about some records.
     * @param array<string> $uris
     */
    public function toolsOzoneModerationGetRecords(
        array $uris,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords\GetRecords($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * View moderation statuses of subjects (record or repo).
     * @param ?int $queueCount Number of queues being used by moderators. Subjects will be split among all queues.
     * @param ?int $queueIndex Index of the queue to fetch subjects from. Works only when queueCount value is specified.
     * @param ?string $queueSeed A seeder to shuffle/balance the queue items.
     * @param ?bool $includeAllUserRecords All subjects, or subjects from given 'collections' param, belonging to the account specified in the 'subject' param will be returned.
     * @param ?string $subject The subject to get the status for.
     * @param ?string $comment Search subjects by keyword from comments
     * @param ?\DateTimeInterface $reportedAfter Search subjects reported after a given timestamp
     * @param ?\DateTimeInterface $reportedBefore Search subjects reported before a given timestamp
     * @param ?\DateTimeInterface $reviewedAfter Search subjects reviewed after a given timestamp
     * @param ?\DateTimeInterface $hostingDeletedAfter Search subjects where the associated record/account was deleted after a given timestamp
     * @param ?\DateTimeInterface $hostingDeletedBefore Search subjects where the associated record/account was deleted before a given timestamp
     * @param ?\DateTimeInterface $hostingUpdatedAfter Search subjects where the associated record/account was updated after a given timestamp
     * @param ?\DateTimeInterface $hostingUpdatedBefore Search subjects where the associated record/account was updated before a given timestamp
     * @param ?array<string> $hostingStatuses  Search subjects by the status of the associated record/account
     * @param ?\DateTimeInterface $reviewedBefore Search subjects reviewed before a given timestamp
     * @param ?bool $includeMuted By default, we don't include muted subjects in the results. Set this to true to include them.
     * @param ?bool $onlyMuted When set to true, only muted subjects and reporters will be returned.
     * @param ?string $reviewState Specify when fetching subjects in a certain state
     * @param ?array<string> $ignoreSubjects
     * @param ?string $lastReviewedBy Get all subject statuses that were reviewed by a specific moderator
     * @param ?bool $takendown Get subjects that were taken down
     * @param ?bool $appealed Get subjects in unresolved appealed status
     * @param ?array<string> $tags
     * @param ?array<string> $excludeTags
     * @param ?array<string> $collections  If specified, subjects belonging to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?string $subjectType If specified, subjects of the given type (account or record) will be returned. When this is set to 'account' the 'collections' parameter will be ignored. When includeAllUserRecords or subject is set, this will be ignored.
     * @param ?int $minAccountSuspendCount If specified, only subjects that belong to an account that has at least this many suspensions will be returned.
     * @param ?int $minReportedRecordsCount If specified, only subjects that belong to an account that has at least this many reported records will be returned.
     * @param ?int $minTakendownRecordsCount If specified, only subjects that belong to an account that has at least this many taken down records will be returned.
     */
    public function toolsOzoneModerationQueryStatuses(
        ?int $queueCount = null,
        ?int $queueIndex = null,
        ?string $queueSeed = null,
        ?bool $includeAllUserRecords = null,
        ?string $subject = null,
        ?string $comment = null,
        ?\DateTimeInterface $reportedAfter = null,
        ?\DateTimeInterface $reportedBefore = null,
        ?\DateTimeInterface $reviewedAfter = null,
        ?\DateTimeInterface $hostingDeletedAfter = null,
        ?\DateTimeInterface $hostingDeletedBefore = null,
        ?\DateTimeInterface $hostingUpdatedAfter = null,
        ?\DateTimeInterface $hostingUpdatedBefore = null,
        ?array $hostingStatuses = null,
        ?\DateTimeInterface $reviewedBefore = null,
        ?bool $includeMuted = null,
        ?bool $onlyMuted = null,
        ?string $reviewState = null,
        ?array $ignoreSubjects = null,
        ?string $lastReviewedBy = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?bool $takendown = null,
        ?bool $appealed = null,
        ?int $limit = null,
        ?array $tags = null,
        ?array $excludeTags = null,
        ?string $cursor = null,
        ?array $collections = null,
        ?string $subjectType = null,
        ?int $minAccountSuspendCount = null,
        ?int $minReportedRecordsCount = null,
        ?int $minTakendownRecordsCount = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses\QueryStatuses($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get details about a record.
     */
    public function toolsOzoneModerationGetRecord(
        string $uri,
        ?string $cid = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordViewDetail {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecord\GetRecord($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Find repositories based on a search term.
     * @param ?string $term DEPRECATED: use 'q' instead
     */
    public function toolsOzoneModerationSearchRepos(
        ?string $term = null,
        ?string $q = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\SearchRepos\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\SearchRepos\SearchRepos($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * List moderation events related to a subject.
     * @param ?array<string> $types  The types of events (fully qualified string in the format of tools.ozone.moderation.defs#modEvent<name>) to filter by. If not specified, all events are returned.
     * @param ?string $sortDirection Sort direction for the events. Defaults to descending order of created at timestamp.
     * @param ?\DateTimeInterface $createdAfter Retrieve events created after a given timestamp
     * @param ?\DateTimeInterface $createdBefore Retrieve events created before a given timestamp
     * @param ?array<string> $collections  If specified, only events where the subject belongs to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?string $subjectType If specified, only events where the subject is of the given type (account or record) will be returned. When this is set to 'account' the 'collections' parameter will be ignored. When includeAllUserRecords or subject is set, this will be ignored.
     * @param ?bool $includeAllUserRecords If true, events on all record types (posts, lists, profile etc.) or records from given 'collections' param, owned by the did are returned.
     * @param ?bool $hasComment If true, only events with comments are returned
     * @param ?string $comment If specified, only events with comments containing the keyword are returned. Apply || separator to use multiple keywords and match using OR condition.
     * @param ?array<string> $addedLabels  If specified, only events where all of these labels were added are returned
     * @param ?array<string> $removedLabels  If specified, only events where all of these labels were removed are returned
     * @param ?array<string> $addedTags  If specified, only events where all of these tags were added are returned
     * @param ?array<string> $removedTags  If specified, only events where all of these tags were removed are returned
     * @param ?array<string> $reportTypes
     * @param ?array<string> $policies
     */
    public function toolsOzoneModerationQueryEvents(
        ?array $types = null,
        ?string $createdBy = null,
        ?string $sortDirection = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdBefore = null,
        ?string $subject = null,
        ?array $collections = null,
        ?string $subjectType = null,
        ?bool $includeAllUserRecords = null,
        ?int $limit = null,
        ?bool $hasComment = null,
        ?string $comment = null,
        ?array $addedLabels = null,
        ?array $removedLabels = null,
        ?array $addedTags = null,
        ?array $removedTags = null,
        ?array $reportTypes = null,
        ?array $policies = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryEvents\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryEvents\QueryEvents($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get details about a moderation event.
     */
    public function toolsOzoneModerationGetEvent(
        int $id,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventViewDetail {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetEvent\GetEvent($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Take a moderation action on an actor.
     */
    public function toolsOzoneModerationEmitEvent(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventView {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent\EmitEvent($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Get details about some repositories.
     * @param array<string> $dids
     */
    public function toolsOzoneModerationGetRepos(
        array $dids,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepos\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepos\GetRepos($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Find all correlated threat signatures between 2 or more accounts.
     * @param array<string> $dids
     */
    public function toolsOzoneSignatureFindCorrelation(
        array $dids,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindCorrelation\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindCorrelation\FindCorrelation($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Get accounts that share some matching threat signatures with the root account.
     */
    public function toolsOzoneSignatureFindRelatedAccounts(
        string $did,
        ?string $cursor = null,
        ?int $limit = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts\FindRelatedAccounts($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Search for accounts that match one or more threat signature values.
     * @param array<string> $values
     */
    public function toolsOzoneSignatureSearchAccounts(
        array $values,
        ?string $cursor = null,
        ?int $limit = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\SearchAccounts\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\SearchAccounts\SearchAccounts($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Add a member to the ozone team. Requires admin role.
     */
    public function toolsOzoneTeamAddMember(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\AddMember\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\AddMember\AddMember($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Delete a member from ozone team. Requires admin role.
     */
    public function toolsOzoneTeamDeleteMember(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\DeleteMember\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\DeleteMember\DeleteMember($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * List all members with access to the ozone service.
     */
    public function toolsOzoneTeamListMembers(
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers\ListMembers($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Update a member in the ozone service. Requires admin role.
     */
    public function toolsOzoneTeamUpdateMember(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\UpdateMember\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\UpdateMember\UpdateMember($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Create or update set metadata
     */
    public function toolsOzoneSetUpsertSet(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs\Set $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs\SetView {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\UpsertSet\UpsertSet($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Get a specific set and its values
     */
    public function toolsOzoneSetGetValues(
        string $name,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\GetValues\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\GetValues\GetValues($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Delete an entire set. Attempting to delete a set that does not exist will result in an error.
     */
    public function toolsOzoneSetDeleteSet(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet\DeleteSet($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * Query available sets
     * @param ?string $sortDirection Defaults to ascending order of name field.
     */
    public function toolsOzoneSetQuerySets(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $namePrefix = null,
        ?string $sortBy = null,
        ?string $sortDirection = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\QuerySets\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\QuerySets\QuerySets($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Add values to a specific set. Attempting to add values to a set that does not exist will result in an error.
     */
    public function toolsOzoneSetAddValues(\Aazsamir\Libphpsky\Model\Tools\Ozone\Set\AddValues\Input $input): void
    {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\AddValues\AddValues($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Delete values from a specific set. Attempting to delete values that are not in the set will not result in an error
     */
    public function toolsOzoneSetDeleteValues(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteValues\Input $input,
    ): void {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteValues\DeleteValues($this->client, $this->token);
        $action->procedure(...func_get_args());
    }

    /**
     * Get details about ozone's server configuration.
     */
    public function toolsOzoneServerGetConfig(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig\Output
    {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig\GetConfig($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Create or update setting option
     */
    public function toolsOzoneSettingUpsertOption(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption\UpsertOption($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }

    /**
     * List settings with optional filtering
     * @param ?string $prefix Filter keys by prefix
     * @param ?array<string> $keys  Filter for only the specified keys. Ignored if prefix is provided
     */
    public function toolsOzoneSettingListOptions(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $scope = null,
        ?string $prefix = null,
        ?array $keys = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\ListOptions\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\ListOptions\ListOptions($this->client, $this->token);
        return $action->query(...func_get_args());
    }

    /**
     * Delete settings by key
     */
    public function toolsOzoneSettingRemoveOptions(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\RemoveOptions\Input $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\RemoveOptions\Output {
        $action = new \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\RemoveOptions\RemoveOptions($this->client, $this->token);
        return $action->procedure(...func_get_args());
    }
}

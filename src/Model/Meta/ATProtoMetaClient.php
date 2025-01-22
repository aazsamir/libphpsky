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
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\UpdateActorAccess\UpdateActorAccess {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\UpdateActorAccess\UpdateActorAccess($this->client, $this->token);
    }

    public function chatBskyModerationGetMessageContext(
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext\GetMessageContext {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext\GetMessageContext($this->client, $this->token);
    }

    public function chatBskyModerationGetActorMetadata(
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata\GetActorMetadata {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata\GetActorMetadata($this->client, $this->token);
    }

    public function chatBskyActorDeleteAccount(
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\DeleteAccount\DeleteAccount {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\DeleteAccount\DeleteAccount($this->client, $this->token);
    }

    public function chatBskyActorExportAccountData(
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\ExportAccountData\ExportAccountData {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\ExportAccountData\ExportAccountData($this->client, $this->token);
    }

    public function chatBskyConvoSendMessageBatch(
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\SendMessageBatch {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\SendMessageBatch($this->client, $this->token);
    }

    public function chatBskyConvoGetLog(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetLog\GetLog
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetLog\GetLog($this->client, $this->token);
    }

    public function chatBskyConvoMuteConvo(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo\MuteConvo
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo\MuteConvo($this->client, $this->token);
    }

    public function chatBskyConvoGetMessages(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetMessages\GetMessages
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetMessages\GetMessages($this->client, $this->token);
    }

    public function chatBskyConvoLeaveConvo(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LeaveConvo\LeaveConvo
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LeaveConvo\LeaveConvo($this->client, $this->token);
    }

    public function chatBskyConvoDeleteMessageForSelf(
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\DeleteMessageForSelf\DeleteMessageForSelf {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\DeleteMessageForSelf\DeleteMessageForSelf($this->client, $this->token);
    }

    public function chatBskyConvoGetConvoForMembers(
    ): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvoForMembers\GetConvoForMembers {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvoForMembers\GetConvoForMembers($this->client, $this->token);
    }

    public function chatBskyConvoUnmuteConvo(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo\UnmuteConvo
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo\UnmuteConvo($this->client, $this->token);
    }

    public function chatBskyConvoListConvos(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos\ListConvos
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos\ListConvos($this->client, $this->token);
    }

    public function chatBskyConvoSendMessage(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessage\SendMessage
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessage\SendMessage($this->client, $this->token);
    }

    public function chatBskyConvoUpdateRead(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead\UpdateRead
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead\UpdateRead($this->client, $this->token);
    }

    public function chatBskyConvoGetConvo(): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvo\GetConvo
    {
        return new \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvo\GetConvo($this->client, $this->token);
    }

    /**
     * Administrative action to update an account's email.
     */
    public function comAtprotoAdminUpdateAccountEmail(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountEmail\UpdateAccountEmail {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountEmail\UpdateAccountEmail($this->client, $this->token);
    }

    /**
     * Disable some set of codes and/or all codes associated with a set of users.
     */
    public function comAtprotoAdminDisableInviteCodes(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableInviteCodes\DisableInviteCodes {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableInviteCodes\DisableInviteCodes($this->client, $this->token);
    }

    /**
     * Get an admin view of invite codes.
     */
    public function comAtprotoAdminGetInviteCodes(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetInviteCodes\GetInviteCodes {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetInviteCodes\GetInviteCodes($this->client, $this->token);
    }

    /**
     * Disable an account from receiving new invite codes, but does not invalidate existing codes.
     */
    public function comAtprotoAdminDisableAccountInvites(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableAccountInvites\DisableAccountInvites {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableAccountInvites\DisableAccountInvites($this->client, $this->token);
    }

    /**
     * Get details about an account.
     */
    public function comAtprotoAdminGetAccountInfo(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfo\GetAccountInfo {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfo\GetAccountInfo($this->client, $this->token);
    }

    /**
     * Get details about some accounts.
     */
    public function comAtprotoAdminGetAccountInfos(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfos\GetAccountInfos {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfos\GetAccountInfos($this->client, $this->token);
    }

    /**
     * Delete a user account as an administrator.
     */
    public function comAtprotoAdminDeleteAccount(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DeleteAccount\DeleteAccount {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DeleteAccount\DeleteAccount($this->client, $this->token);
    }

    /**
     * Administrative action to update an account's handle.
     */
    public function comAtprotoAdminUpdateAccountHandle(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountHandle\UpdateAccountHandle {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountHandle\UpdateAccountHandle($this->client, $this->token);
    }

    /**
     * Update the service-specific admin status of a subject (account, record, or blob).
     */
    public function comAtprotoAdminUpdateSubjectStatus(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus\UpdateSubjectStatus {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus\UpdateSubjectStatus($this->client, $this->token);
    }

    /**
     * Send email to a user's account email address.
     */
    public function comAtprotoAdminSendEmail(): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail\SendEmail
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail\SendEmail($this->client, $this->token);
    }

    /**
     * Re-enable an account's ability to receive invite codes.
     */
    public function comAtprotoAdminEnableAccountInvites(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\EnableAccountInvites\EnableAccountInvites {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\EnableAccountInvites\EnableAccountInvites($this->client, $this->token);
    }

    /**
     * Get the service-specific admin status of a subject (account, record, or blob).
     */
    public function comAtprotoAdminGetSubjectStatus(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetSubjectStatus\GetSubjectStatus {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetSubjectStatus\GetSubjectStatus($this->client, $this->token);
    }

    /**
     * Update the password for a user account as an administrator.
     */
    public function comAtprotoAdminUpdateAccountPassword(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountPassword\UpdateAccountPassword {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountPassword\UpdateAccountPassword($this->client, $this->token);
    }

    /**
     * Get list of accounts that matches your search query.
     */
    public function comAtprotoAdminSearchAccounts(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SearchAccounts\SearchAccounts {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SearchAccounts\SearchAccounts($this->client, $this->token);
    }

    /**
     * Request a service to persistently crawl hosted repos. Expected use is new PDS instances declaring their existence to Relays. Does not require auth.
     */
    public function comAtprotoSyncRequestCrawl(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\RequestCrawl\RequestCrawl
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\RequestCrawl\RequestCrawl($this->client, $this->token);
    }

    /**
     * Enumerates all the DID, rev, and commit CID for all repos hosted by this service. Does not require auth; implemented by PDS and Relay.
     */
    public function comAtprotoSyncListRepos(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos\ListRepos
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos\ListRepos($this->client, $this->token);
    }

    /**
     * Get the hosting status for a repository, on this server. Expected to be implemented by PDS and Relay.
     */
    public function comAtprotoSyncGetRepoStatus(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepoStatus\GetRepoStatus {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepoStatus\GetRepoStatus($this->client, $this->token);
    }

    /**
     * Download a repository export as CAR file. Optionally only a 'diff' since a previous revision. Does not require auth; implemented by PDS.
     */
    public function comAtprotoSyncGetRepo(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepo\GetRepo
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepo\GetRepo($this->client, $this->token);
    }

    /**
     * Notify a crawling service of a recent update, and that crawling should resume. Intended use is after a gap between repo stream events caused the crawling service to disconnect. Does not require auth; implemented by Relay.
     */
    public function comAtprotoSyncNotifyOfUpdate(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\NotifyOfUpdate\NotifyOfUpdate {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\NotifyOfUpdate\NotifyOfUpdate($this->client, $this->token);
    }

    /**
     * Get data blocks needed to prove the existence or non-existence of record in the current version of repo. Does not require auth.
     */
    public function comAtprotoSyncGetRecord(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRecord\GetRecord
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRecord\GetRecord($this->client, $this->token);
    }

    /**
     * Get a blob associated with a given account. Returns the full blob as originally uploaded. Does not require auth; implemented by PDS.
     */
    public function comAtprotoSyncGetBlob(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlob\GetBlob
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlob\GetBlob($this->client, $this->token);
    }

    /**
     * Get data blocks from a given repo, by CID. For example, intermediate MST nodes, or records. Does not require auth; implemented by PDS.
     */
    public function comAtprotoSyncGetBlocks(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlocks\GetBlocks
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlocks\GetBlocks($this->client, $this->token);
    }

    /**
     * List blob CIDs for an account, since some repo revision. Does not require auth; implemented by PDS.
     */
    public function comAtprotoSyncListBlobs(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs\ListBlobs
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs\ListBlobs($this->client, $this->token);
    }

    /**
     * Get the current commit CID & revision of the specified repo. Does not require auth.
     */
    public function comAtprotoSyncGetLatestCommit(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetLatestCommit\GetLatestCommit {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetLatestCommit\GetLatestCommit($this->client, $this->token);
    }

    /**
     * DEPRECATED - please use com.atproto.sync.getRepo instead
     */
    public function comAtprotoSyncGetCheckout(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetCheckout\GetCheckout
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetCheckout\GetCheckout($this->client, $this->token);
    }

    /**
     * DEPRECATED - please use com.atproto.sync.getLatestCommit instead
     */
    public function comAtprotoSyncGetHead(): \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHead\GetHead
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHead\GetHead($this->client, $this->token);
    }

    /**
     * Submit a moderation report regarding an atproto account or record. Implemented by moderation services (with PDS proxying), and requires auth.
     */
    public function comAtprotoModerationCreateReport(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport\CreateReport {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport\CreateReport($this->client, $this->token);
    }

    /**
     * Validates a PLC operation to ensure that it doesn't violate a service's constraints or get the identity into a bad state, then submits it to the PLC registry
     */
    public function comAtprotoIdentitySubmitPlcOperation(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SubmitPlcOperation\SubmitPlcOperation {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SubmitPlcOperation\SubmitPlcOperation($this->client, $this->token);
    }

    /**
     * Request an email with a code to in order to request a signed PLC operation. Requires Auth.
     */
    public function comAtprotoIdentityRequestPlcOperationSignature(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\RequestPlcOperationSignature\RequestPlcOperationSignature {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\RequestPlcOperationSignature\RequestPlcOperationSignature($this->client, $this->token);
    }

    /**
     * Resolves a handle (domain name) to a DID.
     */
    public function comAtprotoIdentityResolveHandle(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle($this->client, $this->token);
    }

    /**
     * Signs a PLC operation to update some value(s) in the requesting DID's document.
     */
    public function comAtprotoIdentitySignPlcOperation(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation\SignPlcOperation {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation\SignPlcOperation($this->client, $this->token);
    }

    /**
     * Updates the current account's handle. Verifies handle validity, and updates did:plc document if necessary. Implemented by PDS, and requires auth.
     */
    public function comAtprotoIdentityUpdateHandle(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\UpdateHandle\UpdateHandle {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\UpdateHandle\UpdateHandle($this->client, $this->token);
    }

    /**
     * Describe the credentials that should be included in the DID doc of an account that is migrating to this service.
     */
    public function comAtprotoIdentityGetRecommendedDidCredentials(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\GetRecommendedDidCredentials\GetRecommendedDidCredentials {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\GetRecommendedDidCredentials\GetRecommendedDidCredentials($this->client, $this->token);
    }

    /**
     * Check accounts location in signup queue.
     */
    public function comAtprotoTempCheckSignupQueue(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue\CheckSignupQueue {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue\CheckSignupQueue($this->client, $this->token);
    }

    /**
     * Add a handle to the set of reserved handles.
     */
    public function comAtprotoTempAddReservedHandle(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle\AddReservedHandle {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle\AddReservedHandle($this->client, $this->token);
    }

    /**
     * Request a verification code to be sent to the supplied phone number
     */
    public function comAtprotoTempRequestPhoneVerification(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\RequestPhoneVerification\RequestPhoneVerification {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\RequestPhoneVerification\RequestPhoneVerification($this->client, $this->token);
    }

    /**
     * DEPRECATED: use queryLabels or subscribeLabels instead -- Fetch all labels from a labeler created after a certain date.
     */
    public function comAtprotoTempFetchLabels(): \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\FetchLabels\FetchLabels
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\FetchLabels\FetchLabels($this->client, $this->token);
    }

    /**
     * Import a repo in the form of a CAR file. Requires Content-Length HTTP header to be set.
     */
    public function comAtprotoRepoImportRepo(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ImportRepo\ImportRepo
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ImportRepo\ImportRepo($this->client, $this->token);
    }

    /**
     * Returns a list of missing blobs for the requesting account. Intended to be used in the account migration flow.
     */
    public function comAtprotoRepoListMissingBlobs(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs\ListMissingBlobs {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs\ListMissingBlobs($this->client, $this->token);
    }

    /**
     * Delete a repository record, or ensure it doesn't exist. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoDeleteRecord(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord\DeleteRecord
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord\DeleteRecord($this->client, $this->token);
    }

    /**
     * Create a single new repository record. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoCreateRecord(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord\CreateRecord
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord\CreateRecord($this->client, $this->token);
    }

    /**
     * Get a single record from a repository. Does not require auth.
     */
    public function comAtprotoRepoGetRecord(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\GetRecord\GetRecord
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\GetRecord\GetRecord($this->client, $this->token);
    }

    /**
     * List a range of records in a repository, matching a specific collection. Does not require auth.
     */
    public function comAtprotoRepoListRecords(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords\ListRecords
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords\ListRecords($this->client, $this->token);
    }

    /**
     * Get information about an account and repository, including the list of collections. Does not require auth.
     */
    public function comAtprotoRepoDescribeRepo(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo\DescribeRepo
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo\DescribeRepo($this->client, $this->token);
    }

    /**
     * Write a repository record, creating or updating it as needed. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoPutRecord(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord\PutRecord
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord\PutRecord($this->client, $this->token);
    }

    /**
     * Apply a batch transaction of repository creates, updates, and deletes. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoApplyWrites(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\ApplyWrites
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\ApplyWrites($this->client, $this->token);
    }

    /**
     * Upload a new blob, to be referenced from a repository record. The blob will be deleted if it is not referenced within a time window (eg, minutes). Blob restrictions (mimetype, size, etc) are enforced when the reference is created. Requires auth, implemented by PDS.
     */
    public function comAtprotoRepoUploadBlob(): \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\UploadBlob\UploadBlob
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\UploadBlob\UploadBlob($this->client, $this->token);
    }

    /**
     * Find labels relevant to the provided AT-URI patterns. Public endpoint for moderation services, though may return different or additional results with auth.
     */
    public function comAtprotoLabelQueryLabels(): \Aazsamir\Libphpsky\Model\Com\Atproto\Label\QueryLabels\QueryLabels
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Label\QueryLabels\QueryLabels($this->client, $this->token);
    }

    /**
     * Get information about the current auth session. Requires auth.
     */
    public function comAtprotoServerGetSession(): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetSession\GetSession
    {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetSession\GetSession($this->client, $this->token);
    }

    /**
     * Request a token in order to update email.
     */
    public function comAtprotoServerRequestEmailUpdate(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailUpdate\RequestEmailUpdate {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailUpdate\RequestEmailUpdate($this->client, $this->token);
    }

    /**
     * Delete the current session. Requires auth.
     */
    public function comAtprotoServerDeleteSession(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteSession\DeleteSession {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteSession\DeleteSession($this->client, $this->token);
    }

    /**
     * Refresh an authentication session. Requires auth using the 'refreshJwt' (not the 'accessJwt').
     */
    public function comAtprotoServerRefreshSession(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RefreshSession\RefreshSession {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RefreshSession\RefreshSession($this->client, $this->token);
    }

    /**
     * Delete an actor's account with a token and password. Can only be called after requesting a deletion token. Requires auth.
     */
    public function comAtprotoServerDeleteAccount(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteAccount\DeleteAccount {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteAccount\DeleteAccount($this->client, $this->token);
    }

    /**
     * Revoke an App Password by name.
     */
    public function comAtprotoServerRevokeAppPassword(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RevokeAppPassword\RevokeAppPassword {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RevokeAppPassword\RevokeAppPassword($this->client, $this->token);
    }

    /**
     * Initiate a user account deletion via email.
     */
    public function comAtprotoServerRequestAccountDelete(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestAccountDelete\RequestAccountDelete {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestAccountDelete\RequestAccountDelete($this->client, $this->token);
    }

    /**
     * Create an account. Implemented by PDS.
     */
    public function comAtprotoServerCreateAccount(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAccount\CreateAccount {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAccount\CreateAccount($this->client, $this->token);
    }

    /**
     * Reserve a repo signing key, for use with account creation. Necessary so that a DID PLC update operation can be constructed during an account migraiton. Public and does not require auth; implemented by PDS. NOTE: this endpoint may change when full account migration is implemented.
     */
    public function comAtprotoServerReserveSigningKey(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey\ReserveSigningKey {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey\ReserveSigningKey($this->client, $this->token);
    }

    /**
     * Deactivates a currently active account. Stops serving of repo, and future writes to repo until reactivated. Used to finalize account migration with the old host after the account has been activated on the new host.
     */
    public function comAtprotoServerDeactivateAccount(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeactivateAccount\DeactivateAccount {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeactivateAccount\DeactivateAccount($this->client, $this->token);
    }

    /**
     * Request an email with a code to confirm ownership of email.
     */
    public function comAtprotoServerRequestEmailConfirmation(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailConfirmation\RequestEmailConfirmation {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailConfirmation\RequestEmailConfirmation($this->client, $this->token);
    }

    /**
     * Get a signed token on behalf of the requesting DID for the requested service.
     */
    public function comAtprotoServerGetServiceAuth(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetServiceAuth\GetServiceAuth {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetServiceAuth\GetServiceAuth($this->client, $this->token);
    }

    /**
     * Returns the status of an account, especially as pertaining to import or recovery. Can be called many times over the course of an account migration. Requires auth and can only be called pertaining to oneself.
     */
    public function comAtprotoServerCheckAccountStatus(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CheckAccountStatus\CheckAccountStatus {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CheckAccountStatus\CheckAccountStatus($this->client, $this->token);
    }

    /**
     * Describes the server's account creation requirements and capabilities. Implemented by PDS.
     */
    public function comAtprotoServerDescribeServer(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer\DescribeServer {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer\DescribeServer($this->client, $this->token);
    }

    /**
     * Create invite codes.
     */
    public function comAtprotoServerCreateInviteCodes(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes\CreateInviteCodes {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes\CreateInviteCodes($this->client, $this->token);
    }

    /**
     * Get all invite codes for the current account. Requires auth.
     */
    public function comAtprotoServerGetAccountInviteCodes(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetAccountInviteCodes\GetAccountInviteCodes {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetAccountInviteCodes\GetAccountInviteCodes($this->client, $this->token);
    }

    /**
     * Confirm an email using a token from com.atproto.server.requestEmailConfirmation.
     */
    public function comAtprotoServerConfirmEmail(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ConfirmEmail\ConfirmEmail {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ConfirmEmail\ConfirmEmail($this->client, $this->token);
    }

    /**
     * Update an account's email.
     */
    public function comAtprotoServerUpdateEmail(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\UpdateEmail\UpdateEmail {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\UpdateEmail\UpdateEmail($this->client, $this->token);
    }

    /**
     * Create an App Password.
     */
    public function comAtprotoServerCreateAppPassword(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAppPassword\CreateAppPassword {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAppPassword\CreateAppPassword($this->client, $this->token);
    }

    /**
     * List all App Passwords.
     */
    public function comAtprotoServerListAppPasswords(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords\ListAppPasswords {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords\ListAppPasswords($this->client, $this->token);
    }

    /**
     * Create an authentication session.
     */
    public function comAtprotoServerCreateSession(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\CreateSession {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\CreateSession($this->client, $this->token);
    }

    /**
     * Initiate a user account password reset via email.
     */
    public function comAtprotoServerRequestPasswordReset(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestPasswordReset\RequestPasswordReset {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestPasswordReset\RequestPasswordReset($this->client, $this->token);
    }

    /**
     * Activates a currently deactivated account. Used to finalize account migration after the account's repo is imported and identity is setup.
     */
    public function comAtprotoServerActivateAccount(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ActivateAccount\ActivateAccount {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ActivateAccount\ActivateAccount($this->client, $this->token);
    }

    /**
     * Create an invite code.
     */
    public function comAtprotoServerCreateInviteCode(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCode\CreateInviteCode {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCode\CreateInviteCode($this->client, $this->token);
    }

    /**
     * Reset a user account password using a token.
     */
    public function comAtprotoServerResetPassword(
    ): \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ResetPassword\ResetPassword {
        return new \Aazsamir\Libphpsky\Model\Com\Atproto\Server\ResetPassword\ResetPassword($this->client, $this->token);
    }

    /**
     * Get status details for a video processing job.
     */
    public function appBskyVideoGetJobStatus(): \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetJobStatus\GetJobStatus
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetJobStatus\GetJobStatus($this->client, $this->token);
    }

    /**
     * Get video upload limits for the authenticated user.
     */
    public function appBskyVideoGetUploadLimits(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetUploadLimits\GetUploadLimits {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetUploadLimits\GetUploadLimits($this->client, $this->token);
    }

    /**
     * Upload a video to be processed then stored on the PDS.
     */
    public function appBskyVideoUploadVideo(): \Aazsamir\Libphpsky\Model\App\Bsky\Video\UploadVideo\UploadVideo
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Video\UploadVideo\UploadVideo($this->client, $this->token);
    }

    /**
     * Find actor suggestions for a prefix search term. Expected use is for auto-completion during text field entry. Does not require auth.
     */
    public function appBskyActorSearchActorsTypeahead(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActorsTypeahead\SearchActorsTypeahead {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActorsTypeahead\SearchActorsTypeahead($this->client, $this->token);
    }

    /**
     * Get detailed profile views of multiple actors.
     */
    public function appBskyActorGetProfiles(): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfiles\GetProfiles
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfiles\GetProfiles($this->client, $this->token);
    }

    /**
     * Set the private preferences attached to the account.
     */
    public function appBskyActorPutPreferences(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\PutPreferences\PutPreferences {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\PutPreferences\PutPreferences($this->client, $this->token);
    }

    /**
     * Get detailed profile view of an actor. Does not require auth, but contains relevant metadata with auth.
     */
    public function appBskyActorGetProfile(): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfile\GetProfile
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfile\GetProfile($this->client, $this->token);
    }

    /**
     * Get a list of suggested actors. Expected use is discovery of accounts to follow during new account onboarding.
     */
    public function appBskyActorGetSuggestions(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetSuggestions\GetSuggestions {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetSuggestions\GetSuggestions($this->client, $this->token);
    }

    /**
     * Find actors (profiles) matching search criteria. Does not require auth.
     */
    public function appBskyActorSearchActors(): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActors\SearchActors
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActors\SearchActors($this->client, $this->token);
    }

    /**
     * Get private preferences attached to the current account. Expected use is synchronization between multiple devices, and import/export during account migration. Requires auth.
     */
    public function appBskyActorGetPreferences(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetPreferences\GetPreferences {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetPreferences\GetPreferences($this->client, $this->token);
    }

    /**
     * Notify server that the requesting account has seen notifications. Requires auth.
     */
    public function appBskyNotificationUpdateSeen(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Notification\UpdateSeen\UpdateSeen {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\UpdateSeen\UpdateSeen($this->client, $this->token);
    }

    /**
     * Register to receive push notifications, via a specified service, for the requesting account. Requires auth.
     */
    public function appBskyNotificationRegisterPush(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Notification\RegisterPush\RegisterPush {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\RegisterPush\RegisterPush($this->client, $this->token);
    }

    /**
     * Set notification-related preferences for an account. Requires auth.
     */
    public function appBskyNotificationPutPreferences(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferences\PutPreferences {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferences\PutPreferences($this->client, $this->token);
    }

    /**
     * Enumerate notifications for the requesting account. Requires auth.
     */
    public function appBskyNotificationListNotifications(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\ListNotifications {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\ListNotifications($this->client, $this->token);
    }

    /**
     * Count the number of unread notifications for the requesting account. Requires auth.
     */
    public function appBskyNotificationGetUnreadCount(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetUnreadCount\GetUnreadCount {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetUnreadCount\GetUnreadCount($this->client, $this->token);
    }

    /**
     * Get information about a list of labeler services.
     */
    public function appBskyLabelerGetServices(): \Aazsamir\Libphpsky\Model\App\Bsky\Labeler\GetServices\GetServices
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Labeler\GetServices\GetServices($this->client, $this->token);
    }

    /**
     * Get a hydrated feed from an actor's selected feed generator. Implemented by App View.
     */
    public function appBskyFeedGetFeed(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeed\GetFeed
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeed\GetFeed($this->client, $this->token);
    }

    /**
     * Get a list of suggested feeds (feed generators) for the requesting account.
     */
    public function appBskyFeedGetSuggestedFeeds(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetSuggestedFeeds\GetSuggestedFeeds {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetSuggestedFeeds\GetSuggestedFeeds($this->client, $this->token);
    }

    /**
     * Get information about a feed generator, including policies and offered feed URIs. Does not require auth; implemented by Feed Generator services (not App View).
     */
    public function appBskyFeedDescribeFeedGenerator(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator\DescribeFeedGenerator {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator\DescribeFeedGenerator($this->client, $this->token);
    }

    /**
     * Get a list of feeds (feed generator records) created by the actor (in the actor's repo).
     */
    public function appBskyFeedGetActorFeeds(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorFeeds\GetActorFeeds
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorFeeds\GetActorFeeds($this->client, $this->token);
    }

    /**
     * Get a list of reposts for a given post.
     */
    public function appBskyFeedGetRepostedBy(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetRepostedBy\GetRepostedBy
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetRepostedBy\GetRepostedBy($this->client, $this->token);
    }

    /**
     * Get a feed of recent posts from a list (posts and reposts from any actors on the list). Does not require auth.
     */
    public function appBskyFeedGetListFeed(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetListFeed\GetListFeed
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetListFeed\GetListFeed($this->client, $this->token);
    }

    /**
     * Gets post views for a specified list of posts (by AT-URI). This is sometimes referred to as 'hydrating' a 'feed skeleton'.
     */
    public function appBskyFeedGetPosts(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPosts\GetPosts
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPosts\GetPosts($this->client, $this->token);
    }

    /**
     * Get information about a feed generator. Implemented by AppView.
     */
    public function appBskyFeedGetFeedGenerator(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerator\GetFeedGenerator {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerator\GetFeedGenerator($this->client, $this->token);
    }

    /**
     * Get information about a list of feed generators.
     */
    public function appBskyFeedGetFeedGenerators(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerators\GetFeedGenerators {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerators\GetFeedGenerators($this->client, $this->token);
    }

    /**
     * Get a list of posts liked by an actor. Requires auth, actor must be the requesting account.
     */
    public function appBskyFeedGetActorLikes(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorLikes\GetActorLikes
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorLikes\GetActorLikes($this->client, $this->token);
    }

    /**
     * Get posts in a thread. Does not require auth, but additional metadata and filtering will be applied for authed requests.
     */
    public function appBskyFeedGetPostThread(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPostThread\GetPostThread
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPostThread\GetPostThread($this->client, $this->token);
    }

    /**
     * Get a view of the requesting account's home timeline. This is expected to be some form of reverse-chronological feed.
     */
    public function appBskyFeedGetTimeline(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetTimeline\GetTimeline
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetTimeline\GetTimeline($this->client, $this->token);
    }

    /**
     * Find posts matching search criteria, returning views of those posts.
     */
    public function appBskyFeedSearchPosts(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts\SearchPosts
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts\SearchPosts($this->client, $this->token);
    }

    /**
     * Get like records which reference a subject (by AT-URI and CID).
     */
    public function appBskyFeedGetLikes(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes\GetLikes
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes\GetLikes($this->client, $this->token);
    }

    /**
     * Get a list of quotes for a given post.
     */
    public function appBskyFeedGetQuotes(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes\GetQuotes
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes\GetQuotes($this->client, $this->token);
    }

    /**
     * Get a view of an actor's 'author feed' (post and reposts by the author). Does not require auth.
     */
    public function appBskyFeedGetAuthorFeed(): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetAuthorFeed\GetAuthorFeed
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetAuthorFeed\GetAuthorFeed($this->client, $this->token);
    }

    /**
     * Get a skeleton of a feed provided by a feed generator. Auth is optional, depending on provider requirements, and provides the DID of the requester. Implemented by Feed Generator Service.
     */
    public function appBskyFeedGetFeedSkeleton(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton\GetFeedSkeleton {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton\GetFeedSkeleton($this->client, $this->token);
    }

    /**
     * Send information about interactions with feed items back to the feed generator that served them.
     */
    public function appBskyFeedSendInteractions(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SendInteractions\SendInteractions {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SendInteractions\SendInteractions($this->client, $this->token);
    }

    /**
     * Enumerates the lists created by a specified account (actor).
     */
    public function appBskyGraphGetLists(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetLists\GetLists
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetLists\GetLists($this->client, $this->token);
    }

    /**
     * Find starter packs matching search criteria. Does not require auth.
     */
    public function appBskyGraphSearchStarterPacks(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\SearchStarterPacks\SearchStarterPacks {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\SearchStarterPacks\SearchStarterPacks($this->client, $this->token);
    }

    /**
     * Get views for a list of starter packs.
     */
    public function appBskyGraphGetStarterPacks(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacks\GetStarterPacks {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacks\GetStarterPacks($this->client, $this->token);
    }

    /**
     * Creates a mute relationship for the specified list of accounts. Mutes are private in Bluesky. Requires auth.
     */
    public function appBskyGraphMuteActorList(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActorList\MuteActorList
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActorList\MuteActorList($this->client, $this->token);
    }

    /**
     * Enumerates accounts which follow a specified account (actor).
     */
    public function appBskyGraphGetFollowers(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollowers\GetFollowers
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollowers\GetFollowers($this->client, $this->token);
    }

    /**
     * Enumerates accounts which a specified account (actor) follows.
     */
    public function appBskyGraphGetFollows(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollows\GetFollows
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollows\GetFollows($this->client, $this->token);
    }

    /**
     * Unmutes the specified thread. Requires auth.
     */
    public function appBskyGraphUnmuteThread(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteThread\UnmuteThread
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteThread\UnmuteThread($this->client, $this->token);
    }

    /**
     * Get a list of starter packs created by the actor.
     */
    public function appBskyGraphGetActorStarterPacks(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetActorStarterPacks\GetActorStarterPacks {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetActorStarterPacks\GetActorStarterPacks($this->client, $this->token);
    }

    /**
     * Enumerates public relationships between one account, and a list of other accounts. Does not require auth.
     */
    public function appBskyGraphGetRelationships(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetRelationships\GetRelationships {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetRelationships\GetRelationships($this->client, $this->token);
    }

    /**
     * Get mod lists that the requesting account (actor) is blocking. Requires auth.
     */
    public function appBskyGraphGetListBlocks(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListBlocks\GetListBlocks
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListBlocks\GetListBlocks($this->client, $this->token);
    }

    /**
     * Mutes a thread preventing notifications from the thread and any of its children. Mutes are private in Bluesky. Requires auth.
     */
    public function appBskyGraphMuteThread(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteThread\MuteThread
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteThread\MuteThread($this->client, $this->token);
    }

    /**
     * Creates a mute relationship for the specified account. Mutes are private in Bluesky. Requires auth.
     */
    public function appBskyGraphMuteActor(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActor\MuteActor
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActor\MuteActor($this->client, $this->token);
    }

    /**
     * Enumerates accounts that the requesting account (actor) currently has muted. Requires auth.
     */
    public function appBskyGraphGetMutes(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetMutes\GetMutes
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetMutes\GetMutes($this->client, $this->token);
    }

    /**
     * Unmutes the specified account. Requires auth.
     */
    public function appBskyGraphUnmuteActor(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActor\UnmuteActor
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActor\UnmuteActor($this->client, $this->token);
    }

    /**
     * Unmutes the specified list of accounts. Requires auth.
     */
    public function appBskyGraphUnmuteActorList(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActorList\UnmuteActorList {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActorList\UnmuteActorList($this->client, $this->token);
    }

    /**
     * Enumerates accounts which follow a specified account (actor) and are followed by the viewer.
     */
    public function appBskyGraphGetKnownFollowers(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetKnownFollowers\GetKnownFollowers {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetKnownFollowers\GetKnownFollowers($this->client, $this->token);
    }

    /**
     * Enumerates follows similar to a given account (actor). Expected use is to recommend additional accounts immediately after following one account.
     */
    public function appBskyGraphGetSuggestedFollowsByActor(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetSuggestedFollowsByActor\GetSuggestedFollowsByActor {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetSuggestedFollowsByActor\GetSuggestedFollowsByActor($this->client, $this->token);
    }

    /**
     * Gets a view of a starter pack.
     */
    public function appBskyGraphGetStarterPack(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPack\GetStarterPack {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPack\GetStarterPack($this->client, $this->token);
    }

    /**
     * Enumerates which accounts the requesting account is currently blocking. Requires auth.
     */
    public function appBskyGraphGetBlocks(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetBlocks\GetBlocks
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetBlocks\GetBlocks($this->client, $this->token);
    }

    /**
     * Gets a 'view' (with additional context) of a specified list.
     */
    public function appBskyGraphGetList(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList\GetList
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList\GetList($this->client, $this->token);
    }

    /**
     * Enumerates mod lists that the requesting account (actor) currently has muted. Requires auth.
     */
    public function appBskyGraphGetListMutes(): \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListMutes\GetListMutes
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListMutes\GetListMutes($this->client, $this->token);
    }

    /**
     * Get a list of trending topics
     */
    public function appBskyUnspeccedGetTrendingTopics(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics\GetTrendingTopics {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics\GetTrendingTopics($this->client, $this->token);
    }

    /**
     * Backend Starter Pack search, returns only skeleton.
     */
    public function appBskyUnspeccedSearchStarterPacksSkeleton(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton\SearchStarterPacksSkeleton {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton\SearchStarterPacksSkeleton($this->client, $this->token);
    }

    /**
     * Get miscellaneous runtime configuration.
     */
    public function appBskyUnspeccedGetConfig(): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig\GetConfig
    {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig\GetConfig($this->client, $this->token);
    }

    /**
     * Get a list of suggestions (feeds and users) tagged with categories
     */
    public function appBskyUnspeccedGetTaggedSuggestions(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\GetTaggedSuggestions {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\GetTaggedSuggestions($this->client, $this->token);
    }

    /**
     * Backend Actors (profile) search, returns only skeleton.
     */
    public function appBskyUnspeccedSearchActorsSkeleton(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchActorsSkeleton\SearchActorsSkeleton {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchActorsSkeleton\SearchActorsSkeleton($this->client, $this->token);
    }

    /**
     * Get a skeleton of suggested actors. Intended to be called and then hydrated through app.bsky.actor.getSuggestions
     */
    public function appBskyUnspeccedGetSuggestionsSkeleton(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton\GetSuggestionsSkeleton {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton\GetSuggestionsSkeleton($this->client, $this->token);
    }

    /**
     * An unspecced view of globally popular feed generators.
     */
    public function appBskyUnspeccedGetPopularFeedGenerators(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPopularFeedGenerators\GetPopularFeedGenerators {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPopularFeedGenerators\GetPopularFeedGenerators($this->client, $this->token);
    }

    /**
     * Backend Posts search, returns only skeleton
     */
    public function appBskyUnspeccedSearchPostsSkeleton(
    ): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchPostsSkeleton\SearchPostsSkeleton {
        return new \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchPostsSkeleton\SearchPostsSkeleton($this->client, $this->token);
    }

    /**
     * Administrative action to update an existing communication template. Allows passing partial fields to patch specific fields only.
     */
    public function toolsOzoneCommunicationUpdateTemplate(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\UpdateTemplate\UpdateTemplate {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\UpdateTemplate\UpdateTemplate($this->client, $this->token);
    }

    /**
     * Administrative action to create a new, re-usable communication (email for now) template.
     */
    public function toolsOzoneCommunicationCreateTemplate(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\CreateTemplate\CreateTemplate {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\CreateTemplate\CreateTemplate($this->client, $this->token);
    }

    /**
     * Delete a communication template.
     */
    public function toolsOzoneCommunicationDeleteTemplate(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\DeleteTemplate\DeleteTemplate {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\DeleteTemplate\DeleteTemplate($this->client, $this->token);
    }

    /**
     * Get list of all communication templates.
     */
    public function toolsOzoneCommunicationListTemplates(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\ListTemplates\ListTemplates {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\ListTemplates\ListTemplates($this->client, $this->token);
    }

    /**
     * Get details about a repository.
     */
    public function toolsOzoneModerationGetRepo(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepo\GetRepo
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepo\GetRepo($this->client, $this->token);
    }

    /**
     * Get details about some records.
     */
    public function toolsOzoneModerationGetRecords(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords\GetRecords {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords\GetRecords($this->client, $this->token);
    }

    /**
     * View moderation statuses of subjects (record or repo).
     */
    public function toolsOzoneModerationQueryStatuses(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses\QueryStatuses {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses\QueryStatuses($this->client, $this->token);
    }

    /**
     * Get details about a record.
     */
    public function toolsOzoneModerationGetRecord(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecord\GetRecord {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecord\GetRecord($this->client, $this->token);
    }

    /**
     * Find repositories based on a search term.
     */
    public function toolsOzoneModerationSearchRepos(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\SearchRepos\SearchRepos {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\SearchRepos\SearchRepos($this->client, $this->token);
    }

    /**
     * List moderation events related to a subject.
     */
    public function toolsOzoneModerationQueryEvents(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryEvents\QueryEvents {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryEvents\QueryEvents($this->client, $this->token);
    }

    /**
     * Get details about a moderation event.
     */
    public function toolsOzoneModerationGetEvent(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetEvent\GetEvent
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetEvent\GetEvent($this->client, $this->token);
    }

    /**
     * Take a moderation action on an actor.
     */
    public function toolsOzoneModerationEmitEvent(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent\EmitEvent {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent\EmitEvent($this->client, $this->token);
    }

    /**
     * Get details about some repositories.
     */
    public function toolsOzoneModerationGetRepos(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepos\GetRepos
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepos\GetRepos($this->client, $this->token);
    }

    /**
     * Find all correlated threat signatures between 2 or more accounts.
     */
    public function toolsOzoneSignatureFindCorrelation(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindCorrelation\FindCorrelation {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindCorrelation\FindCorrelation($this->client, $this->token);
    }

    /**
     * Get accounts that share some matching threat signatures with the root account.
     */
    public function toolsOzoneSignatureFindRelatedAccounts(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts\FindRelatedAccounts {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts\FindRelatedAccounts($this->client, $this->token);
    }

    /**
     * Search for accounts that match one or more threat signature values.
     */
    public function toolsOzoneSignatureSearchAccounts(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\SearchAccounts\SearchAccounts {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\SearchAccounts\SearchAccounts($this->client, $this->token);
    }

    /**
     * Add a member to the ozone team. Requires admin role.
     */
    public function toolsOzoneTeamAddMember(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\AddMember\AddMember
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\AddMember\AddMember($this->client, $this->token);
    }

    /**
     * Delete a member from ozone team. Requires admin role.
     */
    public function toolsOzoneTeamDeleteMember(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\DeleteMember\DeleteMember
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\DeleteMember\DeleteMember($this->client, $this->token);
    }

    /**
     * List all members with access to the ozone service.
     */
    public function toolsOzoneTeamListMembers(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers\ListMembers
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers\ListMembers($this->client, $this->token);
    }

    /**
     * Update a member in the ozone service. Requires admin role.
     */
    public function toolsOzoneTeamUpdateMember(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\UpdateMember\UpdateMember
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\UpdateMember\UpdateMember($this->client, $this->token);
    }

    /**
     * Create or update set metadata
     */
    public function toolsOzoneSetUpsertSet(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\UpsertSet\UpsertSet
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\UpsertSet\UpsertSet($this->client, $this->token);
    }

    /**
     * Get a specific set and its values
     */
    public function toolsOzoneSetGetValues(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\GetValues\GetValues
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\GetValues\GetValues($this->client, $this->token);
    }

    /**
     * Delete an entire set. Attempting to delete a set that does not exist will result in an error.
     */
    public function toolsOzoneSetDeleteSet(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet\DeleteSet
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet\DeleteSet($this->client, $this->token);
    }

    /**
     * Query available sets
     */
    public function toolsOzoneSetQuerySets(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\QuerySets\QuerySets
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\QuerySets\QuerySets($this->client, $this->token);
    }

    /**
     * Add values to a specific set. Attempting to add values to a set that does not exist will result in an error.
     */
    public function toolsOzoneSetAddValues(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\AddValues\AddValues
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\AddValues\AddValues($this->client, $this->token);
    }

    /**
     * Delete values from a specific set. Attempting to delete values that are not in the set will not result in an error
     */
    public function toolsOzoneSetDeleteValues(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteValues\DeleteValues
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteValues\DeleteValues($this->client, $this->token);
    }

    /**
     * Get details about ozone's server configuration.
     */
    public function toolsOzoneServerGetConfig(): \Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig\GetConfig
    {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig\GetConfig($this->client, $this->token);
    }

    /**
     * Create or update setting option
     */
    public function toolsOzoneSettingUpsertOption(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption\UpsertOption {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption\UpsertOption($this->client, $this->token);
    }

    /**
     * List settings with optional filtering
     */
    public function toolsOzoneSettingListOptions(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\ListOptions\ListOptions {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\ListOptions\ListOptions($this->client, $this->token);
    }

    /**
     * Delete settings by key
     */
    public function toolsOzoneSettingRemoveOptions(
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\RemoveOptions\RemoveOptions {
        return new \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\RemoveOptions\RemoveOptions($this->client, $this->token);
    }
}

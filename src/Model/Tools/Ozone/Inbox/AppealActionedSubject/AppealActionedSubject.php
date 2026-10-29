<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\AppealActionedSubject;

/**
 * Appeal a moderation action affecting the user's account or content.
 * procedure
 */
class AppealActionedSubject implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.appealActionedSubject';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(
        AppealActionedSubjectInput $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\SubjectView {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\SubjectView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(AppealActionedSubjectInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}

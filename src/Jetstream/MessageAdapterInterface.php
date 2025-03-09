<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

use Aazsamir\Libphpsky\Jetstream\Model\Event;
use WebSocket\Message\Message;

interface MessageAdapterInterface
{
    public function adapt(Message $message): Event;
}

<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * Exception thrown when some argument wasn't valid. Usually the message should provide further details
 * like expected range of values, wrong value that was provided and any other needed context.
 */
class InvalidArgumentException extends HaikunatorException
{
}

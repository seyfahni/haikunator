<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * Generate an integer. This usually means that some kind of random number generator is used,
 * but might also be a fixed number or a predefined, possibly repeating sequence.
 */
interface IntegerGenerator
{
    /**
     * Generate the next integer within the given boundary.
     * Possible values are zero up to but excluding the boundary.
     *
     * @param int $bound upper exclusive boundary
     * @return int any integer in between 0 (inclusive) and bound (exclusive)
     * @throws InvalidArgumentException if the boundary value is invalid (less than 1 or exceeding the generators upper limit)
     */
    public function nextInt(int $bound): int;
}

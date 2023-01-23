<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * Abstract class for IntegerGenerators that already checks for the bound parameter to be valid.
 * A valid bound parameter is greater than zero.
 * An {@link InvalidArgumentException} is thrown if the parameter isn't valid.
 */
abstract readonly class BoundaryCheckedIntegerGenerator implements IntegerGenerator
{
    final function nextInt(int $bound): int
    {
        if ($bound < 1) {
            throw new InvalidArgumentException('Random integer value bound must not be below 1, but was: ' . $bound);
        }
        return $this->nextBoundaryCheckedInt($bound);
    }

    /**
     * Generate the next integer within the given boundary.
     * Possible values are zero up to but excluding the boundary.
     * The boundary value is guaranteed to always be greater than zero
     *
     * @param int $bound upper exclusive boundary
     * @return int any integer in between 0 (inclusive) and bound (exclusive)
     * @throws InvalidArgumentException if the boundary value too large (exceeding the generators upper limit)
     */
    abstract protected function nextBoundaryCheckedInt(int $bound): int;
}

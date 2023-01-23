<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * This IntegerGenerator generates a value based on a constant.
 * The constant value will be returned,
 * unless the upper boundary is larger than the constant value.
 * In that case the value modulo the upper boundary will be returned.
 */
final readonly class ValueModuloBoundaryIntegerGenerator extends BoundaryCheckedIntegerGenerator
{
    /**
     * Create a ValueModuloBoundaryIntegerGenerator that will return the given fixed value modulo the boundary.
     *
     * @param int $value constant value to return
     */
    public function __construct(
        private int $value,
    )
    {
    }

    protected function nextBoundaryCheckedInt(int $bound): int
    {
        return $this->value % $bound;
    }
}

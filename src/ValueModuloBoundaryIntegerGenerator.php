<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

final readonly class ValueModuloBoundaryIntegerGenerator extends BoundaryCheckedIntegerGenerator
{
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

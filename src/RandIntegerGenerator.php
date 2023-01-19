<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

final readonly class RandIntegerGenerator extends BoundaryCheckedIntegerGenerator
{
    protected function nextBoundaryCheckedInt(int $bound): int
    {
        return rand(0, $bound - 1);
    }
}

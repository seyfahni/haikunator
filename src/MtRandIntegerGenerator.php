<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

final readonly class MtRandIntegerGenerator extends BoundaryCheckedIntegerGenerator
{
    protected function nextBoundaryCheckedInt(int $bound): int
    {
        return mt_rand(0, $bound - 1);
    }
}

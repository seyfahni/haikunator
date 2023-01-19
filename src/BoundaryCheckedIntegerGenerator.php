<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

abstract readonly class BoundaryCheckedIntegerGenerator implements IntegerGenerator
{
    final function nextInt(int $bound): int
    {
        if ($bound < 1) {
            throw new InvalidArgumentException('Random integer value bound must not be below 1, but was: ' . $bound);
        }
        return $this->nextBoundaryCheckedInt($bound);
    }

    abstract protected function nextBoundaryCheckedInt(int $bound): int;
}

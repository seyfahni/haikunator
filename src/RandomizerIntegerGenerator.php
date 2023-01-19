<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

use Random\Randomizer;

final readonly class RandomizerIntegerGenerator extends BoundaryCheckedIntegerGenerator
{
    public function __construct(
        private Randomizer $randomizer,
    )
    {
    }

    protected function nextBoundaryCheckedInt(int $bound): int
    {
        return $this->randomizer->getInt(0, $bound - 1);
    }
}

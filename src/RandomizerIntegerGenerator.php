<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

use Random\Randomizer;

/**
 * This IntegerGenerator is an adapter to for the {@link Randomizer} class.
 */
final readonly class RandomizerIntegerGenerator extends BoundaryCheckedIntegerGenerator
{
    /**
     * Create a RandomizerIntegerGenerator that uses the given Randomizer.
     *
     * @param Randomizer $randomizer randomizer to use
     */
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

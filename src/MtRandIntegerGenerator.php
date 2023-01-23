<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * This IntegerGenerator uses the {@link mt_rand()} function to generate random integer numbers.
 * You can call {@link mt_srand()} to seed the random number generator as usual.
 * Be aware that the results are not guaranteed to be the same even after seeding, as other calls to {@link mt_rand()}
 * might be done by other parts of your codebase.
 *
 * @see RandomizerIntegerGenerator for a solution that can be relied upon when seeded
 */
final readonly class MtRandIntegerGenerator extends BoundaryCheckedIntegerGenerator
{
    protected function nextBoundaryCheckedInt(int $bound): int
    {
        return mt_rand(0, $bound - 1);
    }
}

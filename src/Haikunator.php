<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * A Haikunator is a generator for random ids, but usually in a human-readable or even memorable format.
 */
interface Haikunator
{
    /**
     * Generate a new identifier. The exact format is implementation detail.
     *
     * @return string a newly generated id
     * @throws HaikunatorException if the identifier could not be generated
     */
    public function haikunate(): string;
}

<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * This Haikunator generates always the same constant id.
 */
final readonly class ConstantHaikunator implements Haikunator
{
    /**
     * Create a ConstantHaikunator that will always generate the given value.
     *
     * @param string $value constant value to generate
     */
    public function __construct(private string $value)
    {
    }

    public function haikunate(): string
    {
        return $this->value;
    }
}

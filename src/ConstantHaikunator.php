<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

final readonly class ConstantHaikunator implements Haikunator
{
    public function __construct(private string $value)
    {
    }

    public function haikunate(): string
    {
        return $this->value;
    }
}

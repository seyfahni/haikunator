<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

final readonly class AppendingHaikunator implements Haikunator
{

    public function __construct(
        private array $haikunators,
        private string $delimiter = '',
    )
    {
    }

    public function haikunate(): string
    {
        return implode($this->delimiter, array_map(fn(Haikunator $h) => $h->haikunate(), $this->haikunators));
    }
}

<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * This Haikunator joins the results of all provided Haikunators to generate a compound id.
 */
final readonly class AppendingHaikunator implements Haikunator
{
    /**
     * Create an AppendingHaikunator that uses the Haikunators in the order they are provided and joins them
     * with the given delimiter string. The delimiter string defaults to an empty string.
     *
     * @param Haikunator[] $haikunators Haikunators to use for generating an id
     * @param string $delimiter delimiter when joining the generated id parts
     */
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

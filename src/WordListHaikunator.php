<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

final readonly class WordListHaikunator implements Haikunator
{

    private int $wordCount;

    public function __construct(
        private IntegerGenerator $random,
        private array            $words,
    )
    {
        $this->wordCount = count($this->words);
        if ($this->wordCount <= 0) {
            throw new InvalidArgumentException('Word list may not be empty.');
        }
    }

    public function haikunate(): string
    {
        return $this->words[$this->random->nextInt($this->wordCount)];
    }
}

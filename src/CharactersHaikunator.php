<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

final readonly class CharactersHaikunator implements Haikunator
{
    private int $characterCount;

    public function __construct(
        private IntegerGenerator $random,
        private string           $allowedCharacters,
        private int              $length,
    )
    {
        $this->characterCount = strlen($this->allowedCharacters);
        if ($this->characterCount <= 0) {
            throw new InvalidArgumentException('Character list may not be empty.');
        }
        if ($this->length <= 0) {
            throw new InvalidArgumentException('Character length must be positive, but was: ' . $this->length);
        }
    }

    public function haikunate(): string
    {
        $result = '';
        for ($index = 0; $index < $this->length; $index += 1) {
            $result .= $this->allowedCharacters[$this->random->nextInt($this->characterCount)];
        }
        return $result;
    }
}

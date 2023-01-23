<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * This Haikunator generates an id consisting of a given set of characters in a specified length.
 * If the character set contains a word multiple times then its probability multiplies accordingly.
 */
final readonly class CharactersHaikunator implements Haikunator
{
    private int $characterCount;

    /**
     * Create a CharactersHaikunator with the given character set that generates ids in the given length.
     * The IntegerGenerator is used for selecting the characters,
     * so it must support generating numbers up to the size of the character set.
     *
     * @param IntegerGenerator $integerGenerator integer generator to use
     * @param string $allowedCharacters character set for generating ids
     * @param int $length length of the generated ids
     * @throws InvalidArgumentException if there are no characters in the character set or the length is less than one
     */
    public function __construct(
        private IntegerGenerator $integerGenerator,
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
            $result .= $this->allowedCharacters[$this->integerGenerator->nextInt($this->characterCount)];
        }
        return $result;
    }
}

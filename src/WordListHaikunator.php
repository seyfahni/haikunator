<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

/**
 * This Haikunator selects one word from a list of words as the generated id.
 * If the list of words contains any specific word multiple times then its probability multiplies accordingly.
 */
final readonly class WordListHaikunator implements Haikunator
{
    private int $wordCount;

    /**
     * Create a WordListHaikunator for the given word list.
     * The IntegerGenerator is used for selecting the word,
     * so it must support generating numbers up to the size of the word list.
     *
     * @param IntegerGenerator $integerGenerator integer generator to use
     * @param string[] $words list of possible words
     * @throws InvalidArgumentException if there are no words in the word list
     */
    public function __construct(
        private IntegerGenerator $integerGenerator,
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
        return $this->words[$this->integerGenerator->nextInt($this->wordCount)];
    }
}

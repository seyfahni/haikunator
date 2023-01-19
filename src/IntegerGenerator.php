<?php
declare(strict_types=1);

namespace seyfahni\Haikunator;

interface IntegerGenerator
{
    public function nextInt(int $bound): int;
}

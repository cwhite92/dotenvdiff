<?php

declare(strict_types=1);

namespace ChrisWhite\DotEnvDiff;

class DiffResult
{
    private $onlyInFirstEnv;
    private $onlyInSecondEnv;

    public function __construct(array $onlyInFirstEnv, array $onlyInSecondEnv)
    {
        $this->onlyInFirstEnv = $onlyInFirstEnv;
        $this->onlyInSecondEnv = $onlyInSecondEnv;
    }

    public function envsAreIdentical(): bool
    {
        return $this->onlyInFirstEnv === $this->onlyInSecondEnv;
    }

    public function onlyInFirstEnv(): array
    {
        return $this->onlyInFirstEnv;
    }

    public function onlyInSecondEnv(): array
    {
        return $this->onlyInSecondEnv;
    }
}
<?php

declare(strict_types=1);

namespace ChrisWhite\DotEnvDiff\Test;

use ChrisWhite\DotEnvDiff\Diff;
use PHPUnit\Framework\TestCase;

class DiffTest extends TestCase
{
    /** @test */
    public function it_can_find_env_vars_that_only_exist_in_first_file()
    {
        $firstEnv = <<<ENV
FOO=BAR
ENV;

        $secondEnv = <<<ENV
ENV;

        $diff = new Diff;
        $result = $diff->diff($firstEnv, $secondEnv);

        $this->assertContains('FOO', $result->onlyInFirstEnv());
        $this->assertEmpty($result->onlyInSecondEnv());
    }

    /** @test */
    public function it_can_find_env_vars_that_only_exist_in_second_file()
    {
        $firstEnv = <<<ENV
ENV;

        $secondEnv = <<<ENV
FOO=BAR
ENV;

        $diff = new Diff;
        $result = $diff->diff($firstEnv, $secondEnv);

        $this->assertEmpty($result->onlyInFirstEnv());
        $this->assertContains('FOO', $result->onlyInSecondEnv());
    }

    /** @test */
    public function it_can_find_env_vars_that_are_unique_to_both_files()
    {
        $firstEnv = <<<ENV
FOO=BAR
ENV;

        $secondEnv = <<<ENV
BIN=BAZ
ENV;

        $diff = new Diff;
        $result = $diff->diff($firstEnv, $secondEnv);

        $this->assertContains('FOO', $result->onlyInFirstEnv());
        $this->assertContains('BIN', $result->onlyInSecondEnv());
    }

    /** @test */
    public function it_returns_empty_results_when_env_files_are_empty()
    {
        $firstEnv = <<<ENV
ENV;

        $secondEnv = <<<ENV
ENV;

        $diff = new Diff;
        $result = $diff->diff($firstEnv, $secondEnv);

        $this->assertEmpty($result->onlyInFirstEnv());
        $this->assertEmpty($result->onlyInSecondEnv());
    }
}
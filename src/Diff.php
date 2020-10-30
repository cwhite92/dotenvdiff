<?php

declare(strict_types=1);

namespace ChrisWhite\DotEnvDiff;

use Dotenv\Parser\Entry;
use Dotenv\Parser\Parser;

class Diff
{
    public static function diff(string $firstEnv, string $secondEnv)
    {
        $parser = new Parser;

        $firstEnvs = static::getSortedEnvNames($parser->parse($firstEnv));
        $secondEnvs = static::getSortedEnvNames($parser->parse($secondEnv));

        return new DiffResult(
            array_diff($firstEnvs, $secondEnvs),
            array_diff($secondEnvs, $firstEnvs)
        );
    }

    private static function getSortedEnvNames(array $envs): array
    {
        $envs = array_map(function (Entry $entry) {
            return $entry->getName();
        }, $envs);

        sort($envs);

        return $envs;
    }
}

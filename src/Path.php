<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\CharacterBuilder;

final class Path
{
    public static function parts(string $child): string
    {
        $path = config('character-builder.paths.parts');

        if ($child !== '' && $child !== '0') {
            return $path.\DIRECTORY_SEPARATOR.$child;
        }

        return $path;
    }

    public static function characters(string $child): string
    {
        $path = config('character-builder.paths.characters');

        if ($child !== '' && $child !== '0') {
            return $path.\DIRECTORY_SEPARATOR.$child;
        }

        return $path;
    }
}

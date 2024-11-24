<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\CharacterBuilder\Manipulators;

use BaseCodeOy\CharacterBuilder\Contracts\Manipulator;
use BaseCodeOy\CharacterBuilder\Path;
use ColorThief\ColorThief;
use Intervention\Image\Facades\Image as Intervention;
use Intervention\Image\Image;

final class DominantBackgroundManipulator implements Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        return Intervention::canvas(
            $configuration['width'],
            $configuration['height'],
            ColorThief::getColor(Path::characters("{$seed}.png")),
        )->save(Path::characters("{$seed}/background.png"));
    }
}

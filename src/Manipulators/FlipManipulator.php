<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\CharacterBuilder\Manipulators;

use BaseCodeOy\CharacterBuilder\Contracts\Manipulator;
use Intervention\Image\Image;

final class FlipManipulator implements Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        $backgroundImage->flip();

        return $backgroundImage;
    }
}

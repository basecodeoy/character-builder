<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\CharacterBuilder\Contracts;

use Intervention\Image\Image;

interface Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image;
}

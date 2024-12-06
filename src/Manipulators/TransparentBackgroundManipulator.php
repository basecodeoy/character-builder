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
use Intervention\Image\Facades\Image as Intervention;
use Intervention\Image\Image;

final class TransparentBackgroundManipulator implements Manipulator
{
    #[\Override()]
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        return Intervention::canvas($configuration['width'], $configuration['height'])
            ->save(Path::characters($seed.'/background.png'));
    }
}

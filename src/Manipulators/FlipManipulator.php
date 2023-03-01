<?php

declare(strict_types=1);

namespace PreemStudio\CharacterBuilder\Manipulators;

use Intervention\Image\Image;
use PreemStudio\CharacterBuilder\Contracts\Manipulator;

class FlipManipulator implements Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        $backgroundImage->flip();

        return $backgroundImage;
    }
}

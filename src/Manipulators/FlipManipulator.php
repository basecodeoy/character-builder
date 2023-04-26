<?php

declare(strict_types=1);

namespace BombenProdukt\CharacterBuilder\Manipulators;

use Intervention\Image\Image;
use BombenProdukt\CharacterBuilder\Contracts\Manipulator;

final class FlipManipulator implements Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        $backgroundImage->flip();

        return $backgroundImage;
    }
}

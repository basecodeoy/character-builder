<?php

declare(strict_types=1);

namespace BombenProdukt\CharacterBuilder\Manipulators;

use BombenProdukt\CharacterBuilder\Contracts\Manipulator;
use Intervention\Image\Image;

final class GreyscaleManipulator implements Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        $backgroundImage->greyscale();

        return $backgroundImage;
    }
}

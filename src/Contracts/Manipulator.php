<?php

declare(strict_types=1);

namespace BaseCodeOy\CharacterBuilder\Contracts;

use Intervention\Image\Image;

interface Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image;
}

<?php

declare(strict_types=1);

namespace BombenProdukt\CharacterBuilder\Manipulators;

use BombenProdukt\CharacterBuilder\Contracts\Manipulator;
use BombenProdukt\CharacterBuilder\Path;
use Intervention\Image\Facades\Image as Intervention;
use Intervention\Image\Image;

final class TransparentBackgroundManipulator implements Manipulator
{
    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        return Intervention::canvas($configuration['width'], $configuration['height'])
            ->save(Path::characters("{$seed}/background.png"));
    }
}

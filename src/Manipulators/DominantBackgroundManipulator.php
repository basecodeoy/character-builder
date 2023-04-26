<?php

declare(strict_types=1);

namespace BombenProdukt\CharacterBuilder\Manipulators;

use BombenProdukt\CharacterBuilder\Contracts\Manipulator;
use BombenProdukt\CharacterBuilder\Path;
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

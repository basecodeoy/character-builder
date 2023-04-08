<?php

declare(strict_types=1);

namespace PreemStudio\CharacterBuilder\Manipulators;

use ColorThief\ColorThief;
use Intervention\Image\Facades\Image as Intervention;
use Intervention\Image\Image;
use PreemStudio\CharacterBuilder\Contracts\Manipulator;
use PreemStudio\CharacterBuilder\Path;

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

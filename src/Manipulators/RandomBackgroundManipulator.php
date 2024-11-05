<?php

declare(strict_types=1);

namespace BaseCodeOy\CharacterBuilder\Manipulators;

use BaseCodeOy\CharacterBuilder\Contracts\Manipulator;
use BaseCodeOy\CharacterBuilder\Path;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image as Intervention;
use Intervention\Image\Image;

final class RandomBackgroundManipulator implements Manipulator
{
    public function __construct(private array $colors)
    {
        //
    }

    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        return Intervention::canvas(
            $configuration['width'],
            $configuration['height'],
            Arr::random($this->colors),
        )->save(Path::characters("{$seed}/background.png"));
    }
}

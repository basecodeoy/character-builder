<?php

declare(strict_types=1);

namespace PreemStudio\CharacterBuilder\Manipulators;

use Intervention\Image\Facades\Image as Intervention;
use Intervention\Image\Image;
use PreemStudio\CharacterBuilder\Contracts\Manipulator;
use PreemStudio\CharacterBuilder\Path;

final class GradientBackgroundManipulator implements Manipulator
{
    public function __construct(private array $colors, private string $direction)
    {
        //
    }

    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        $this->createGradient($seed, $configuration);

        return Intervention::make(Path::characters("{$seed}/background.png"));
    }

    private function createGradient(string $seed, array $configuration): void
    {
        $tempFile = Path::characters("{$seed}/temp.png");

        Intervention::canvas($configuration['width'], $configuration['height'])->save($tempFile);
        $this->getRandomColors();
        $this->makeGradient($configuration, $image = \imagecreatefrompng($tempFile));

        \unlink($tempFile);

        \imagepng($image, Path::characters("{$seed}/background.png"));
    }

    private function generateRandomSeededIndexes(array $colors): array
    {
        $values = [];

        while (2 !== \count($values)) {
            $number = \mt_rand(0, \count($colors) - 1);

            if (!\in_array($number, $values, true)) {
                $values[] = $number;
            }
        }

        return $values;
    }

    private function getRandomColors(): void
    {
        $indexes = $this->generateRandomSeededIndexes($this->colors);

        $this->colors = [
            \mb_substr($this->colors[$indexes[0]], 1),
            \mb_substr($this->colors[$indexes[1]], 1),
        ];
    }

    private function makeGradient(array $configuration, $image, int $x = 0, int $y = 0): bool
    {
        $x1 = $configuration['width'];
        $y1 = $configuration['height'];

        if ($x > $x1 || $y > $y1) {
            return false;
        }

        $s = [
            \hexdec(\mb_substr($this->colors[0], 0, 2)),
            \hexdec(\mb_substr($this->colors[0], 2, 2)),
            \hexdec(\mb_substr($this->colors[0], 4, 2)),
        ];

        $e = [
            \hexdec(\mb_substr($this->colors[1], 0, 2)),
            \hexdec(\mb_substr($this->colors[1], 2, 2)),
            \hexdec(\mb_substr($this->colors[1], 4, 2)),
        ];

        $steps = $this->direction === 'horizontal' ? $y1 - $y : $x1 - $x;

        for ($i = 0; $i < $steps; $i++) {
            $r = (int) ($s[0] - ((($s[0] - $e[0]) / $steps) * $i));
            $g = (int) ($s[1] - ((($s[1] - $e[1]) / $steps) * $i));
            $b = (int) ($s[2] - ((($s[2] - $e[2]) / $steps) * $i));

            $color = \imagecolorallocate($image, $r, $g, $b);

            if ($this->direction === 'vertical') {
                \imagefilledrectangle($image, $x + $i, $y, $x1 + $i + 1, $y1, $color);
            }

            \imagefilledrectangle($image, $x, $y + $i, $x1, $y + $i + 1, $color);
        }

        return true;
    }
}

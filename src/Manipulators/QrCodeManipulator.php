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
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Intervention\Image\Facades\Image as Intervention;
use Intervention\Image\Image;

final class QrCodeManipulator implements Manipulator
{
    public function __construct(
        private QrCode $image,
        private string $position = 'bottom-right',
        private int $x = 8,
        private int $y = 8,
    ) {
        //
    }

    public function manipulate(string $seed, array $configuration, Image $backgroundImage): Image
    {
        (new PngWriter())->write($this->image)->saveToFile(Path::characters("{$seed}/qr.png"));

        $qrImage = Intervention::make(Path::characters("{$seed}/qr.png"));
        $backgroundImage->insert($qrImage, $this->position, $this->x, $this->y);

        \unlink(Path::characters("{$seed}/qr.png"));

        return $backgroundImage;
    }
}

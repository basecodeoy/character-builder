<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\CharacterBuilder;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

final class Character
{
    use Concerns\ManagesCharacter;
    use Concerns\ManagesConfiguration;

    public function __construct(
        private string $identifier,
    ) {
        \mt_srand(\crc32($identifier));

        File::ensureDirectoryExists(Path::characters($identifier), 0o777);
    }

    public function create(): \Intervention\Image\Image
    {
        $this->createCharacter();

        $characterImage = Image::make(Path::characters($this->identifier.'.png'));

        foreach ($this->config['manipulators']['before']['character'] as $manipulator) {
            $characterImage = $manipulator->manipulate($this->identifier, $this->config, $characterImage);
        }

        $backgroundImage = Image::canvas($this->config['width'], $this->config['height']);

        foreach ($this->config['manipulators']['before']['background'] as $manipulator) {
            $backgroundImage = $manipulator->manipulate($this->identifier, $this->config, $backgroundImage);
        }

        if (!isset($backgroundImage)) {
            throw new \RuntimeException('Background Image is undefined');
        }

        $backgroundImage->insert($characterImage, 'top-left', 0, 0);

        foreach ($this->config['manipulators']['after']['character'] as $manipulator) {
            $manipulator->manipulate($this->identifier, $this->config, $characterImage);
        }

        foreach ($this->config['manipulators']['after']['background'] as $manipulator) {
            $manipulator->manipulate($this->identifier, $this->config, $backgroundImage);
        }

        \unlink(Path::characters($this->identifier.'/background.png'));

        return $backgroundImage->save(Path::characters($this->identifier.'.png'));
    }
}

<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\CharacterBuilder\Concerns;

use BaseCodeOy\CharacterBuilder\Contracts\Manipulator;

trait ManagesConfiguration
{
    private array $config = [
        'height' => 512,
        'width' => 512,
        'manipulators' => [
            'before' => [
                'character' => [],
                'background' => [],
            ],
            'after' => [
                'character' => [],
                'background' => [],
            ],
        ],
    ];

    public function withSize(int $size): self
    {
        $this->config['width'] = $size;
        $this->config['height'] = $size;

        return $this;
    }

    public function withWidth(int $width): self
    {
        $this->config['width'] = $width;

        return $this;
    }

    public function withHeight(int $height): self
    {
        $this->config['height'] = $height;

        return $this;
    }

    public function withCharacterBeforeManipulator(Manipulator $manipulator): self
    {
        $this->config['manipulators']['before']['character'][] = $manipulator;

        return $this;
    }

    public function withBackgroundBeforeManipulator(Manipulator $manipulator): self
    {
        $this->config['manipulators']['before']['background'][] = $manipulator;

        return $this;
    }

    public function withCharacterAfterManipulator(Manipulator $manipulator): self
    {
        $this->config['manipulators']['after']['character'][] = $manipulator;

        return $this;
    }

    public function withBackgroundAfterManipulator(Manipulator $manipulator): self
    {
        $this->config['manipulators']['after']['background'][] = $manipulator;

        return $this;
    }
}

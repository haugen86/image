<?php

namespace Spatie\Image\Test\Manipulations;

use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Image;
use Spatie\Image\Test\TestCase;

class FocalCropTest extends TestCase
{
    /** @test */
    public function it_can_focal_crop()
    {
        $targetFile = $this->tempDir->path('conversion.jpg');

        Image::load($this->getTestJpg())->focalCrop(100, 500, 100, 100)->save($targetFile);

        $this->assertFileExists($targetFile);
    }

    /** @test */
    public function it_can_focal_crop_with_zoom()
    {
        $targetFile = $this->tempDir->path('conversion.jpg');

        Image::load($this->getTestJpg())->focalCrop(100, 500, 100, 100, 2)->save($targetFile);

        $this->assertFileExists($targetFile);
    }

    /** @test */
    public function it_will_throw_an_exception_when_passing_an_invalid_width()
    {
        $this->expectException(InvalidManipulation::class);

        Image::load($this->getTestJpg())->focalCrop(-100, 500, 100, 100);
    }

    /** @test */
    public function it_will_throw_an_exception_when_passing_an_zoom_value_not_in_range()
    {
        $this->expectException(InvalidManipulation::class);

        Image::load($this->getTestJpg())->focalCrop(100, 500, 100, 100, 900);
    }
}

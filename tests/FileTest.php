<?php

namespace Attogram\SharedMedia\Api;

use PHPUnit\Framework\TestCase;

/**
 */
class FileTest extends TestCase
{
    const VERSION = '0.9.5';

    /**
     */
    public function testConstruct()
    {
        $this->assertTrue(
            class_exists('\Attogram\SharedMedia\Api\File'),
            'class \Attogram\SharedMedia\Api\File not found'
        );
        $this->assertTrue(
            defined('\Attogram\SharedMedia\Api\File::VERSION'),
            'constant \Attogram\SharedMedia\Api\File::VERSION not found'
        );
        $file = new \Attogram\SharedMedia\Api\File();
        $this->assertTrue(is_object($file), 'instantiation of File failed');
    }
}

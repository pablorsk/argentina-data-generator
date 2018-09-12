<?php
/**
 * Copyright (C) 1997-2018 Reyesoft <info@reyesoft.com>.
 *
 * This file is part of JsonApiPlayground. JsonApiPlayground can not be copied and/or
 * distributed without the express permission of Reyesoft
 */

declare(strict_types=1);

namespace Tests;

use ArgentinaDataGenerator\CuitFakerProvider;

class CuitFakerProviderTest extends PHPUnit\Framework\TestCase
{
    public function testText(): void
    {
        $generator = new CuitFakerProvider();
        $this->assertNotEmpty($generator->generateText());
        $this->assertSame(300, strlen($generator->generateText(300)));
    }

    public function testWord(): void
    {
        $generator = new \NewAgeIpsum\Generator();
        $this->assertNotEmpty($generator->generateWord());
    }

    public function testWords(): void
    {
        $generator = new \NewAgeIpsum\Generator();
        $this->assertNotEmpty($generator->generateWords());
        $this->assertCount(5, $generator->generateWords(5));
    }

    public function testSentence(): void
    {
        $generator = new \NewAgeIpsum\Generator();
        $this->assertNotEmpty($generator->generateSentence());
    }

    public function testSentences(): void
    {
        $generator = new \NewAgeIpsum\Generator();
        $this->assertNotEmpty($generator->generateSentences());
        $this->assertCount(5, $generator->generateSentences(5));
    }

    public function testParagraph(): void
    {
        $generator = new \NewAgeIpsum\Generator();
        $this->assertNotEmpty($generator->generateParagraph());
    }

    public function testParagraphs(): void
    {
        $generator = new \NewAgeIpsum\Generator();
        $this->assertNotEmpty($generator->generateParagraphs());
        $this->assertCount(7, $generator->generateParagraphs(7));
    }
}

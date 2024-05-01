<?php

namespace Netnak\Tel\tests;

use Netnak\Tel\Modifiers\Tel;
use Tests\TestCase;
use Statamic\Modifiers\Modifier;

class TelTest extends TestCase
{
    private Modifier $tel;

    public function setUp(): void
    {
        parent::setUp();

        $this->tel = new Tel();
    }

    public function testPlusesAreRemovedFor00()
    {
        // Given
        $nonFormatted = '+971 5577 58 326';
        $expected = '00971 5577 58 326';

        // When
        $actual = $this->tel->removePlus($nonFormatted);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    public function testBracketsAreRemoved()
    {
        // Given
        $nonFormatted = '+44 (0) 1928 777 777';
        $expected = '+44  1928 777 777';

        // When
        $actual = $this->tel->removeOptionalZero($nonFormatted);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    public function testNonNumerialsAreRemoved()
    {
        // Given
        $nonFormatted = '+44 (0) 1928 777 777';
        $expected = '4401928777777';

        // When
        $actual = $this->tel->removeNonNumericals($nonFormatted);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    public function testModifierGeneratesClickableNumber()
    {
        // Given
        $nonFormatted = '+44 (0) 1928 777 777';
        $expected = '00441928777777';

        // When
        $actual = $this->tel->index($nonFormatted, [], []);

        // Assert
        $this->assertEquals($expected, $actual);
    }
}

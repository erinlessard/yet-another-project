<?php

declare(strict_types=1);

namespace tests;

use Barespace\CaseOne;
use PHPUnit\Framework\TestCase;

class CaseOneTest extends TestCase
{
    public function testFindNumbersBySubtraction()
    {
        $values = [2,11,7,15]; // indexes 1 + 2 = 18 (11 + 7 = 18)
        $target = 18;
        $thing = new CaseOne();
        $actual = $thing->findNumbersBySubtraction(values: $values, target: $target);
        $this->assertCount(2, $actual);

        // we're expecting 11 and 7, so index 1 and 2
        $expected = [1, 2];

        $this->assertEquals($actual[0], $expected[0]);
        $this->assertEquals($actual[1], $expected[1]);
    }

    public function testFindNumbersBySubtraction2()
    {
        $values = [2,1,6,11,8,13,7,15,35,40];
        $target = 55;
        $caseOne = new CaseOne();
        $actual = $caseOne->findNumbersBySubtraction(values: $values, target: $target);
        $this->assertCount(2, $actual);

        // we're expecting 15 and 40, index 7 and 9
        $expected = [7, 9];

        $this->assertEquals($actual[0], $expected[0]);
        $this->assertEquals($actual[1], $expected[1]);
    }

    public function testFindNumbersByAddition()
    {
        $values = [2,11,7,15]; // indexes 1 + 2 = 18 (11 + 7 = 18)
        $target = 18;
        $thing = new CaseOne();
        $actual = $thing->findNumbersByAddition(values: $values, target: $target);
        $this->assertCount(2, $actual);

        sort($actual);
        // we're expecting 11 and 7, so index 1 and 2
        $expected = [1, 2];

        $this->assertEquals($actual[0], $expected[0]);
        $this->assertEquals($actual[1], $expected[1]);
    }

    public function testFailsIfNumbersDontAddUp()
    {
        $values = [2,1,6,11,8,13,7,15]; // indexes 1 + 2 = 18 (11 + 7 = 18)
        $target = 55;
        $caseOne = new CaseOne();
        $actual = $caseOne->findNumbersByAddition(values: $values, target: $target);
        $this->assertCount(0, $actual);
    }
}
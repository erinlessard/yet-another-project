<?php

declare(strict_types=1);

namespace tests;

use Barespace\CaseThree;
use PHPUnit\Framework\TestCase;

class CaseThreeTest extends TestCase
{
    public function testSortZerosToEndOfArrayWithPerservedKeys()
    {
        $input = [0,1,0,3,12];
        $caseThree = new CaseThree();
        $results = $caseThree->sortZerosToEndOfArrayWithPerservedKeys($input);
        // result keys were preserved, but because they're out of order they become string keys in PHP, and json_encode handles them slightly differently
        // reset the result keys via array_merge to ensure proper comparison in test
        $result = json_encode(array_merge($results));
        // $result = [1,3,12,0,0]
        $expected = json_encode([1,3,12,0,0]);
        $this->assertJsonStringEqualsJsonString($result, $expected);
    }

    public function testUnsetZerosAndAddToEndOfArray()
    {
        $input = [0,1,0,3,12];
        $caseThree = new CaseThree();
        $results = $caseThree->UnsetZerosAndAddToEndOfArray($input);
        // reset keys
        $a = json_encode(array_merge($results,));
        $b = json_encode([1,3,12,0,0]);
        $this->assertJsonStringEqualsJsonString($a, $b);

        // Second way of doing it the same thing..
        $results2 = $caseThree->UnsetZerosAndAddToEndOfArray2($input);
        $a2 = json_encode(array_merge($results2, []));
        $b2 = json_encode([1,3,12,0,0]);
        $this->assertJsonStringEqualsJsonString($a2, $b2);
    }
}
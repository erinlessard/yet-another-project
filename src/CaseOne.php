<?php

declare(strict_types=1);

namespace Barespace;

/**
 * Question 1:  Two sum Two
 *
 *
 * Array of values  = [2,11,7,15]
 *
 * Target = 18
 *
 *
 * Instructions
 *
 *
 * Look for the two numbers that sum up to the target. Move the numbers in the Array
 */
class CaseOne
{

    // Threw this one together at the end after stretching my brain on case 2 and 3, a better solution I think
    // cleaner too! I'll leave the other though.
    public function findNumbersBySubtraction(array $values, int $target): array
    {
        $match = [];
        foreach ($values as $key => $value) {
            $seeking = $target - $value;
            if($position = array_search($seeking, $values)) {
                $match = [$key => $values[$key], $position => $values[$position]];
                break;
            }
        }
        $matchingIndexes = array_merge(array_flip($match));
        return $matchingIndexes;
    }

    public function findNumbersByAddition(array $values, int $target): array
    {
        $filtered = [];
        foreach ($values as $key => $value) {
            $secondArray = array_diff($values, [$value]);
            $filtered = array_filter($secondArray, function ($item, $key) use ($target, $value) {
                return (($item + $value) == $target);
            }, ARRAY_FILTER_USE_BOTH);
            if (!empty($filtered)) {
                $filtered[$key] = $value;
                break;
            }
        }
        $matchingIndexes = array_merge(array_flip($filtered));
        return $matchingIndexes;
    }
}
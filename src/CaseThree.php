<?php

namespace Barespace;

/**
 * Question 3: Write a function to move all zeros in the array to the end
 *
 *
 * Array = [0,1,0,3,12]
 *
 *
 * Instructions
 *
 *
 * Move all the zeros to the end of the array while maintaining relative order to the non-zero elements
 */

class CaseThree
{

    public function sortZerosToEndOfArrayWithPerservedKeys(array $input): array
    {
        // Sort array by comparing elements. ONLY actually compare an element is the second element is a 0
        // This way non elements will not change their position
        uasort($input, function ($a, $b) {
            // don't change order of items if both are not 0
            if ($a != 0 && $b != 0) {
                return 0;
            }

            // otherwise, anything else will always be larger than zero, effectively shifting zeroes to the end of array
            return ($a < $b) ? 1 : -1;
        });

        return $input;
    }

    public function UnsetZerosAndAddToEndOfArray(array $input): array
    {
        $numberOfZeros = $this->numberOfZerosInArray($input);
        $inputArrayWithZerosRemoved = array_diff($input, [0]);
        for ($i = 0; $i < $numberOfZeros; $i++) {
            $inputArrayWithZerosRemoved[] = 0;
        }

        return $inputArrayWithZerosRemoved;
    }

    public function UnsetZerosAndAddToEndOfArray2(array $input): array
    {
        $newArray = $input;
        foreach($input as $key => $value) {
            if($value === 0) {
                $input[] = $input[$key];
                unset($input[$key]);
            }
        }
        return $input;
    }

    private function numberOfZerosInArray(array $array): int
    {
        // array_count_values could be used here, but it returns an array of results. Since we're looking for the number
        // of 0's in the array, $input[0] will always give the first element. Let's just keep it simple with a foreach
        $zeros = 0;
        foreach ($array as $key => $value) {
            if ($value == 0) {
                $zeros++;
            }
        }

        return $zeros;
    }
}
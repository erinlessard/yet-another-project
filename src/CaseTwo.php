<?php

declare(strict_types=1);

namespace Barespace;


/**
 * Question 2: Write a function to hide a credit card number
 *
 *
 * Instructions
 *
 *
 * A credit card usually contains 16 digits with an (*) asterisk and keeps its last four digits as is
 *
 *
 * Return the updated string with the first 12 characters replaced with asterisks (*).
 */
class CaseTwo
{

    // This feels too easy?
    public function obfuscateCreditCardNumberTo4Characters(string|int $cardNumber): string
    {
        if (strlen((string)$cardNumber) != 16) {
            throw new \Exception("Invalid credit card number");
        }

        return str_pad(substr((string)$cardNumber, -4, 4), 16, '*', STR_PAD_LEFT);
    }
}
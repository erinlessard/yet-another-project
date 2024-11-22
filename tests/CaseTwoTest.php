<?php

declare(strict_types=1);

namespace tests;

use Barespace\CaseTwo;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class CaseTwoTest extends TestCase
{
    public function testObfuscatesCreditCardNumberAsString(): void
    {
        $faker = Factory::create();
        $string = $faker->creditCardNumber();

        $caseTwo = new CaseTwo();
        $sanitizedCreditCardNumber = $caseTwo->obfuscateCreditCardNumberTo4Characters(cardNumber: $string);
        $lastFour = substr($string, -4);
        $fakeString = '************' . $lastFour;
        $this->assertEquals($fakeString, $sanitizedCreditCardNumber);
    }

    public function testObfuscatesCreditCardNumberAsInteger(): void
    {
        $faker = Factory::create();
        $cardNumber = $faker->creditCardNumber();

        $caseTwo = new CaseTwo();
        $sanitizedCreditCardNumber = $caseTwo->obfuscateCreditCardNumberTo4Characters(cardNumber: (int)$cardNumber);
        $fakeString = '************' . substr($cardNumber, -4, 4);
        $this->assertEquals($fakeString, $sanitizedCreditCardNumber);
    }

    public function testCanOnlyObfuscate16DigitCreditCardNumbers(): void
    {
        $this->expectException(\Exception::class);
        $caseTwo = new CaseTwo();
        $sanitizedCreditCardNumber = $caseTwo->obfuscateCreditCardNumberTo4Characters(cardNumber: 123456789);
        $sanitizedCreditCardNumber = $caseTwo->obfuscateCreditCardNumberTo4Characters(cardNumber: '1234-1234-1234-1234');
    }
}
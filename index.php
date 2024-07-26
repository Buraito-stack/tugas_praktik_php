<?php

// Function to calculate the area of a circle
function calculateCircleArea(float $radius): float {
    return pi() * $radius * $radius;
}

// Function to convert Celsius to Fahrenheit
function convertCelsiusToFahrenheit(float $celsius): float {
    return ($celsius * 9/5) + 32;
}

// Function to determine if a number is odd or even
function checkOddOrEven(int $number): string {
    return ($number % 2 === 0) 
        ? "The number $number is even." 
        : "The number $number is odd.";
}

// Function to calculate discount amount
function calculateDiscount(float $price, float $discountPercentage): float {
    return $price * $discountPercentage / 100;
}

// Variables and function calls
$radius = 7.0;
$celsius = 25.0;
$number = 15;
$price = 100000.0;
$discountPercentage = 20.0;

// Calculate and round the area of the circle
$roundedArea = round(calculateCircleArea($radius), 2);

// Calculate discount amount and total price
$discountAmount = calculateDiscount($price, $discountPercentage);
$totalPrice = $price - $discountAmount;

// Display results
// Escape output values to prevent XSS vulnerabilities
$radiusEscaped = htmlspecialchars($radius);
$celsiusEscaped = htmlspecialchars($celsius);
$numberEscaped = htmlspecialchars($number);
$priceEscaped = htmlspecialchars($price);
$discountAmountEscaped = htmlspecialchars($discountAmount);
$totalPriceEscaped = htmlspecialchars($totalPrice);

// Circle Calculations display
echo "<h1>Circle Calculations</h1>";
echo "<p>The radius of the circle is $radiusEscaped cm</p>";
echo "<p>The area of the circle is " . $roundedArea . " cm<sup>2</sup></p>";

// Temperature Conversion display
echo "<h1>Temperature Conversion</h1>";
echo "<p>The temperature in Celsius is $celsiusEscaped&deg;C</p>";
echo "<p>The temperature in Fahrenheit is " . convertCelsiusToFahrenheit($celsius) . "&deg;F</p>";

// Odd or Even Number display
echo "<h1>Odd or Even Number</h1>";
echo "<p>" . checkOddOrEven($numberEscaped) . "</p>";

// Discount Calculation display
echo "<h1>Discount Calculation</h1>";
echo "<p>The item price is Rp $priceEscaped</p>";
echo "<p>Discount: $discountPercentage%</p>";
echo "<p>Discount amount: Rp $discountAmountEscaped</p>";
echo "<p>Total price after discount: Rp $totalPriceEscaped</p>";
?>

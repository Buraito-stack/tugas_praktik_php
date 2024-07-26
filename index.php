<?php

//Menghitung Luas Lingkaran
function calculateCircleArea($radius) {
    return pi() * $radius * $radius;
}

$radius = 7;
$roundedArea = round(calculateCircleArea($radius), 2);

echo "Jari-jari lingkaran adalah $radius cm<br>";
echo "Luas Lingkaran adalah " . $roundedArea . " cm<sup>2</sup><br>";

//Kalkulasi Suhu
function convertCelciusToFahrenheit ($celcius){
    return ($celcius * 9/5) + 32;
}

$celcius = 25;

echo "Suhu dalam Celcius adalah $celcius&deg;C<br>";
echo "Suhu dalam Fahrenheit adalah " . convertCelciusToFahrenheit($celcius) . "&deg;F<br>";

//Menentukan Bilangan Ganjil atau Genap
function checkOddorEven($number){
    return ($number % 2 == 0) ? "Bilangan $number adalah bilangan genap." : "Bilangan $number adalah bilangan ganjil.";
}

$number = 15;
echo checkOddOrEven($number);
echo "<br>";

//Menghitung Diskon Pembelian
function calculateDiscount($price, $discountPercentage) {
    return $price * $discountPercentage / 100;
}

$price = 100000; // Harga dalam Rupiah
$discountPercentage = 20; // Persentase diskon
$discountAmount = calculateDiscount($price, $discountPercentage);
$totalPrice = $price - $discountAmount;

echo "Harga barang: Rp $price<br>";
echo "Diskon: $discountPercentage%<br>";
echo "Jumlah diskon: Rp $discountAmount<br>";
echo "Total harga setelah diskon: Rp $totalPrice";

?>
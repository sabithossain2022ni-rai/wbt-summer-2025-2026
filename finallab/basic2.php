<?php


$principal = 5000;
$rate = 5;
$time = 2;

$simpleInterest = ($principal * $rate * $time) / 100;

echo "<h2>1. Simple Interest</h2>";
echo "Principal = $principal <br>";
echo "Rate = $rate% <br>";
echo "Time = $time years <br>";
echo "Simple Interest = $simpleInterest <br><br>";



$num = 17;
$isPrime = true;

if ($num <= 1) {
    $isPrime = false;
} else {
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}

echo "<h2>2. Prime Number</h2>";

if ($isPrime) {
    echo "$num is a Prime Number.<br><br>";
} else {
    echo "$num is Not a Prime Number.<br><br>";
}



$n = 5;
$factorial = 1;

for ($i = 1; $i <= $n; $i++) {
    $factorial = $factorial * $i;
}

echo "<h2>3. Factorial</h2>";
echo "Factorial of $n = $factorial <br><br>";



$numbers = array(10, 20, 30, 40, 50);
$sum = 0;

foreach ($numbers as $number) {
    $sum = $sum + $number;
}

$average = $sum / count($numbers);

echo "<h2>4. Sum and Average</h2>";
echo "Array elements: ";

foreach ($numbers as $number) {
    echo "$number ";
}

echo "<br>";
echo "Sum = $sum <br>";
echo "Average = $average <br><br>";



echo "<h2>5. Pattern</h2>";

for ($i = 1; $i <= 4; $i++) {

    for ($j = 1; $j <= $i; $j++) {
        echo "$i ";
    }

    echo "<br>";
}

?>
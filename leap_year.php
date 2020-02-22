<?php
// високосный год
$a = 1900;

function getLeapYear ($a) : string
{
        if ($a % 400 == 0){
            return "$a - год високосный <br/>";
        } elseif ($a % 4 == 0 && $a % 100 !== 0){
            return "$a - год високосный <br/>";
        } else return  "$a - год обычный <br/>";
}

echo getLeapYear($a);

// сумма цифр
$num = 1234;
$sum = 0;
if (is_numeric($num) && is_int($num)) {
    do {
        $sum += $num%10;
    } while ($num = (int)($num/10));
    echo $sum;
} else echo 'Не число/не целое';



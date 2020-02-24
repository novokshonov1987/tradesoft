<?php


////display_errors(1);
//error_reporting(E_ALL ^ E_DEPRECATED);
//ini_set('display_errors', '1');
//
//$test = 1/0;
//
//echo 'Ok!';
//
//return;
//
//session_start();
//
////unset($_SESSION['name']);
//if (!empty($_POST)) {
//    $_SESSION['name'] = $_POST['name'];
//    session_write_close();
//}
//
//if ($_SESSION['name']) {
//    echo 'Hi '. $_SESSION['name'] . '!!!';
//    return;
//}
?>
<!---->
<!--<form method="post" enctype="multipart/form-data">-->
<!--    <label>Имя: <input type="text" name="name" required></label>-->
<!--    <label>Пароль: <input type="password" name="pass" required></label>-->
<!--    <input type="submit">-->
<!--</form>-->
<?php

$strArr= [
    'One',
    'Two',
    'Twenty',
    'Аааааа - ru',
    'Afffff',
    'Aaaaaa - en',
];

//
//sort($strArr, SORT_STRING);
//print_r($strArr);

//$str = 'AAbBbbCcCcAAa';
//
//$uniq = (str_split($str));
//
//foreach ($uniq as $key => $elem){
//    $prev_elem = '';
//    if ($prev_elem == $elem){
//        unset($uniq[$key]);
//        continue;
//    }
//    $prev_elem = $elem;
//}
//
//print_r($uniq);

/**
 * Есть многомерный массив, размерность не известна, элементами могут быть как числа так и массивы. Найти максимальный элемент.
 */
$arr = [
    1,
    2,
    3,
    [
        5,
        6,
        100500,
        [
            7,
            8,
            'fdf',
            -1
        ],
    ],
];

$iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($arr));
$arrOut = iterator_to_array($iterator, false);

echo '<br>';
echo ' Есть многомерный массив, размерность не известна, элементами могут быть как числа так и массивы. Найти максимальный элемент<br>';
print_r(max($arrOut));
echo '<br>';

/**
 * Из предыдущего массива сделать одномерный и отфильтровать все нечисловые элементы
 */
$numeric_array = [];
foreach ($arrOut as $item){
    if(is_numeric($item)){
        $numeric_array[] = $item;
    }
}
echo '<br>';
echo 'Из предыдущего массива сделать одномерный и отфильтровать все нечисловые элементы <br>';
var_dump($numeric_array);
echo '<br>';


echo 'Найти медиану предыдущего массива и отбросить все  элементы, которые больше и меньше медианы в 2 раза<br>';
$count = count($numeric_array);

if ($count % 2 != 0){
    $med = floor($count/2);
    echo "медиана массива: позиция $med, элемент $numeric_array[$med]";
}
else {
    $med = $count/2;
    $two = $a[$med];
    $one = $a[$med-1];
    echo "медиана массива: позиция " . ($med-1) . " и " .$med. ", сумма " . ($one+$two)/2;
}

$med_array = [];
foreach ($numeric_array as $item){
    if ($item/$med < 2 ){
        $med_array[] = $item;
    }
}
echo '<br>';
var_dump($med_array);




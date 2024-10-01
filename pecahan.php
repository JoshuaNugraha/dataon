<?php

echo "---------------------". "<br> Number 2 <br>";
$amount = 1575250;  

 
$pecahan = array(
    100000, 50000, 20000, 5000, 100, 50
);


$result = [];

foreach ($pecahan as $pecah) {
    $hitung = floor($amount / $pecah);  
    $amount -= $hitung * $pecah;        
    $result[$pecah] = $hitung;         
}

 
foreach ($result as $pecah => $count) {
    echo "Pecahan Rp $pecah: $count" . "<br>";
}

echo "---------------------". "<br> Number 3 <br>";

$string = 'user@example.com';
$str_arr = explode("@", $string);
$string = $str_arr[1];
echo $string;

echo "<br>---------------------". "<br> Number 4 <br>";

$number = 1225441;

$result = [];


$panjang = (string)$number;
$panjang = str_split($panjang);

$pecahan = [1000000, 100000, 10000, 1000, 100, 10, 1];

for($j=0; $j<count($panjang); $j++){
    echo $panjang[$j]*$pecahan[$j] . "<br>";
}

echo "---------------------". "<br> Number 5 <br>";

$hitung = '3204657895';
echo "Panjangnya adalah ". strlen($hitung);

?>

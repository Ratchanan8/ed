<?php 
$text = "ABC";
$value = isset($text) ? $text : '';
echo "value = ".$value."<br>";

$value2 = $text ?? null;
echo "value2 = ".$value2;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Kaz</title>

	<style>
	
	body{font-family:Tahoma, Verdana, Arial;}
	p{padding:15px}
	</style>
</head>

<body>
<br><br><br>
<center>

<br>
<p>
<?php

include('kkconvert.php');

$text ="سالەم مەنىڭ قازاعىم!<br>
جانىبەك قازاق جازۋلارىن سايكەستىرۋ پروگرامماسى.<br>
ءبىلىم، ءوزارا ۇيرەنۋ. كىتاپ — ءبىلىم بۇلاعى.<br>
ءۇش-اق نارسە ادامنىڭ قاسيەتى،<br>
ىستىق قايرات، نۇرلى اقىل، جىلى جۇرەك.";

$text= artokz($text);
echo $text;

?>
</p>
<br>
<p dir="rtl">
<?php

include('toteconvert.php');

$txt ="Кітәп. Сәлем менің қазағым!<br>
Жәнібек қазақ жазуларын сәйкестіру программасы.<br>
Білім, өзара үйрену. Кітәп — білім бұлағы.<br>
Үш-ақ нәрсе адамның қасиеты,<br>
Ыстық қайрат, нұрлы ақыл, жылы жүрек.<br>";

$txt= tote($txt);
echo $txt;

?>
</p>
</center>
</body>
</html>

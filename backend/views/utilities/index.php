<?php

//include 'app\common\utilities\lib.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


function pr($v = '[NOT PR]', $var = 0){
	echo '<pre>';
	if ($var) {
		var_dump($v);
	} else print_r($v);
	echo '</pre>';
}

function dpr($v = '[NOT DPR]',$var = 0){
	pr($v, $var);
	die('[[DIE DPR]]');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title> Утилиты </title>

</head>
<body>
<form method="GET">
    <b>1. Экспорт таблицы VLAN :  </b>
	<input type="submit" name="st_vlan" value="Старт"><br><br>

    <b>2. Экспорт таблицы COMMUTATOR :  </b>
	<input type="submit" name="st_commutator" value="Старт"><br><br>

    <b>3. Экспорт таблицы SUBNET :  </b>
	<input type="submit" name="st_subnet" value="Старт"><br><br>

    <b>4. Экспорт таблицы CLIENT :  </b>
	<input type="submit" name="st_client1" value=" 1 ">
	<input type="submit" name="st_client2" value=" 2 ">
	<input type="submit" name="st_client3" value=" 3 ">
	<input type="submit" name="st_client4" value=" 4 "><br><br>

    <?php echo $_HTML; ?>   
    <?php echo $_HTML1; ?>   

</form>
</body>
</html>
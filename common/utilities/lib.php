<?php
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
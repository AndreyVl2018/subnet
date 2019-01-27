<?php

defined('VAVtools') || die('STOP');

function pr($value = '[NOT]', $var = false){
	echo '<pre>';
	if ( $var ) {
		var_dump($value);
	} else print_r($value);
	echo '</pre>';
}

function dpr($value = '[NOT]', $var = false){
	# code...
	pr($value, $var);
	die('[[DIE DPR]]');
}

function get_param($name, $def = '', $type = 'str'){
	if ( isset($_POST[$name]) ) {
		$param = $_POST[$name];
	} elseif ( isset($_GET[$name]) ) {
		$param = $_GET[$name];
	} else return $def;

	if ( is_array($param) ) {
		die('ERROR in function get_param('.$name.')');
	}

	return clean_param($param, $type);
}

function clean_param($param, string $type = 'str'){
	# code...
	switch ($type) {
		case 'int':
			return (int)$param;
			break;
		case 'float':
			return (float)$param;
			break;
		case 'str':
		case 'string':
		default:
			return (string)$param;
			break;
	}
}

function get_param_array($name, $type = 'str'){
	# code...
	if ( isset($_POST[$name]) ) {
		$param = $_POST[$name];
	} elseif ( isset($_GET[$name]) ) {
		$param = $_GET[$name];
	} else return false;

	if ( !is_array($param) ) {
		# code...
		// die('ERROR ');
		return clean_param($param, $type);
	}
	return clean_param_array($param, $type);
}

function clean_param_array(array $param = null, $type = 'str'){
	$param = (array)$param;
	foreach ($param as $key => $value) {
		if ( is_array($value) ) {
			$param[$key] = clean_param_array($value, $type);
		} else {
			$param[$key] = clean_param($value, $type);
		}
	}
	return $param;
}

function VAVtools_scandir($dir = __DIR__, $type = 'all') {
	# code...
	$files = scandir($dir);
	array_shift($files);
	array_shift($files);
	if ( $type != 'all' ) {
		# code...
		$f = [];
		$d = [];
		foreach ($files as $name) {
			# code...
			if( is_dir($dir.'/'.$name) )
				$d[] = $name;
				else $f[] = $name;
		}
		switch ($type) {
			case 'files': 	return $f;
			case 'dir': 	return $d;
			case 'mix': 	return ['files' => $f, 'dir' => $d];
			default: 		return $files;
		}
	}
	return $files;
}

function get_files_tree($dir = __DIR__, $level = 0) {
		$files = VAVtools_scandir($dir, 'mix');
		$files['level'] = $level;
		foreach ($files['dir'] as $index => $NameDir) {
			$files['dir'][$NameDir] = get_files_tree($dir.'/'.$NameDir, $level + 1);
			unset($files['dir'][$index]);
		}
		return $files;
}


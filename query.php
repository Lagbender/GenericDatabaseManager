<?php
// Prepared statement

function select($mysqli) {
	/*if ($stmt = $mysqli->prepare("INSERT INTO `Anagrafica` (`Nome`, `Cognome`, `Anno`) VALUES (?, ?, ?)")) {  // Placeholder
		if ($stmt->bind_param("ssi", $name, $surname, $year)) { // Associazione parametri-variabili

			
				's'	Corrisponde a variabili associate al tipo di dato stringa.
				'i'	Corrisponde a variabili associate al tipo di dato numeri interi.
				'd'	Corrisponde a variabili associate al tipo di dato numeri double.
				'b'	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
			
						
			// Acquisizione valori
			$name = $_POST["Nome"];
			$surname = $_POST["Cognome"];
			$year = (int) $_POST["Anno"];

			$stmt->execute();
		}
	}
	return $stmt;
	*/
	
}

/*
// Bind parameters. Types: s = string, i = integer, d = double,  b = blob
$a_params = array();
 
$param_type = '';
$n = count($a_param_type);
for($i = 0; $i < $n; $i++) {
  $param_type .= $a_param_type[$i];
}
 
// with call_user_func_array, array params must be passed by reference
$a_params[] = & $param_type;
 
for($i = 0; $i < $n; $i++) {
  // with call_user_func_array, array params must be passed by reference
  $a_params[] = & $a_bind_params[$i];
}
 
// Prepare statement 
$stmt = $conn->prepare($sql);
if($stmt === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
}
 
// use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array
call_user_func_array(array($stmt, 'bind_param'), $a_params);
 
// Execute statement
$stmt->execute();
*/

function tables($mysqli) {
	$tables = $mysqli->query("SHOW TABLES");
	$ret = $tables->fetch_all();
	return $ret;
}

function fields($mysqli, $table) {
	$fields = $mysqli->query("SHOW FIELDS FROM " . $table);
	$ret = $fields->fetch_all();
	return $ret;
}
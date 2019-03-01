<?php
// Prepared statement

function select($mysqli, $text) {
	if ($stmt = $mysqli->prepare(/*"INSERT INTO `Anagrafica` (`Nome`, `Cognome`, `Anno`) VALUES (?, ?, ?)"*/$text)) {  // Placeholder
		if ($stmt->bind_param("ssi", $name, $surname, $year)) { // Associazione parametri-variabili

			/*
				's'	Corrisponde a variabili associate al tipo di dato stringa.
				'i'	Corrisponde a variabili associate al tipo di dato numeri interi.
				'd'	Corrisponde a variabili associate al tipo di dato numeri double.
				'b'	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
			*/
						
			// Acquisizione valori
			$name = $_POST["Nome"];
			$surname = $_POST["Cognome"];
			$year = (int) $_POST["Anno"];

			$stmt->execute();
		}
	}
	return $stmt;
}

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
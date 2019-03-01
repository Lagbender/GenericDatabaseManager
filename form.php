<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')  {
	//siamo qua
	define("DB", $_POST["db_name"]);
	require "credentials.php";
	//deve accedere
	require "connect.php";
	
	if (!$mysqli->connect_errno) {
		require "query.php";
		
		/*if ($_POST["action"] == "selection") {*/
			$tables = tables($mysqli);
			if ($mysqli->errno) {
				$error = $mysqli->error;
				$errorNo = $mysqli->errno;
				require "error.php";
			} elseif (sizeof($tables) > 0) {
				$fields;
				foreach ($tables as $rows) {
					foreach ($rows as $table_name)
					$fields[$table_name] = fields($mysqli, $table_name);
				}
				require "selection.php";
			}
			
			$mysqli->close();
		/*} elseif ($_POST["action"] == "insertion") {
			
		}*/
	} else {
		$errno = "404";
		$error = "Database not found";
		require "error.php";
	}
} else {
    $errorNo = 403;
    $error = "Utilizzare il form indicato";
    require "error.php";
}
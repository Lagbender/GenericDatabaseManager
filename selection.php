<!DOCTYPE html>
<html>
    <head>
        <title>Popolamento database</title>
        <meta charset="UTF-8" />
		
		<script type="text/javascript">
			function select_table() {
				table_index = document.getElementById("tables").selectedIndex;
				console.log(table_index);
				switch(table_index) {
					<?php
					$index = 0;
					foreach ($fields as $rows) {
						echo "case " . ($index++) . ":";
						$content = "\"";
						foreach ($rows as $field) {
							//foreach ($field as $value) {
							//	$content .= "<label> " . $value . " </label>";
							//}
							$content .= set_right_input_type($field) . "<br />";
						}
						$content .= "\"";
						echo "document.getElementById(\"fields\").innerHTML = " . $content . "; break;";
					}
					?>
				}
			}
			
			<?php
			function set_right_input_type($field) {
				$name = $field[0];
				$type = substr($field[1], 0, strpos($field[1], "("));
				$max = substr($field[1], strpos($field[1], "("));
				$ret = "<label>" . $name . "</label>";
				if (strpos($field[1], "date") !== false) {
					$ret .= "<input type='date' name='" . $name . "' />";
				} elseif (strpos($field[1], "varchar") !== false) {
						$ret .= "<textarea rows='1' name='" . $name . "'></textarea>";
				} elseif (strpos($field[1], "char") !== false) {
						$ret .= "<input type='text' name='" . $name . "' />";
				} elseif (strpos($field[1], "int") !== false || strpos($field[1], "float") !== false || strpos($field[1], "double") !== false || strpos($field[1], "real") !== false) {
					$ret .= "<input type='number' name='" . $name . "' />";
				}
				
				return $ret;
			}
			?>
		</script>
    </head>
    <body onload="select_table();">
		<fieldset>
			<legend>
				<select id="tables" form="insert" onchange="select_table();" autofocus>
					<?php
					foreach ($tables as $rows) {
						foreach ($rows as $table_name) {
						?>
					        <option name="<?php echo $table_name; ?>"> <?php echo $table_name; ?> </option>
						<?php
						}
					}
					?>
				</select>
			</legend>
			<label id="fields"></label>
		</fieldset>
    </body>
</html>
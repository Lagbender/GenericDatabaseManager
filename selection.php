<!DOCTYPE html>
<html>
    <head>
        <title>Popolamento database</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Required meta tags -->

        <!-- CSS e link vari -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <!-- CSS e link vari -->
		
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
						$i = 0;
						foreach ($rows as $field) {
							//foreach ($field as $value) {
							//	$content .= "<label> " . $value . " </label>";
							//}
							$content .= set_right_input_type($field, $i++) . "<br />";
						}
						$content .= "\"";
						echo "document.getElementById(\"fields\").innerHTML = " . $content . "; break;";
					}
					?>
				}
			}
			
			<?php
			function set_right_input_type($field, $index) {
				$name = $field[0];
				$type = $field[1];
				$required = $field[2] == "NO" ? true : false;
				$ret = "<label name='field_name_" . ($index) . "'>" . $name . "</label>";
				if (strpos($type, "date") !== false) {
					$ret .= "<input type='date' name='" . $name . "' " . ($required ? "required='required'" : "") . "/>" . ($required ? "*" : "");
				} elseif (strpos($type, "varchar") !== false) {
						$ret .= "<textarea rows='1' name='" . $name . "'" . ($required ? "required='required'" : "") . "></textarea>" . ($required ? "*" : "");
				} elseif (strpos($type, "char") !== false) {
						$ret .= "<input type='text' name='" . $name . "' " . ($required ? "required='required'" : "") . "/>" . ($required ? "*" : "");
				} elseif (strpos($type, "int") !== false || strpos($type, "float") !== false || strpos($type, "double") !== false || strpos($type, "real") !== false) {
					$ret .= "<input type='number' name='" . $name . "' " . ($required ? "required='required'" : "") . "/>" . ($required ? "*" : "");
				}
				
				return $ret;
			}
			?>
		</script>
    </head>
		<body onload="select_table();">
			<div id="override">
				<form name="selection" action="controller.php" method="post">
					<div class="text">
						<fieldset class = "form-group">
							<legend>
								<select class="select" id="tables" onchange="select_table();" autofocus>
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
							<input type="hidden" name="to_do" value="insert" />
							<input type="hidden" name="db_name" value="<?php echo DB; ?>" />
							<div><input type="submit" class="btn" value="Send" />
							<input type="reset" class="btn" value="reset" /></div>
							
						</fieldset>
					</div>
				</form>
			</div>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
			<script>
				$(".select").css({"font-size": "18px"});
			</script>
    </body>
</html>
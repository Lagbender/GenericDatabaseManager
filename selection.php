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
							foreach ($field as $tmp) {
								$content .= "<label> " . $tmp . " </label>    ";
							}
							$content .= "<br />";
						}
						$content .= "\"";
						echo "document.getElementById(\"fields\").innerHTML = " . $content . "; break;";
					}
					?>
				}
			}
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
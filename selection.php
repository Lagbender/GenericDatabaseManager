<!DOCTYPE html>
<html>
    <head>
        <title>Popolamento database</title>
        <meta charset="UTF-8" />
		
		<script type="text/javascript">
			function select_table() {
				table_index = document.getElementById("tables").selectedIndex;
				switch(table_index) {
					<?php
					$index = 0;
					foreach ($fields as $rows) {
						echo "case " . ($index++) . ":";
						$content = "";
						foreach ($rows as $field) {
							foreach ($field as $tmp) {
								$content .= "\"<label> " . $tmp . " </label>\"";
								$content .= "\"<br />\"";
							}
							echo "document.getElementById(\"fields\").innerHTML = " . $content;
						}
					}
					?>
				}
			}
		</script>
    </head>
    <body>
		<fieldset>
			<legend>
				<select id="tables" form="insert" onchange="select_table();">
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
			<label id="fields">
				<?php
				foreach ($fields as $rows) {
					foreach ($rows as $field) {
						foreach ($field as $tmp) {
						?>
							<label> <?php echo $tmp; ?> </label>
							<br />
						<?php
						}
					}
				}
				?>
			</label>
		</fieldset>
    </body>
</html>
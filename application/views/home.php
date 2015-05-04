<html>
<head>
	<title>Home View</title>
</head>
<body>
	<div id="container">
		<p>My view has been loaded</p>
		<?php 
			foreach ($rows as $r) {
				echo '<h1>' . $r->title . '</h1>';
			}
		?>
		
		<?php
			foreach ($rows as $r) {
				echo '<h1>' . $r->title . '</h1>';
				echo $r->contents;
//				echo '<div>' . $r->contents . '</div>';
			}
		?>
	</div>

</body>
</html>
<!--
	Web Root Listing
	Dynamically Lists the folders in the webroot, to avoid having to memorize subfolders for projects
	Version 0.1
	6/13/2011
	Kacey Cole via PurpleState 
-->
<!DOCTYPE html>

<html>
<head>
	<title>PurpleState Web Root</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
	<?php	
		$dir = '/var/www/htdocs'; // Set directory to parse => Make dynamic
	?>
</head>	
<body>
	<div id="wrapper">
		<div id="header">
			<h1>PurpleState Local Project Listing</h1>
		</div>
		<div id="content">
			<?php
					$iterator = new DirectoryIterator($dir);// Declare search object
					
					foreach ($iterator as $test){ // Check each file in directory
						if ($test->isDir() && !$test->isDot()){	// If file is a directory, and NOT a root folder
							//echo $test->getPathname()."<br />";
							$projectCheck = new DirectoryIterator($test->getPathname()); // Declare subfolder search object
							$docText = null;
							$file = $iterator->getFilename();
							foreach ($projectCheck as $projIterator){ // List each file in subfolder
								if ($projIterator->getFilename() == "define.txt"){ // Looking for define.txt
									$docText = file_get_contents($projIterator->getPathname()); // Parse file
								}	
							}
							if ($docText == null){
								echo "<a href='/$file/'>$file</a><br />";
							}
							elseif ($docText == "null" || $docText == "null " ){}//Do nothing if set to skip.
							else{
								echo "<a href='/$file/'>$docText</a><br />";
							}
						}
					}
				?>
		</div>
		<div id="footer">
			<h6>Version 0.1</h6>
			<p class="brand">
				Powered by PurpleState;
			</p>
		</div>
	</div>
</body>
</html>

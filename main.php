<!doctype html>
<html>
    <head> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Main Page</title>
		<link rel="stylesheet" type="text/css" href="mainstyle.css" />
	</head>

    <body>
		<?php
			session_start();
		?>
		<section>
			<div id = "left">
				
				<h1>Z</h1>
				<h2>WORLD CUP<br>F.C.</h2>
				<!--
				<h2>Nicholas Chao & Xinyue Liu</h2>
				-->
			</div>

			<div id = "right">
				<form action = 'q1.php' method="POST">
				<div class = "square">
					<div class = "content">
						<button class = "q1" name = "Q1" type = "submit" value = "Q1">World<br>Cup</button>
					</div>
				</div>
				</form>
				
				<form action = 'q2.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q2" name = "Q2" type = "submit" value = "Q2">Players</button>
					</div>
				</div>
				</form>
				
				<form action = 'q3.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q3" name = "Q3" type = "submit" value = "Q3">Stars</button>
					</div>
				</div>
				</form>
				
				<form action = 'q4.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q4" name = "Q4" type = "submit" value = "Q4">Team History</button>
					</div>
				</div>
				</form>
				
				<form action = 'q5.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q5" name = "Q5" type = "submit" value = "Q5">Country Squads</button>
					</div>
				</div>
				</form>
				
				<form action = 'q6.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q6" name = "Q6" type = "submit" value = "Q6">Interactive Map</button>
					</div>
				</div>
				</form>
				
				<form action = 'q7.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q7" name = "Q7" type = "submit" value = "Q7">Awards</button>
					</div>
				</div>
				</form>
				
				<form action = 'q8.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q8" name = "Q8" type = "submit" value = "Q8">Videos</button>
					</div>
				</div>
				</form>
				
				<form action = 'q9.php' method = "POST">
				<div class = "square">
					<div class = "content">
						<button class = "q9" name = "Q9" type = "submit" value = "Q9">Head<br>to<br>Head</button>
					</div>
				</div>
				
				</form>
				
			</div>
			
			
		</section>
		
	<p style = "font-size:150%">
		If you have any questions about our project, please contact the system administrator
		at <a href = mailto:xinyliu@umd.edu>xinyliu@umd.edu</a>
	</p>	
		
		
		
    </body>
</html>
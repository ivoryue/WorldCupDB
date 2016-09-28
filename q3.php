<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 3</title>
<meta name="viewport" content="width=device-width, initial-scale=1" HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="querystyle.css">
<style>

</style>
</header>
<body>
  <?php 
	$host = "localhost";
	$database = "WorldCupDB";
	$user = "root";
	$password = "Ivory~5229";
	$db = connectToDB($host, $user, $password, $database);
	$db->set_charset('utf8');
	$db->query('SET NAMES utf8');
	function connectToDB($host, $user, $password, $database) {
		$db = mysqli_connect($host, $user, $password, $database);
		if (mysqli_connect_errno()) {
			echo "Connect failed.\n".mysqli_connect_error();
			exit();
		}
		return $db;
	}	
  ?>
  <ul class = "topnav">
	<li class = "topli"><a class="active" href="main.php">Home</a></li>
	<li class = "topli"><a href="q1.php">World Cup</a></li>
	<li class = "topli"><a href="q2.php">Players</a></li>
	<li class = "topli"><a href="q3.php">Stars</a></li>
	<li class = "topli"><a href="q4.php">Team History</a></li>
	<li class = "topli"><a href="q5.php">Country Squads</a></li>
	<li class = "topli"><a href="q6.php">Interactive Map</a></li>
	<li class = "topli"><a href="q7.php">Awards</a></li>
	<li class = "topli"><a href="q8.php">Videos</a></li>
	<li class = "topli"><a href="q9.php">Head to Head</a></li>
  </ul>
  
  <div class = "side">
	<br><br><br>
	<?php
	  $scriptName = $_SERVER["PHP_SELF"];
	  echo "Click to enter: ";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<input type = "submit" name = "q3enter" value = "enter">';
	  echo '</form>';
	?>
  </div>
  
  <div class = "content" style = "margin-left:17%; ">
	<br><br><br>
	<?php
	if(isset($_GET["q3enter"])){
	  function microtime_float(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	  }
	  $time_start = microtime_float();
	  $query1 = sprintf("SELECT year, team, player.name, player.bday, player.bmonth, player.byear, age FROM player INNER JOIN (SELECT name, bday, bmonth, byear FROM player GROUP BY name, bday, bmonth, byear HAVING COUNT(name) > 1) dup ON (player.name = dup.name and player.byear = dup.byear and player.bday = dup.bday and player.bmonth = dup.bmonth )");
	  $query1r = mysqli_query($db, $query1);
	  $numRow = mysqli_num_rows($query1r);
	  #print_r($query1r);
	  if($query1r && $numRow >= 1){
		echo "Players participated in <strong>more than one </strong>World Cup: <br><br>";
		echo "<table align = 'center'>";
		  echo "<tr>";
			echo '<td>Year</td>';
			echo '<td></td>';
			echo '<td>Team</td>';
			echo '<td>Name</td>';
			echo '<td>Goals</td>';
			echo '<td>Penalty Goals</td>';
		  echo "</tr>";
	    while($query1Row = mysqli_fetch_array($query1r, MYSQLI_ASSOC)){
		  echo '<tr>';
			$query11 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $query1Row["team"]);
			$query11r = mysqli_query($db, $query11);
			#print_r($query21r);
			$query11Row = mysqli_fetch_array($query11r, MYSQLI_ASSOC);
			#print_r($query21Row);
			#print_r("<image src = '". $query21Row['flagurl']."'>");  
			echo '<td>'.$query1Row["year"].'</td>';
			echo "<td>"."<image src = '". $query11Row['flagurl']."'>"."</td>";
			echo '<td>'.$query1Row["team"].'</td>';
			echo '<td>'.$query1Row["name"].'</td>';
			$query12 = sprintf('SELECT goal, pengoal FROM goal WHERE year = %s and name LIKE "%s"', $query1Row["year"], $query1Row["name"]);
			  #print_r($query12);
			  $query12r =  mysqli_query($db, $query12);
			  $numRow12 = mysqli_num_rows($query12r);
			  #print_r($query12r);
			  #print_r('<br>');
			  if($query12r && $numRow12 > 0){
				$query12Row = mysqli_fetch_array($query12r, MYSQLI_ASSOC);
				echo '<td>'.$query12Row["goal"].'</td>';
				echo '<td>'.$query12Row["pengoal"].'</td>';
			  }else{
				echo '<td>0</td>';
				echo '<td>0</td>';
			  }
		  echo '</tr>';
		}
		echo "</table>";
	  }
	  
	  $time_end = microtime_float();
	  $time = $time_end - $time_start;
	  print_r($time);
	}else{
	  echo "Click enter to start.";
	}
	?>
  </div>

</body>
</html> 
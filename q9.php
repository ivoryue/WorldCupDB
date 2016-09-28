<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 9</title>
<meta name="viewport" content="width=device-width, initial-scale=1" HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
	$scriptName = $_SERVER["PHP_SELF"];
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
	if(!isset($_GET["q9team1"]) && !isset($_GET["q9team2"])){
	  $optionq = "SELECT country FROM historical";
	  $optionResult = mysqli_query($db, $optionq);
	  #print_r($optionResult);
	  $numRow = mysqli_num_rows($optionResult);
	  #print_r($numRow);
	  echo "Team1:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q9team1">';
		while ($optionRow = mysqli_fetch_array($optionResult, MYSQLI_ASSOC)) {
		  foreach($optionRow as $key => $value):
			echo "<option value='" . $value . "'>" . $value . "</option>";
		  endforeach;
		}
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit" value = "next">';
	  echo '</form>';
	}elseif(isset($_GET["q9team1"]) && !isset($_GET["q9team2"])){
	  $optionq2 = sprintf("SELECT team2 FROM game WHERE team1 LIKE '%s' UNION SELECT team1 FROM game WHERE team2 LIKE '%s' ORDER BY team2", $_GET["q9team1"],  $_GET["q9team1"]);
	  $optionResult2 = mysqli_query($db, $optionq2);
	  #print_r($optionResult);
	  $numRow2 = mysqli_num_rows($optionResult2);
	  #print_r($numRow);
	  print_r("Team1 selected is <br>");
	  echo '<strong>'.$_GET["q9team1"].'</strong>';
	  print_r("<br>");
	  echo "Team2:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q9team2">';
		while ($optionRow2 = mysqli_fetch_array($optionResult2, MYSQLI_ASSOC)) {
		  foreach($optionRow2 as $key => $value):
			echo "<option value='" . $value . "'>" . $value . "</option>";
		  endforeach;
		}
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit" value = "submit">';
	  echo '</form>';
	  $_SESSION["q9team1"] = $_GET["q9team1"];
	}else{
	  print_r("Team1 selected is <br>");
	  echo '<strong>'.$_SESSION["q9team1"].'</strong>';
	  print_r("<br>");
	  print_r("Team2 selected is <br>");
	  echo '<strong>'.$_GET["q9team2"].'</strong>';
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<input type = "submit" value = "Select Again" name = "q9again">';
	  echo '</form>';
	}
	?>
  </div>
  
  <div class = "content" style = "margin-left:17%">
	<br><br><br>
	<?php
	  if(isset($_SESSION["q9team1"]) && isset($_GET["q9team2"])){
		$query1 = sprintf("SELECT * FROM game WHERE (team1 LIKE '%s' AND team2 LIKE '%s') OR (team2 LIKE '%s' AND team1 LIKE '%s')", $_SESSION["q9team1"], $_GET["q9team2"], $_SESSION["q9team1"], $_GET["q9team2"]);
		$query1r = mysqli_query($db, $query1);
		#print_r($query1r);
		if($query1r){
		  print_r("Game results:");
		  #echo '<strong>'.$_SESSION["q9team1"].'</strong>';
		  #print_r(" and ");
		  #echo '<strong>'.$_GET["q9team2"].'</strong>:<br>';
		  echo "<table cellspacing='10' align = 'center'>";
		  echo "<tr>";
			echo '<td>Date</td>';
			echo '<td>Team1 vs. Team2</td>';
			echo '<td>Score</td>';
			echo '<td>Penalty</td>';
		  echo "</tr>";
		  while($query1Row = mysqli_fetch_array($query1r, MYSQLI_ASSOC)){
			echo '<tr>';
		      echo '<td>'.$query1Row["year"].'.'.$query1Row["month"].'.'.$query1Row["day"].'</td>';
			  echo '<td>'.$query1Row["team1"].' vs. '.$query1Row["team2"].'</td>';
			  echo '<td>'.$query1Row["team1score"].' - '.$query1Row["team2score"].'</td>';
			  if($query1Row["team1pen"] == '' || $query1Row["team2pen"] == ''){
				echo '<td>'.''.'</td>';
			  }else{
				echo '<td>'.'('.$query1Row["team1pen"].' - '.$query1Row["team2pen"].')'.'</td>';
			  }
			echo '</tr>';
		  }
		  echo "</table>";
		}
		$query2 = sprintf("SELECT appearance, gf, ga, pts FROM historical WHERE country LIKE '%s'", $_SESSION["q9team1"]);
		$query2r = mysqli_query($db, $query2);
		$query3 = sprintf("SELECT appearance, gf, ga, pts FROM historical WHERE country LIKE '%s'", $_GET["q9team2"]);
		$query3r = mysqli_query($db, $query3);
		if($query2r && $query3r){
		  $query2Row = mysqli_fetch_array($query2r, MYSQLI_ASSOC);
		  $query3Row = mysqli_fetch_array($query3r, MYSQLI_ASSOC);
		  print_r("<br>World Cup statistics comparison:");
		  #echo '<strong>'.$_SESSION["q9team1"].'</strong>';
		  #print_r(" and ");
		  #echo '<strong>'.$_GET["q9team2"].'</strong>:<br>';
		  echo "<table cellspacing='10' align = 'center'>";
			echo "<tr>";
			echo '<td></td>';
			echo '<td>Team</td>';
			echo '<td>Appearance</td>';
			echo '<td>Total Goal For</td>';
			echo '<td>Total Goal Against</td>';
			echo '<td>Total Point</td>';
		  echo "</tr>";
		  echo "<tr>";
			$query21 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $_SESSION["q9team1"]);
			$query21r = mysqli_query($db, $query21);
			#print_r($query21r);
			$query21Row = mysqli_fetch_array($query21r, MYSQLI_ASSOC);
			echo "<td><image src = '". $query21Row['flagurl']."'></td>";
			echo '<td>'.$_SESSION["q9team1"].'</td>';
			echo '<td>'.$query2Row["appearance"].'</td>';
			echo '<td>'.$query2Row["gf"].'</td>';
			echo '<td>'.$query2Row["ga"].'</td>';
			echo '<td>'.$query2Row["pts"].'</td>';
		  echo "</tr>";
		  echo "<tr>";
			$query31 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $_GET["q9team2"]);
			$query31r = mysqli_query($db, $query31);
			#print_r($query21r);
			$query31Row = mysqli_fetch_array($query31r, MYSQLI_ASSOC);
			echo "<td><image src = '". $query31Row['flagurl']."'></td>";
			echo '<td>'.$_GET["q9team2"].'</td>';
			echo '<td>'.$query3Row["appearance"].'</td>';
			echo '<td>'.$query3Row["gf"].'</td>';
			echo '<td>'.$query3Row["ga"].'</td>';
			echo '<td>'.$query3Row["pts"].'</td>';
		  echo "</tr>";
		  echo "</table>";
		  
		  echo $_SESSION["q9team1"].' vs. '.$_GET["q9team2"].':';
		  $title = $_SESSION["q9team1"].' vs. '.$_GET["q9team2"];
		  
		  $query3 = sprintf('SELECT year, rank FROM team WHERE team LIKE "%s"', $_SESSION["q9team1"]);
		  $query3r = mysqli_query($db, $query3);
		  $team1 = '[';
		  while ($query3Row = mysqli_fetch_array($query3r, MYSQLI_ASSOC)) {
			#print_r($query3Row);
			if($query3Row["year"] < 1940){
			  $i = 0.25 * $query3Row["year"] - 481.5;
			  $j = $query3Row["rank"];
			  #print_r($i);
			  #print_r($j);
			  $ij = '['.$i.','.$j.'],';
			  #print_r($ij);
			}else{
			  $i = 0.25 * $query3Row["year"] - 483.5;
			  $j = $query3Row["rank"];
			  #print_r($i);
			  #print_r($j);
			  $ij = '['.$i.','.$j.'],';
			  #print_r($ij);
			}
			$team1 = $team1.$ij;
		  }
		  $team1rank = substr($team1, 0, -1);
		  $team1rank = $team1rank.']';
		  #echo $team1rank;
		  
		  
		  $query4 = sprintf('SELECT year, rank FROM team WHERE team LIKE "%s"', $_GET["q9team2"]);
		  $query4r = mysqli_query($db, $query4);
		  $team2 = '[';
		  while ($query4Row = mysqli_fetch_array($query4r, MYSQLI_ASSOC)) {
			#print_r($query3Row);
			if($query4Row["year"] < 1940){
			  $i = 0.25 * $query4Row["year"] - 481.5;
			  $j = $query4Row["rank"];
			  #print_r($i);
			  #print_r($j);
			  $ij = '['.$i.','.$j.'],';
			  #print_r($ij);
			}else{
			  $i = 0.25 * $query4Row["year"] - 483.5;
			  $j = $query4Row["rank"];
			  #print_r($i);
			  #print_r($j);
			  $ij = '['.$i.','.$j.'],';
			  #print_r($ij);
			}
			$team2 = $team2.$ij;
		  }
		  $team2rank = substr($team2, 0, -1);
		  $team2rank = $team2rank.']';
		  #echo $team2rank;
		  
		  $chart =<<< EOBODY
		  <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'scatter',
            zoomType: 'xy'
        },
		title:{
			text:'',
		},
        subtitle: {
            
        },
        xAxis: {
            categories: ['1926','1930', '1934', '1938', '1950', '1954', '1958', '1962', '1966', '1970', '1974', '1978', '1982', '1986', '1990', '1994', '1998', '2002', '2006', '2010', '2014']
        },
        yAxis: {
			reversed: true,
			min: 1,
			max: 32,
            title: {
                text: 'Rank'
            }
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 6,
                },
                dataLabels: {
                    enabled: true,
					style: {
                        fontSize: '14px'
                    },
                },
            }
        },
		tooltip: {
			enabled: true,
			formatter: function () {
                return this.y;
            }
		},
        series: [{
            name: '{$_SESSION["q9team1"]}',
			color: 'red',
            data: {$team1rank}
        }, {
            name: '{$_GET['q9team2']}',
			color: 'blue',
            data: {$team2rank}
        }]
    });
});
		</script>
		
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="max-width: 800px; height: 350px; margin: 0 auto"></div>
EOBODY;
		echo $chart;
		}
	  }else{
		print_r("Please select team1 and team2.");
	  }
	  
	  if(isset($_GET["q9again"])){
		unset($_SESSION["q9team1"]);
	  }
	?>
  </div>
  
  		

</body>
</html> 
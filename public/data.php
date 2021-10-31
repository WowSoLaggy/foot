<?php

include_once('classes.php');


// Connects to the DB
function connect()
{
	// Please specify the following vars in the 'security.php' file:
	//$dbHost = 'my.host.com';
	//$dbName = 'db_name';
	//$dbUser = 'db_user';
	//$dbPass = 'db_pass';
	include('./../config/security.php');

	if (!isset($dbHost) || !isset($dbUser) || !isset($dbPass) || !isset($dbName))
		throw new Exception('Cannot connect to DB: Please check the connection settings in the "security.php" file');
	
	$link = mysqli_connect($dbHost, $dbUser, $dbPass);
	mysqli_select_db($link, $dbName) or die('Error'. mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8;");
	
	return $link;
}

// Disconnects from the DB
function disconnect($connection)
{
	mysqli_close($connection);
}

// Self-written (honestly copied from web) function
// that replaces 'mysql_result'
function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}


// Returns array of all players
function getPlayers($connection)
{
	$players = array();
	
	$result = mysqli_query($connection, "SELECT * FROM players_tbl");
	$num_players = mysqli_num_rows($result);
	for ($i = 0; $i < $num_players; $i++)
	{
		$player = new Player();
		
		$player->id = mysqli_result($result, $i, 'id');
		$player->name = mysqli_result($result, $i, 'name');
		$player->image = mysqli_result($result, $i, 'image');
    $player->squad = mysqli_result($result, $i, 'squad');
    
    $player->skills['GK'] = mysqli_result($result, $i, 'GK');
    $player->skills['DEF'] = mysqli_result($result, $i, 'DEF');
    $player->skills['BALL'] = mysqli_result($result, $i, 'BALL');
    $player->skills['PASS'] = mysqli_result($result, $i, 'PASS');
    $player->skills['ATT'] = mysqli_result($result, $i, 'ATT');
    $player->skills['SHOT'] = mysqli_result($result, $i, 'SHOT');
    $player->skills['PHYS'] = mysqli_result($result, $i, 'PHYS');
    
    $sum = 0;
    foreach ($player->skills as &$value)
      $sum += $value;
    $player->ovr = round($sum / count($player->skills));
		
		array_push($players, $player);
	}
	mysqli_free_result($result);
	
	return $players;
}

function getPitches($connection)
{
  $pitches = array();

  $result = mysqli_query($connection, "SELECT id, name, image FROM pitches_tbl");
	$num_pitches = mysqli_num_rows($result);
	for ($i = 0; $i < $num_pitches; $i++)
	{
		$pitch = new Pitch();
		
		$pitch->id = mysqli_result($result, $i, 'id');
		$pitch->name = mysqli_result($result, $i, 'name');
		$pitch->image = mysqli_result($result, $i, 'image');
		
		array_push($pitches, $pitch);
	}
	mysqli_free_result($result);
	
	return $pitches;
}


function get_data()
{
  $connection = connect();

  $stats = new Stats();
  $stats->players = getPlayers($connection);
  $stats->pitches = getPitches($connection);
  
  disconnect($connection);
  
  return $stats;
}

?>

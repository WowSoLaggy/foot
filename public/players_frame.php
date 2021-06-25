<?php

include_once('data.php');

function get_players_frame()
{
  $players = get_data();
  $num_players = count($players);
  
  for ($player_ind = 0; $player_ind < $num_players; $player_ind++)
    $str .= '1';
  
  return $str;
}

?>

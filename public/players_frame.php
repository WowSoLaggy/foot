<?php

include_once('data.php');

function get_players_frame()
{
  $stats = get_data();
  $players = &$stats->players;
  $num_players = count($players);
  
  $str .= '<table class="dark">';

  for ($player_ind = 0; $player_ind < $num_players; $player_ind++)
  {
    $str .= '<tr><td>';
    $str .= '<img class="avatar" src="images/'.$players[$player_ind]->image.'"/>';
    $str .= '&nbsp;'.$players[$player_ind]->name;
    $str .= '</td></tr>';
    
    if ($player_ind != $num_players - 1)
      $str .= '<tr class="offset"></tr>';
  }

  $str .= '</table>';
  
  return $str;
}

?>

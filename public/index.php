<?php

include_once('data.phh');
include_once('pages.php');

$stats = get_data();
$players = $stats->players;
$num_players = count($players);

function nameSorter($a, $b)
{
	return strcmp($a->name, $b->name);
}
usort($players, "nameSorter");

$str = "";

$str .= '<table border=0>';
$str .= '<tr><td style="text-align: center"><font size=+4>Dream Team Squad</font></td></tr>';

$str .= '<tr>';
$str .= '<td style="text-align: center"><img src="images/squad.png" style="transform: translate(0px, 0px)"/></td>';
$str .= '<td style="vertical-align: top"><table border=1>';

$str .=
  '<tr><td></td>';
  
foreach ($players[0]->skills as $key => $value)
  $str .= '<td width=45 style="text-align: center">'.$key.'</td>';
$str .= '<td width=60 style="text-align: center">OVR</td>';
  
$str .= '</tr>';

function renderStat(&$str, $val, $bold)
{
  $color = '#ffffff';
  if ($val < 20)
    $color = '#FB6962';
  else if ($val < 40)
    $color = '#FFDA3E';
  else if ($val < 60)
    $color = '#FCFC99';
  else if ($val < 80)
    $color = '#79DE79';
  else
    $color = '#0CC078';
  
  $font = 'normal';
  if ($bold)
    $font = 'bold';
  
  $str .=
    '<td style="font-weight:'.$font.
    '; text-align: center; background-color:'.$color.'">'.$val.'</td>';
}

for ($player_ind = 0; $player_ind < $num_players; $player_ind++)
{
  $player = $players[$player_ind];
  if ($player->squad != 1)
    continue;
  
  $str .= '<tr><td>'.$player->name.'</td>';
  foreach ($player->skills as $key => $val)
    renderStat($str, $val, false);
  renderStat($str, $player->ovr, true);
  $str .= '</tr>';
}

$str .= '</table></td></tr></table>';

echo($str);

?>

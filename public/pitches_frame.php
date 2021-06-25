<?php

include_once('data.php');

function get_pitches_frame()
{
  $stats = get_data();
  $pitches = &$stats->pitches;
  $num_pitches = count($pitches);
  
  $str .= '<table class="dark">';

  for ($pitch_ind = 0; $pitch_ind < $num_pitches; $pitch_ind++)
  {
    $str .= '<tr><td>';
    $str .= '<img class="avatar" src="images/'.$pitches[$pitch_ind]->image.'"/>';
    $str .= '&nbsp;'.$pitches[$pitch_ind]->name;
    $str .= '</td></tr>';
    
    if ($pitch_ind != $num_pitches - 1)
      $str .= '<tr class="offset"></tr>';
  }

  $str .= '</table>';
  
  return $str;
}

?>

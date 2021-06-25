<?php

function get_games_frame()
{
  $str .= '
    <table class="dark">
      <tr>
        <td>
          Сыграно игр: 12
        </td>
      </tr>
      <tr>
        <td>
          Последняя игра: да вот недавно...
        </td>
      </tr>
    </table>
  ';
  
  return $str;
}

?>

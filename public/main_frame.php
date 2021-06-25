<?php

function get_main_frame()
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
          Участвовало игроков: 14
        </td>
      </tr>
    </table>
  ';
  
  return $str;
}

?>

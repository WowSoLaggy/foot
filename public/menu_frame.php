<?php

function get_menu_frame()
{
  $gap = 10;
  
  $str .= '
    <table class="menu">
      <tr>
        <td class="menu">
          <a href=".">
            <img class="menu" src="images/ball.png">Главная
          </a>
        </td>
        <td class="menu">
          <a href="players.php"><img class="menu" src="images/players.png">Игроки</a>
        </td>
        <td class="menu">
          <a href="games.php"><img class="menu" src="images/games.png">Игры</a>
        </td>
        <td class="menu">
          <a href="pitches.php"><img class="menu" src="images/pitches.png">Поля</a>
        </td>
      </tr>
    </table>
  ';
  
  return $str;
}

?>

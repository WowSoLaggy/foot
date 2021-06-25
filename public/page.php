<?php

function get_frame($str1, $str2)
{
  $str .= '
    <br><br><br><br>
    <table>
      <tr>
        <td>
          '.$str1.'
        </td>
      </tr>
      <tr>
        <td>
          '.$str2.'
        </td>
      </tr>
    </table>
  ';
  
  return $str;
}

function draw_page($content)
{
  include_once('pages.php');

  $str .= get_head();

  $str .= get_header();
  $str .= get_frame(get_menu_frame(), $content);

  echo($str);
}

?>

<?php

function get_head()
{
  $str = '
    <head>
      <title>Футбол - уже не карантин</title>
      <meta charset="utf-8"/>
      <link rel="icon" href="favicon.ico" type="image/ico"/>
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
      <link rel="stylesheet" type="text/css" href="style.css">
      <script src="./libs/Chart.js"></script>
    </head>
    ';
  
  return $str;
}

?>
<?php

class Player
{
  public $id = 0;
	public $name = "";
	public $image = "";
  public $squad = 1;
  public $ovr = 0;
  
  public $skills = [];
}

class Pitch
{
  public $id = 0;
  public $name = "";
  public $image = "";
}

class Stats
{
  public $players;
  public $pitches;
}

?>

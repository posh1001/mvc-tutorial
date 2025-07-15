<?php

class Home
{

  use controller;

  public function index()
  {
    $user = new User;

    $this->views('home');
  }
}

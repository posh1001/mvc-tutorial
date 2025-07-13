<?php

class Home extends Controller
{

  public function index()
  {
    $model = new Model;
    $arr ['full_name'] = 'French Nolan';
    $arr ['age'] = '20';
    $result = $model->update(2,  $arr);

    print_r($result);

     $this->views('home');
  }
}

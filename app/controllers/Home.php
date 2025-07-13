<?php

class Home extends Controller
{

  public function index()
  {
    $model = new Model;
    $arr['id'] = 1;
    $arr['full_name'] = "paul orife";
    $arr2['full_name'] = "trust";
    $result = $model->where($arr, $arr2);

    print_r($result);

     $this->views('home');
  }
}

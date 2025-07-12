<?php

class Model extends Database
{

    function test()
    {

        $query = "Select * from users";
        $result =  $this->query($query);
        print_r($result);
    }
}

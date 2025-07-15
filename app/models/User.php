<?php

class User
{

    use Model;

    protected $table = 'users';

    protected $allowedColumns = [

        'name',
        'age',
    ];

    public function validate($data)
    {

        $this->errors = [];

        if (empty($this->errors)) {

            return true;
        }

        return false;
    }
}

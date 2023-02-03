<?php

namespace Model;

use Kernel\Model;

class User extends Model
{

    public function __construct()
    {
        parent::__construct('user');

        $this->id = 'user_id';

        $this->columns = [
            'username' => 'username',
            'password' => 'password',
        ];
    }
}

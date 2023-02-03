<?php

namespace Model;

use Kernel\Model;

class Book extends Model
{
    public function __construct()
    {
        parent::__construct('book');

        $this->id = 'book_id';

        $this->columns = [
            'book_name' => 'book_name',
            'category' => 'category',
            'author' => 'author',
            'year_of_publication' => 'year_of_publication',
        ];
    }
}

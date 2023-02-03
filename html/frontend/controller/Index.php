<?php

namespace Frontend\Controller;

use Model\Book;

class Index extends Base
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $book = new Book;

            $this->view->books = $book->selectAll();

            $this->view->render('index/index');
        } else {
            $this->view->msgError = '* Vui lòng đăng nhập';
            $this->view->render('auth/login');
        }
    }

    /**
     * - Show book add form
     * - Add a new book
     */
    public function addBook()
    {
        if (isset($_POST['submit'])) {
            try {
                $book = new Book;
                $book->load($_POST['Book']);

                $book->insert();

                header('Location:' . app()->baseUrl . '/');
                exit();
            } catch (\Exception $e) {
                echo  $e;
            }
        }

        $this->view->render('index/bookForm');
    }

    /**
     * - Show the book that needs to be edited
     * - Update the book
     */
    public function updateBook($params)
    {
        $book = new Book;

        if (isset($_POST['submit'])) {
            try {
                $book->load($_POST['Book']);
                $book->updateById($params[0]);

                header('Location:' . app()->baseUrl . '/');
                exit();
            } catch (\Exception $e) {
                echo  $e;
            }
        }

        $this->view->book = $book->selectById($params[0]);

        $this->view->render('index/bookForm');
    }

    /**
     * - Delete a book
     */
    public function deleteBook($params)
    {
        try {
            $book = new Book;

            $book->deleteById($params[0]);

            header('Location: ' . app()->baseUrl);
            exit();
        } catch (\Exception $e) {
            echo $e;
        }
    }
}

<?php


namespace App\Http\Repository;


use App\Models\Book;
use function GuzzleHttp\Promise\all;

class BookRepository
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }


    public function getAllBooks()
    {
        return $this->book->all();
    }

    public function getSingleBook($table_field, $query)
    {
        return $this->book->where($table_field, $query)->get();
    }

    public  function updateUser($request)
    {
        $this->book->name = $request->name;
        $this->book->isbn = $request->isbn;
        $this->book->authors = @$request->authors;
        $this->book->country = @$request->country;
        $this->book->number_of_pages = @$request->number_of_pages;
        $this->book->publisher = @$request->publisher;
        $this->book->release_date = @$request->release_date;
        $this->book->save();
        return $this->book;
    }

}
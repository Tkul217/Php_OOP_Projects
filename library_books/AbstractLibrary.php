<?php

class AbstractLibrary
{
    /**
     * @var Author[]
     */
    protected $authors = [];

    public function addAuthorInstance(Author $author)
    {
        $this->authors[] = $author;
    }

    public function findAuthor($authorName)
    {
        foreach ($this->authors as $author){
            if ($author->getName() === $authorName){
                return $author;
            }
        }
        return null;
    }

    /**
     * @return \Author[]
     */

    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param \Author[] $authors
     */

    public function setAuthors(array $authors): void
    {
        $this->authors = $authors;
    }

    /**
     * Method accepts the name of the author, creates instance of the Author class,
     * adds the instance in $author array and returns created instance
     * @param string $authorName
     * @return Author
     */

    abstract public function addAuthor(string $authorName): Author;

    /**
     * Method accepts author name and Book.
     * Finds author in $authors array and adds book to this array.
     * The method must set $book's $author property with the found author also.
     * This method is equivalent of Author::addBook
     * @param $authorName
     * @param Book $book
     */
    abstract public function addBookForAuthor($authorName, Book $book);

    /**
     * Method returns books for given author
     *
     * @param $authorName
     */

    abstract public function getBooksForAuthor($authorName);

    /**
     * Method searches for book and returns instance of Book
     *
     * @param string $bookName
     * @return Book
     */

    abstract public function search(string $bookName): ?Book;

    /**
     * THis method must print every authpr and for each author all its books in the folowwing format
     *
     * AuthorName
     *
     * ------------------------
     *
     * BookName     -   price
     * Book2name    -   price
     * ...
     *
     * AnotherAuthorName
     *
     * ------------------------
     *
     * AnotherBookName
     *
     * -------------------------
     *
     * AnotherBookName  -   price
     * ....
     */

    abstract public function print();
}
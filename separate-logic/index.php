<?php

$bookList = [
    [
        'name' => 'Do Androids Dream of Electric Sheep',
        'author' => 'Philip K. Dick',
        'purchaseUrl' => 'https://example.com',
        'releaseYear' => 1968
    ],
    [
        'name' => 'Hail Mary',
        'author' => 'Andy Weir',
        'purchaseUrl' => 'https://example.com',
        'releaseYear' => 1985
    ],
    [
        'name' => 'PHP: The Right Way',
        'author' => 'Josh Lockhart',
        'purchaseUrl' => 'https://example.com',
        'releaseYear' => 2010
    ],
    [
        'name' => 'The Martian',
        'author' => 'Andy Weir',
        'purchaseUrl' => 'https://example.com',
        'releaseYear' => 2011
    ]
];

// array_filter() do the same;
$filteredBooks = array_filter(
    $bookList,
    function ($book) {
        return $book['releaseYear'] >= 2000 && $book['author'] === 'Andy Weir';
    }
);

require "index.view.php";
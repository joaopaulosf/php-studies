<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>

<body>
<h1>Recommended Books</h1>

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

function filterByAuthor(array $bookList, string $author): array
{
    $filteredBookList = [];
    foreach ($bookList as $book) {
        if ($book['author'] === $author) {
            $filteredBookList[] = $book;
        }
    }

    return $filteredBookList;
}

?>

<ul>
    <?php
    foreach (filterByAuthor($bookList, 'Andy Weir') as $book): ?>
        <li>
            <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
        </li>
    <?php
    endforeach; ?>
</ul>
</body>

</html>
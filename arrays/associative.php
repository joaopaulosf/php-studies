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
        'purchaseUrl' => 'https://example.com'
    ],
    [
        'name' => 'Hail Mary',
        'author' => 'Andy Weir',
        'purchaseUrl' => 'https://example.com'
    ],
    [
        'name' => 'PHP: The Right Way',
        'author' => 'Josh Lockhart',
        'purchaseUrl' => 'https://example.com'
    ],
];
?>

<ul>
    <?php
    foreach ($bookList as $book): ?>
        <li>
            <a href="<?= $book['purchaseUrl'] ?>">
                <?= $book['name'] ?>
            </a>
        </li>
    <?php
    endforeach; ?>
</ul>
</body>

</html>
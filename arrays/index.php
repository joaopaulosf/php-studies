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
    'Do Androids Dream of Electric Sheep',
    'The Langoliers',
    'Hail Mary',
    'PHP: The Right Way'
];
?>

<ul>
    <?php
    foreach ($bookList as $book): ?>
        <li><?= $book; ?></li>
    <?php
    endforeach; ?>

    <!-- or -->

    <?php
    foreach ($bookList as $book1) {
        echo "<li>$book1</li>";
    }

    ?>
</ul>

<h1>
    <?= $bookList[0]; ?>;
</h1>
</body>

</html>
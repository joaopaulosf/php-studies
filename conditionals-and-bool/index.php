<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>

<body>

<?php
$name = 'Dark Matter';
$read = true;

if ($read) {
    $message = 'You have read ' . $name;
} else {
    $message = 'You have NOT read ' . $name;
}
?>
<h1>
    <!-- echo shortcut -->
    <?= $message; ?>'.
</h1>

</body>

</html>
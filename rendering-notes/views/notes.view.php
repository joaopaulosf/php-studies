<?php
require 'partials/head.php' ?>
<body class="h-full">
<div class="min-h-full">
    <?php
    require 'partials/nav.php' ?>
    <?php
    require 'partials/banner.php' ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id= <?= $note['id'] ?>"
                       class="text-blue-500 hover:underline"><?= $note['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </div>
    </main>
</div>

</body>
</html>
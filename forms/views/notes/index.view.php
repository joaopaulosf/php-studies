<?php
require 'views/partials/head.php' ?>
<body class="h-full">
<div class="min-h-full">
    <?php
    require 'views/partials/nav.php' ?>
    <?php
    require 'views/partials/banner.php' ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <ul>
                <?php foreach ($notes as $note) : ?>
                    <li>
                        <a href="/note?id=<?= $note['id'] ?>"
                           class="text-blue-500 hover:underline"><?= $note['title'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="mt-6">
                <a class="text-blue-500 hover:underline" href="/notes/create">New note</a>
            </div>
        </div>
    </main>
</div>

</body>
</html>
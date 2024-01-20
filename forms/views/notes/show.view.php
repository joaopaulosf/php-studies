<?php
require base_path('views/partials/head.php') ?>
<body class="h-full">
<div class="min-h-full">
    <?php
    require base_path('views/partials/nav.php') ?>
    <?php
    require base_path('views/partials/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <a class="text-blue-500 hover:underline" href="/notes">back</a>
            <h2 class="text-lg font-medium"><?= $note['title'] ?></h2>
            <p class="text-base py-3"><?= $note['body'] ?></p>
            <p class="text-xs font-bold "><?= $note['created_at'] ?></p>
            <form class="mt-6" method="POST">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500" type="submit">Delete</button>
            </form>
        </div>
    </main>
</div>

</body>
</html>


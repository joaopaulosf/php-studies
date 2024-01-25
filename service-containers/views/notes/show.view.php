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
            <h2 class="text-lg font-medium"><?= htmlspecialchars($note['title']) ?></h2>
            <p class="text-base py-3"><?= htmlspecialchars($note['body']) ?></p>
            <p class="text-xs font-bold "><?= $note['created_at'] ?></p>
            <div class="flex items-center mt-6 gap-3">
                <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                        hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                        focus-visible:outline-indigo-600" href="note/edit?id=<?= $note['id'] ?>">Edit</a>
                <form method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                        hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                        focus-visible:outline-red-600" type="submit">Delete
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>

</body>
</html>


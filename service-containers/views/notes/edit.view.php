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
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="title"
                                       class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                <div class="mt-2">
                                    <input type="text" placeholder="Text here..." id="title" name="title"
                                           value="<?= $note['title'] ?>"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1
                                           ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                           focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <?php if ($errors['title']): ?>
                                    <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['title'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="col-span-full">
                                <label for="body"
                                       class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea placeholder="Text here..." id="body" name="body" rows="3"
                                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1
                                    ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                    focus:ring-indigo-600 sm:text-sm
                                    sm:leading-6"><?= $note['body'] ?></textarea>
                                </div>
                                <?php if ($errors['body']) : ?>
                                    <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['body'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                        hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                        focus-visible:outline-gray-600" href="/notes">Cancel</a>

                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                        hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                        focus-visible:outline-indigo-600">
                            Update
                        </button>
                    </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>

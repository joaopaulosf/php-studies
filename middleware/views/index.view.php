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
            <p>Hello, <?= $_SESSION['user']['username'] ?? 'Guest' ?> Welcome to the home page.</p>
        </div>
    </main>
</div>
</body>
</html>
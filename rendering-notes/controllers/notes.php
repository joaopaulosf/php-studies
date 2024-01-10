<?php

$heading = 'Notes';
$config = require 'config.php';

$db = new Database($config);

$notes = $db->query('SELECT id, title FROM NOTES')->fetchAll();

require "views/notes.view.php";

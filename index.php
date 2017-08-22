<?php

include ('config.php');
include ('libs/Quest.php');

try {

    $quest = new Quest();
    $exception = '';
    $result = [];

    if (!empty($_POST['curl'])) {
        $queststr = $quest->handler();
        $quest->serch($queststr);
        $result = $quest->analysis();
    }
} catch (Exception $e) {
    $exception = $e->getMessage();
}

include ('templates/index.php');

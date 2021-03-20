<?php

use App\Store\UserStore;

require_once (__DIR__.'/vendor/autoload.php');

$store = new UserStore();
try {
    $store->addUser('jek terin', 'jek@derin.ru', '123456');
    $store->notifyPasswordFailure('jek@derin.ru');

    $user = $store->getUser('jek@derin.ru');
    print_r($user);
} catch (Exception $e) {
    echo $e->getMessage();
}

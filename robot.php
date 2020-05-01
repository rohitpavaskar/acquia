<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require __DIR__ . '/vendor/autoload.php';

$app = new Symfony\Component\Console\Application('Acquia');

$app->add(new Acquia\Commands\Clean());

$app->run();




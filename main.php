<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/DBConnect.php';
require __DIR__ . '/ContactManager.php';
require __DIR__ . '/Command.php';

const MYSQL_SERVER = 'localhost';
const MYSQL_DB = 'oc_php_p5';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';

while (true) {
    $line = readline("Entrez votre commande : ");
    switch (trim($line)) {
        case 'list':
            Command::list();
            break;
    }
}
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
    $line = trim(readline("Entrez votre commande : "));
    $parts = explode(' ', $line, 2);
    $cmd = $parts[0];
    switch ($cmd) {
        case 'help':
            echo "Voici la liste des commandes disponibles :\n";
            echo "  help : affiche cette aide\n";
            echo "  list : liste tous les contacts\n";
            echo "  detail <id> : affiche les informations d'un contact\n";
            echo "  create <nom>,<email>,<numéro_de_téléphone> : ajoute un contact\n";
            echo "  modify <id>,<nom>,<email>,<numéro_de_téléphone> : modifie un contact\n";
            echo "  delete <id> : supprime un contact\n";
            break;

        case 'list':
            Command::list();
            break;

        case 'detail':
            Command::detail((int) ($parts[1] ?? 0));
            break;

        case 'create':
            $parts = explode(',', $parts[1]);
            Command::create($parts[0] ?? '', $parts[1] ?? '', $parts[2] ?? '');
            break;

        case 'delete':
            Command::delete((int) ($parts[1] ?? 0));
            break;

        case 'modify':
            $parts = explode(',', $parts[1]);
            Command::update($parts[0], $parts[1] ?? '', $parts[2] ?? '', $parts[3] ?? '');
            break;
    }
}
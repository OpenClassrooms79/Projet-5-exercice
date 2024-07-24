<?php

class Command
{
    public static function list(): void
    {
        $list = ContactManager::findAll();
        foreach ($list as $contact) {
            echo $contact;
        }
    }

    public static function detail(int $id): void
    {
        echo ContactManager::findById($id);
    }

    public static function create(string $name, string $email, string $phone_number): void
    {
        if (ContactManager::create($name, $email, $phone_number)) {
            echo "Le contact a été créé\n";
        } else {
            echo "Le contact n'a pas pu être créé\n";
        }
    }

    public static function update(int $id, string $name, string $email, string $phone_number): void
    {
        if (ContactManager::update($id, $name, $email, $phone_number)) {
            printf("Le contact %d a été mis à jour\n", $id);
        } else {
            printf("Le contact %d n'a pas pu être mis à jour\n", $id);
        }
    }

    public static function delete(int $id): void
    {
        if (ContactManager::deleteById($id)) {
            printf("Le contact n°%d a bien été supprimé\n", $id);
        } else {
            echo "Aucun contact supprimé\n";
        }
    }
}
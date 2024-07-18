<?php

class Command
{
    public static function list()
    {
        $list = ContactManager::findAll();
        foreach ($list as $contact) {
            echo $contact;
        }
    }
}
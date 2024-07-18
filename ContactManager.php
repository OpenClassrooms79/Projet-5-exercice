<?php
require __DIR__ . '/Contact.php';

class ContactManager
{
    public static function findAll(): bool|array
    {
        $list = [];

        $mysql = DBConnect::getPDO(MYSQL_SERVER, MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        $res = $mysql->query('SELECT * FROM contact');
        while ($r = $res->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Contact($r['id'], $r['name'], $r['email'], $r['phone_number']);
        }
        return $list;
    }
}
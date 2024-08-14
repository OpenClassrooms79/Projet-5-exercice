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

    public static function findById(int $id): ?Contact
    {
        $mysql = DBConnect::getPDO(MYSQL_SERVER, MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        $stmt = $mysql->prepare('SELECT * FROM contact WHERE id = ?', [$id]);
        $stmt->execute([$id]);
        if ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Contact($r['id'], $r['name'], $r['email'], $r['phone_number']);
        }
        return null;
    }

    public static function deleteById(int $id): bool
    {
        $mysql = DBConnect::getPDO(MYSQL_SERVER, MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        $stmt = $mysql->prepare('DELETE FROM contact WHERE id = ?', [$id]);
        $stmt->execute([$id]);
        return $stmt->rowCount() !== 0;
    }

    public static function create(string $name, string $email, string $phone_number): bool
    {
        $mysql = DBConnect::getPDO(MYSQL_SERVER, MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        $stmt = $mysql->prepare('INSERT INTO contact (name, email, phone_number) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $phone_number]);
        return $stmt->rowCount() !== 0;
    }

    public static function update(int $id, string $name, string $email, string $phone_number): bool
    {
        $mysql = DBConnect::getPDO(MYSQL_SERVER, MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        $stmt = $mysql->prepare('UPDATE contact SET name = :name, email = :email, phone_number = :phone WHERE id = :id');
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone_number
        ]);
        return $stmt->rowCount() !== 0;
    }
}
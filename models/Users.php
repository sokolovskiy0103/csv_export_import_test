<?php

namespace Models;

use System\Database\Connection;

class Users
{
    public static function add($params)
    {
        $db = Connection::getInstance();
        $db->query("INSERT INTO users VALUES (:UID,:Name,:Age,:Email,:Phone,:Gender)", $params);
    }

    public static function edit($params)
    {
        $db = Connection::getInstance();
        $db->query("UPDATE users SET UID = :UID, Name = :Name, Age = :Age, Email = :Email,Phone = :Phone, Gender =:Gender
WHERE UID = :UID", $params);
    }

    public static function getByUid($uid)
    {
        $db = Connection::getInstance();
        return $db->selectOne("SELECT * FROM users WHERE UID=:uid", ['uid' => $uid]);
    }

    public static function getAll()
    {
        $db = Connection::getInstance();
        return $db->select("SELECT * FROM users");
    }

    public static function clear()
    {
        $db = Connection::getInstance();
        $db->query("DELETE FROM users");
    }

    public static function import($arr)
    {
        foreach ($arr as $row) {
            if (Users::getByUid($row['UID'])) {
                Users::edit($row);
            } else {
                Users::add($row);
            }
        }
    }

    public static function filter($filters)
    {
        $sql = "SELECT * FROM users WHERE 1=1";
        $params = [];
        foreach ($filters as $key => $filter) {
            if ($filter) {
                if ($key == 'Gender') {
                    $sql .= " AND $key = :$key";
                    $params[$key] = $filter;
                } else {
                    $sql .= " AND $key LIKE :$key";
                    $params[$key] = '%' . $filter . '%';
                }
            }
        }
        $db = Connection::getInstance();
        return $db->select($sql, $params);
    }
}

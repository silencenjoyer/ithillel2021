<?php

declare(strict_types=1);

class DB extends PDO
{
    private string $dbname = 'users_school';
    private string $user = 'se';
    private string $password = 'bingo';
    private string $host = '176.37.72.204';
    private string $driver = 'mysql';

    public function __construct()
    {
        $connect = $this->driver . ':host=' . $this->host . ';dbname=' . $this->dbname;
        parent::__construct($connect, $this->user, $this->password);
    }

    public function selectQuery()
    {
        $sql = "SELECT * FROM `tb_users`";
        $result = $this->query($sql);
        if ($result != false) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function insertUsers(string $users)
    {
        $this->beginTransaction();
        $sql = "INSERT INTO `tb_users` (`username`) VALUES $users";
        $result = $this->prepare($sql);
        $result->execute();
        $this->commit();
    }

    public function getMaxId(): int
    {
        $sql = "SELECT MAX(`id`) AS maxId FROM `tb_users`";
        $result = $this->query($sql);
        if ($result != false) {
            return (int) $result->fetch(PDO::FETCH_LAZY)->maxId;
        } else {
            return null;
        }
    }

    public function setToken(string $token)
    {
        $this->beginTransaction();
        $sql = "UPDATE `tb_users` SET `token` = $token WHERE";
        $result = $this->prepare($sql);
        var_dump($result);
        $result->execute();
        $this->commit();
    }

}

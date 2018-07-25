<?php
class dbEditor {
    private $connection = null;
    private $config;
    public function __construct() {
        $this->config = require_once ('config.php');
        $config = $this->config;
        $this->connection = mysqli_connect($config['dbhost'],$config['username'],$config['password']);
        if (!$this->connection) die('Error: ' . mysqli_error($this->connection));
        mysqli_query($this->connection, "USE `{$config['dbname']}`");
    }

    private function error() {
        echo 'Error: ' . mysqli_error($this->connection);
        return False;
    }

    public function insert($id, $text, $type = 'plain', $password = '') {
        $sql = null;
        if ($password == '' || $password == null) {
            $sql = "INSERT INTO `paste`(`id`, `text`, `type`) VALUES ({$id}, \"{$text}\", '{$type}')";
        } else $sql = "INSERT INTO `paste` VALUES ({$id}, \"{$text}\", '{$type}', '{$password}')";
        if (mysqli_query($this->connection, $sql)) return True;
        return $this->error();
    }

    public function query($sql) {
        if (mysqli_query($this->connection, $sql)) return True;
        return $this->error();
    }

    public function get_password($id) {
        $sql = "SELECT `password` FROM `paste` WHERE `id` = {$id}";
        $array = mysqli_fetch_array(mysqli_query($this->connection, $sql));
        return $array['password'];
    }

    public function get_array($id) {
        $sql = "SELECT `text`, `type` FROM `paste` WHERE `id` = {$id}";
        return mysqli_fetch_array(mysqli_query($this->connection, $sql));
    }

    public function get_id() {
        $array = mysqli_fetch_array(mysqli_query($this->connection, "SELECT * FROM `id`"));
        return $array['id'];
    }

    public function inc_id() {
        mysqli_query($this->connection, "UPDATE `id` set `id` = `id` + 1");
    }

    public function exists($id) {
        $array = mysqli_fetch_array(mysqli_query($this->connection, "SELECT `id` FROM `paste` WHERE `id` = {$id}"));
        return $array != null;
    }
}
?>
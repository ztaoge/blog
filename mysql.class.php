<?php
//namespace ;
//use ;
class mysql {
    private $_dbh;
    //单一实例
    private $_instance = null;

    //私有构造函数
    private function __construct() {
        try {
            $this->_dbh = new PDO($conf['dsn'], $conf['user'], $conf['passwd']);
        } catch (PDOException $e) {
            echo 'Connection failed' . $e->getMessage();
        }
    }

    //外部调用静态实例方法
    public static function getInstance() {
        if (self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_isntance;
    }

    //重写克隆方法，防止用户克隆实例
    public function __clone() {
        die('克隆不被允许');
    }

    //数据查询方法
    public function select($table, $condition = []) {

    }

    public function insert($value = [], $table) {
        foreach ($value as $field => $value) {

        }
        $stmt = self::$_dbh->prepare("INSERT INTO {$table} () VALUES ()");
        if ($stmt->execute()) {
            return true;
        } else return false;
    }

    public function delete($table, $field = []) {}

    public function update($table, $values = []) {
        $stmt = self::$_bdh->prepare("UPDATE {$table} SET");
    }

    //使用原生SQL语句
    public function query($sql = '') {
        return
	}

    //调试
    public function getDb() {
        return self::$_dbh;
    }
}

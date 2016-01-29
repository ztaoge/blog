<?php

class mysql {
    private $_dbh;
    //单一实例
    private static $_instance = null;
    //私有构造函数
    private function __construct() {
        try {
            $this->_dbh = new PDO(DSN, USER, PASSWD);
        } catch (PDOException $e) {
            echo 'Connection failed' . $e->getMessage();
        }
    }

    //外部调用静态实例方法
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //重写克隆方法，防止用户克隆实例
    public function __clone() {
        die('克隆不被允许');
    }

    //数据查询方法
    public function select($table, $conditions = []) {

        $sql = "SELECT * FROM `{$table}`";
        if ($conditions) {
            $sql .= ' WHERE ';
            foreach ($conditions as $key => $value) {
                $sql.= "`{$key}`" . '=' . ":{$key}" . ' AND ';
            }
            $sql = rtrim($sql, ' AND');
            $stmt = $this->_dbh->prepare($sql);
            foreach ($conditions as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
        } else {
            $stmt = $this->_dbh->prepare($sql);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //插入数据
    public function insert($table, $values = []) {
        $sql = "INSERT INTO `{$table}` (";
        $sql .= implode(array_keys($values), ',') . ") VALUES (:" . implode(array_keys($values), ",:") .")";
        $stmt = $this->_dbh->prepare($sql);
        foreach ($values as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($table, $field = []) {}

    public function update($table, $values = []) {
        $stmt = self::$_bdh->prepare("UPDATE {$table} SET");
    }

    //使用原生SQL语句
    public function query($sql = '') {
        return ;
	}

    //调试
    public function getDb() {
        return self::$_dbh;
    }
}

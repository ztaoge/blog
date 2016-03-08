<?php
class mysql
{
    private $_dbh;
    //单一实例
    private static $_instance = null;
    //私有构造函数
    private function __construct() {
        try {
            $this->_dbh = new PDO(DSN, USER, PASSWD);
        } catch (PDOException $e) {
            die('Connection failed : ' . $e->getMessage());
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

    //获取总的数据条数
    public function getRow() {

    }

    //数据查询方法
    public function select($table = '', $conditions = [], $limits = [], $orderBy = '', $sort = '') {
        if ($limits) {
            $limit = " LIMIT ". implode($limits, ',');
        } else {
            $limit = '';
        }
        if ($orderBy != '') {
            $orderBy = " ORDER BY `{$orderBy}`";
        } else {
            $orderBy = '';
        }
        $sql = "SELECT * FROM `{$table}`";
        if ($conditions) {
            $sql .= ' WHERE ';
            foreach ($conditions as $key => $value) {
                $sql.= "`{$key}`" . '=' . ":{$key}" . ' AND ';
            }
            $sql = rtrim($sql, ' AND') . $orderBy . ' ' . $sort . $limit;
            $stmt = $this->_dbh->prepare($sql);
            foreach ($conditions as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
        } else {
            $stmt = $this->_dbh->prepare($sql . $orderBy . ' ' . $sort . $limit);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //插入数据
    public function insert($table = '', $values = []) {
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

    //删除数据
    public function delete($table = '') {}

    //更新数据
    public function update($table = '', $values = [], $conditions = []) {
        $sql = "UPDATE `{$table}` SET ";
        foreach ($values as $key => $value) {
            $sql .= "`{$key}`" . '=' . ":{$key},";
        }
        $sql = rtrim($sql, ',');
        if ($conditions) {
            $sql .= ' WHERE ';
            foreach ($conditions as $key => $value) {
                $sql.= "`{$key}`" . '=' . ":{$key}" . ' AND ';
            }
            $sql = rtrim($sql, ' AND');
        }
        $stmt = $this->_dbh->prepare($sql);
        foreach ($values as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
        foreach ($conditions as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //使用原生SQL语句
    public function query($sql = '') {
        return ;
	}

    //调试
    public function getDb() {
        return self::$_dbh;
    }

    //获取当前数据库里的数据条数
    public function getNum($table = '', $conditions = []) {
    }
    //
    public function test() {

    }
}

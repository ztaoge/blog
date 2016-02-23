<?php
//require_once 'vendor/mysql.php';

class page
{
    private $_dbh    = null; //数据对象句柄
    private $_table  = '';   //当前数据库表
    private $_num    = 0;    //每页显示的数据数
    private $_pages  = 0;    //总页数
    private $_total  = 0;    //总数据条数
    private $_page   = 0;    //当前页索引
    public  $footer  = '';   //分页栏

    public function __construct($table, $num) {
        $this->_table = $table;
        $this->_num   = $num;
        $this->_dbh   = mysql::getInstance();
    }

    //分页函数
    protected function getPage() {

    }

    protected function a() {}

    public function test() {
        $this->_dbh = mysql::getInstance();
        return $this->_dbh;
    }
}

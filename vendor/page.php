<?php
//require_once '../common/config/conf.php';
//require_once 'mysql.php';

class page
{
    private $_dbh    = null; //数据对象句柄
    private $_table  = '';   //当前数据库表
    private $_num    = 0;    //每页显示的数据数
    private $_pages  = 0;    //总页数
    private $_total  = 0;    //总数据条数
    private $_page   = 0;    //当前页索引
    private $_orderBy = '';  //根据什么排序
    public  $footer  = '';   //分页栏
    public static $results = [];  //数据库数据

    //构造函数 传入要分页的表,每页显示的数据条数
    public function __construct($table, $num, $orderBy) {
        $this->_table = $table;
        $this->_num   = $num;
        $this->_dbh   = mysql::getInstance();
        $this->_orderBy = $orderBy;
        self::$results = $this->_dbh->select($this->_table, [], [], $this->_orderBy, 'desc');

    }

    //计算总页数
    public function getData() {
        $this->_pages = ceil(count(self::$results) / $this->_num);
        return $this->_pages;
    }
    
    //分页函数获取当前页,默认第一页
    public function getPage($page = 1) {
        $this->getData();
        return array_slice(self::$results, ($page-1) * $this->_num, $this->_num);
    }

    //获取底部导航栏
    public function tag() {

    }

    public function test() {
        $this->_dbh = mysql::getInstance();
        return self::$results = $this->_dbh->select($this->_table, [], [], 'create_time', 'DESC');
    }

    public function tt() {
        return self::$results;
    }
}
//$page = new page('blog_users', 3, 'create_time');


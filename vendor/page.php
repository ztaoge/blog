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
    public function __construct($table, $conditions = [], $num, $orderBy) {
        $this->_table = $table;
        $this->_num   = $num;
        $this->_dbh   = mysql::getInstance();
        $this->_orderBy = $orderBy;
        self::$results = $this->_dbh->select($this->_table, $conditions, [], $this->_orderBy, 'desc');
        $this->_total = count(self::$results);

    }

    //计算总页数
    public function getData() {
        $this->_pages = ceil($this->_total / $this->_num);
        return $this->_pages;
    }
    
    //分页函数获取当前页,默认第一页
    public function getPage($page = 1) {
        $this->getData();
        return array_slice(self::$results, ($page-1) * $this->_num, $this->_num);
    }

    //获取底部导航栏
    public function getTag($page = 1) {
        //标签长度
        $length = 5;
        $prev = '';
        $next = '';
        $url = $_SERVER['PHP_SELF'] . '?page=';
        $html = '';
        $tmp = '';
        if ($page <= 0 || $page > $this->_pages) {
            die('该页面不存在');
//        } elseif ($this->_total < 5) {
//            $html = '<ul class="pagination pagination-lg">';
//            for($i = $page-1; $i < $this->_total; $i++) {
//                $tmp .= '<li><a href="' . $url . ($i+1) . '">'. ($i+1) . '</a></li>';
//            }
//            $html .= $tmp . '</ul>';
        } else {
            //判断是否要prev标签
            if ($page - $length > 0) {
                $prev = '<ul class="page"><li><a href="' . $url . $length*(ceil($page/$length)-1) . '">上一页</a></li></ul>';
            } else {
                $prev = '';
            }
            //判读是否要next标签
            if ($page + $length < $this->_pages) {
                $next = '<ul class="page"><li><a href="' . $url . ($length*(ceil($page/$length))+1) . '">下一页</a></li></ul>';
            } else {
                $next = '';
            }
            //遍历li标签
            $tmp = '<ul class="pagination pagination-lg">';
            if (ceil($page/$length)*$length > $this->_pages) {
                $step = $length - (ceil($page/$length)*$length - $this->_pages);
            } else {
                $step = $length;
            }
            for ($i = ceil($page/$length)*$length - $length + 1; $i < $step + 1; $i++) {
                $tmp .= '<li><a href="' . $url . ($i) . '">'. ($i) . '</a></li>';
            }
            $tmp .= '</ul>';
            $html .= $prev . $tmp . $next;
        }
        return $html;
    }

    public function test() {
        $this->_dbh = mysql::getInstance();
        return self::$results = $this->_dbh->select($this->_table, [], [], 'create_time', 'DESC');
    }

    public function tt() {
        return $this->_total;
    }
}
//$page = new page('blog_users', 3, 'create_time');


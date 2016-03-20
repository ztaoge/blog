<?php
class user
{
    public $id;
    public $username;
    public $passwd;
    public $create_time;
    public $email;
    public $avatar;
    public $user_group;
    private $_dbh;

    public function __construct($username) {
        $this->username = $username;
        $this->init();
    }

    protected function init() {
        $this->_dbh = mysql::getInstance();
        $results = $this->_dbh->select('blog_users', ['username' => $this->username]);
        $this->id = $results[0]['id'];
        $this->create_time = $results[0]['create_time'];
        $this->email = $results[0]['email'];
        $this->avatar = $results[0]['avatar'];
        $this->user_group = $results[0]['user_group'];
    }

    //获取用户基本信息
    public function getUserInfo() {

    }

    //获取用户的文章,按时间排序
    public function getUserPost($num) {
        $page = new page('blog_posts', ['post_author_id' => $this->id], $num, 'create_time');
        return $page->getPage();
    }

    //获取分页栏
    public function getTag() {
        $page = new page('blog_posts', ['post_author_id' => $this->id], $num, 'create_time');
        return $page->getPage(1);
    }

    //get user's comment
    public function getUserComment() {}

    //get user's friends
    public function getUserFriend() {}
}

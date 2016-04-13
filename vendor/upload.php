<?php
class upload {
    private $_path = '../blog/upload';
    private $_size = '';
    private $_allowType = '';

    public function __construct() {

    }

    //TODO: 设置文件的保存路径
    public function setPath($path = '') {
        $this->_path = $path;
    }

    //TODO: 上传文件的保存
    public function save() {
        move_uploaded_file($filename = '', $destination = '');
    }

    //TODO:
    public function s() {}

}
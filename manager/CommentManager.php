<?php

require_once "PdoManager.php";

class CommentManager extends PdoManager
{
    private $id;
    private $body;
    private $post;
    private $publicationDate;

    public $dbms;     //数据库类型
    public $host; //数据库主机名
    public $dbName;    //使用的数据库
    public $user;      //数据库连接用户名
    public $pass;          //对应的密码
    public $dsn;
    public $dsh;

    function __construct(){
        $this->connect();
    }

    function connect(){
        $this->dbms = self::dbms;
        $this->host = self::host;
        $this->dbName = self::dbName;
        $this->user = self::user;
        $this->pass = self::pass;
        $this->dsn= "$this->dbms:host=$this->host;dbname=$this->dbName";
        try {
            $this->dsh = new PDO($this->dsn, $this->user, $this->pass);
        }catch (PDOException $e){
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function setbody(){

    }
    public function getbofy(){

    }
    public function setid(){

    }
    public function getid(){

    }
    public function setpost(){

    }
    public function getpost(){

    }

    public function add(): int
    {
        if($_POST['com']!=1){
            //echo 'add not exist';
            return 0;
        }

        $id= $_POST['postid'];
        $comment = $_POST['comment'];
        //echo($count);
        $query = "insert into comment value('$comment',$id)";
        echo($query);
        $this->dsh->query($query);

        return 0;
    }

}
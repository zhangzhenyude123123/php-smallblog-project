<?php
require_once 'UserManager.class.php';

class SimpleUserManager implements UserManager
{
    public $email;
    public $password;
    public $id;
    private $BoolID;
    private $BoolPwd;


    public $dbms;     //数据库类型
    public $host; //数据库主机名
    public $dbName;    //使用的数据库
    public $user;      //数据库连接用户名
    public $pass;          //对应的密码
    public $dsn;
    public $dsh;



    function __construct()
    {
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        $this->connect();
    }

    public function connect(){
        $this->dbms ='mysql';
        $this->host='localhost';
        $this->dbName='test';
        $this->user='zzy';
        $this->pass = '224037';
        $this->dsn= "$this->dbms:host=$this->host;dbname=$this->dbName";
        try {
            $this->dsh = new PDO($this->dsn, $this->user, $this->pass);
        }catch (PDOException $e){
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function findUserByID(int $id)
    {
        // TODO: Implement findUserID() method.
        $query = "select * from test where id =:idd";
        $stmt = $this->dsh->prepare($query);
        $stmt->bindParam(':idd',$id);
        $stmt->execute();
    }

    public function findUsers()
    {
        // TODO: Implement findUsers() method.
        $query = "select * from test;";
        return $this->dsh->query($query);
    }

    public function findUserPwd(int $id)
    {
        // TODO: Implement findUserPwd() method.
        $query = "select password from test where id =".$id;
        foreach ($this->dsh->query($query) AS $row){
            if($row['password']==$this->password){
                return true;
            }
        }
        return false;

    }

    public function haveUserID($name1){
        $query = "select id from test where name =:name";
        $stmt = $this->dsh->prepare($query);
        $stmt->bindParam(':name',$name1);
        return $stmt->execute();
    }

    public function getUserID($name){
        $query = "select id from test where name ="."'".$name . "'";

        foreach ($this->dsh->query($query) AS $row){
            //printf($row['id']."\n");
            $this->id = $row['id'];
        }
    }

    public function autheuticateBySession()
    {
//        $this->checkEmail();
//        $this->checkPassword();
        $this->checkEmailPDO();
        $this->checkPasswordPDO();

    }
    public function checkEmail(){
        if($this->email == "test@test.com") {
            $this->BoolID = true;
        }
    }

    public function checkPassword(){
        if($this->password == "123456"){
            $this->BoolPwd = true;
        }
    }

    public function checkEmailPDO(){
        $this->getUserID($this->email);
        if($this->id > -1){
            $this->BoolID = true;
        }
        else{
            $this->BoolID = false;
        }
    }

    public function checkPasswordPDO(){
        if($this->findUserPwd($this->id)){
            $this->BoolPwd = true;
        }
        else{
            $this->BoolPwd = false;
        }
    }

    public function Susccess(){
        try {
            if ($this->BoolPwd && $this->BoolID) {
                //跳转
                echo "you are good to login in";
                //echo PHP_EOL;
                echo(
                "<h2>User :</h2>  
                    <h2>$this->email</h2>"
                );
                $url = "Mainpage.php";
                Header("Location: ".$url);
                //include 'SimplePostManager.php';
            }
            else {
                throw new Exception("ID and password is erro");
            }
        }catch (Exception $e){
            echo $e->getMessage();
            include '../erro.php';
        }
    }
}

$Login = new SimpleUserManager();
$Login->autheuticateBySession();
$Login->Susccess();

//$Login->haveUserID('test@test.com');
//$Login->getUserID('test@test.com');

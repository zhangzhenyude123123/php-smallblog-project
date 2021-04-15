<?php
require_once 'PostManger.class.php';
require_once 'PdoManager.php';

//这里需要注意一件事情，
class SimplePostManager extends PdoManager implements PostManager
{

    public $count;
    public $dbms;     //数据库类型
    public $host; //数据库主机名
    public $dbName;    //使用的数据库
    public $user;      //数据库连接用户名
    public $pass;          //对应的密码
    public $dsn;
    public $dsh;


    function __construct()
    {
        $count =0;
        $this->connect();
    }



    function connect(){
        $this->dbms = self::dbms;
        $this->host = self::host;
        $this->dbName = self::dbName;
        $this->user = self::user;
        $this->pass = self::pass;
        $this->dsn= "$this->dbms:host=$this->host;dbname=$this->dbName";
        $this->dsn= "$this->dbms:host=$this->host;dbname=$this->dbName";
        try {
            $this->dsh = new PDO($this->dsn, $this->user, $this->pass);
        }catch (PDOException $e){
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function findAllPosts()
    {
        // TODO: Implement findAllPosts() method.

        $query = "select * from details;";
        $res = '<table>';

            foreach ($this->dsh->query($query) AS $row){
                $res = $res."<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['title']."</td>
                                <td>".$row['message']."</td>
                             </tr>";
            }

        echo $res."</table>";
        echo "<form action='addPost.php'><button>add</button></form>";
        echo "<form action='addComment.php'><button>addcomment</button></form>";
        echo "<form action='removePost.php'><button>remove</button></form>";
    }


    public function add(): int
    {
        if($_POST['add']!=1){
            //echo 'add not exist';
            return 0;
        }

        $title= $_POST['title'];
        $message = $_POST['message'];
        $count = $this->checkcount()+1;
        //echo($count);
        $query = "insert into details value('$title',$count,'$message')";
        //echo($query);
        $this->dsh->query($query);

        return 0;
    }

    public function checkcount(){
        $query = "select count(*) as c from details";
        foreach ($this->dsh->query($query) AS $row){
            return ($row['c']);
        }
    }

    public function findPostById(int $id)
    {
        // TODO: Implement findPostById() method.
    }

    public function removePost()
    {
        // TODO: Implement removePost() method.
        if($_POST['remove']!=1){
            //echo 'add not exist';
            return 0;
        }

        //echo 'add exist';

        $title= $_POST['title'];


        $query = "delete from details where id=".$title.";";

        $this->dsh->query($query);

        return 0;
    }
}




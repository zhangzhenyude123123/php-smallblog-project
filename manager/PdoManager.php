<?php

abstract class PdoManager{

    const dbms = 'mysql';     //数据库类型
    const host ='localhost'; //数据库主机名
    const dbName = 'test';    //使用的数据库
    const user = 'zzy';      //数据库连接用户名
    const pass ='224037';      //对应的密码

    abstract function connect();
}
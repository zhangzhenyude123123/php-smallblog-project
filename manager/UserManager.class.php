<?php

interface UserManager{
    public function findUsers();
    public function findUserByID(int $id);
    public function findUserPwd(int $id);
}


<?php
class User extends Model{
    protected static $tableName = 'wp_app_user';
    protected static $columns = ['id_user', 'full_name', 'email', 'country', 'username', 'password', 'photo', 'score', 'time', 'date', 'trash', 'office', 'off_company'];
    protected $idTable = 'id_user';

    
}


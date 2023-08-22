<?php
class Guest extends Model{
    protected static $tableName = 'wp_app_guest';
    protected static $columns = ['id_guest', 'country', 'date', 'email', 'full_name', 'id_user', 'password', 'photo', 'score', 'time', 'trash', 'username'];
    protected $idTable = 'id_guest';

    
}

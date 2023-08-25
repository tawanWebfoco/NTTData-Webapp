<?php
    class Pub extends Model{
        protected static $tableName = 'wp_app_pub';
        protected static $columns = ['id_user','message', 'date','file'];
        protected static $idTable = 'id_pub';
    }

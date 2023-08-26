<?php
    class Comment extends Model{
        protected static $tableName = 'wp_app_comment';
        protected static $columns = ['id_pub', 'message', 'id_user', 'date',];
        protected static $idTable = 'id_comment';
    }

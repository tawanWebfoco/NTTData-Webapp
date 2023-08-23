<?php
    class Comment extends Model{
        protected static $tableName = 'wp_app_pub';
        protected static $columns = ['id_pub', 'message', 'file', 'id_user', 'date', 'trash'];
    }

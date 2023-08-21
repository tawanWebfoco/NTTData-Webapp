<?php
    class Model{
        protected static $tableName = 'wp_app_user';
        protected static $columns = [];
        protected $values = [];

        function __construct($arr){
            $this->loadFromArray($arr);
        }
        public function loadFromArray($arr){
            if($arr){
                foreach($arr as $key => $values){
                     $this->$key = $values;
                }
            }
        }
        public function __get($key){
            return $this->values[$key];
        }
        public function __set($key, $value){
            $this->values[$key] = $value;
        }

        public static function getOne($filters = [], $column = '*'){
            $class = get_called_class();
            $result = static::getResultSetFromSelect($filters,$column);
            
            return $result ? new $class($result->fetch_assoc()) : null;
        }
         

       public static function get($filters = [], $column = '*'){
           $objects = [];
           $result = static::getResultSetFromSelect($filters,$column);
           if($result){
               $class = get_called_class();
               while($row = $result->fetch_assoc()){
                   array_push($objects, new $class($row));
               }
           }
       }
        
        public static function getResultSetFromSelect($filters = [], $columns = '*'){
            $sql = "SELECT $columns FROM "
                . static::$tableName
                . static::getFilters($filters);
            $result = Database::getResultFromQuery($sql);
            
            if($result->num_rows === 0){
                return null;
            }else{
                return $result;
            }
        }
        private static function getFilters($filters){
            $sql = '';
            if(count($filters) > 0){
                $sql .= " WHERE 1 = 1";
                foreach($filters as $column => $value) {
                    $sql .= " AND $column = ". static::getFormatedValue($value);
                }
                $sql .= ';';
            }
            return $sql;
        }
        private static function getFormatedValue($value){
            switch ($value){
                case is_null($value):
                    return "null";
                    break;
                 
                case is_string($value):
                    return "'$value'";
                    break;
                 
                default:
                    return $value;
                    break;
                 
            }
        }
        public function update() {

            $sql = "UPDATE " . static::$tableName . " SET ";
            foreach($this->values as $col => $value ) {
                if($col != 'id_user'){
                $sql .= " `$col` = " . static::getFormatedValue($value) . ",";
                }
            }
            $sql[strlen($sql) - 1] = ' ';
            $sql .= "WHERE id_user = {$this->id_user}";
            Database::executeSQL($sql);
        }
    } 
<?php

    class Model{
        protected static $tableName = 'wp_app_user';
        protected static $columns = [];
        protected $values = [];
        protected static $idTable;

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
       

        // captura um 
        // ex: $user = User::getOne(['email' => $this->email]);
        public static function getOne($filters = [], $column = '*'){
            $class = get_called_class();
            $result = static::getResultSetFromSelect($filters,$column);
            
            return $result ? new $class($result->fetch_assoc()) : null;
        }
         

        // capturar todos
        // ex: $users = User::get();
       public static function get($filters = [], $column = '*', $order = '', $offset = '', $limit = '', $exeption = [], $join = ''){
           $objects = [];
           $result = static::getResultSetFromSelect($filters,$column,$order, $offset, $limit,$exeption, $join);
           if($result){
               $class = get_called_class();
               while($row = $result->fetch_assoc()){
                   array_push($objects, new $class($row));
               }
           }
           return $objects;
       }


       public function getValues() {
        return $this->values;
    }
    
        public static function getResultSetFromSelect($filters = [], $columns = '*', $order = '', $offset = '', $limit = '',$exeption = [], $join = ''){
            $sql = "SELECT $columns FROM "
                . static::$tableName
                . static::getJoin($join)
                . static::getFilters($filters)
                . static::getExeptionFilter($exeption)
                . static::getOrder($order)
                . static::getLimit($limit)
                . static::getOffset($offset);

                // print_r($sql);

            $result = Database::getResultFromQuery($sql);
            
            if($result->num_rows === 0){
                return null;
            }else{
                return $result;
            }
        }

        private static function getJoin($join){
            $sql = '';
            if(!empty($join)){
                $sql = " " . $join;
            }
            return $sql;
        }
        

        private static function getFilters($filters){
            $sql = ' WHERE 1 = 1 AND trash IS NULL';
            if(count($filters) > 0){
                foreach($filters as $column => $value) {
                    $sql .= " AND $column = ". static::getFormatedValue($value);
                }
            }
            return $sql;
        }

        private static function getExeptionFilter( $exeption = [], $filters = []){
            $sql = '';
            if(count($exeption) > 0){
                // if(count($filters) < 1)$sql .= "";
                foreach($exeption as $column => $value) {
                    $sql .= " AND ". static::$idTable ." != ". static::getFormatedValue($value);
                }
            }
            return $sql;
        }

        private static function getOrder($order){
            $sql = '';
            if(!empty($order)){
                $sql = " ORDER BY ". $order;
            }
            return $sql;
        }

        private static function getLimit($limit){
            $sql = '';
            if(!empty($limit)){
                $sql = " LIMIT ". static::getFormatedValue($limit);
            }
            return $sql;
        }

        private static function getOffset($offset){
            $sql = '';
            if(!empty($offset)){
                $sql = " OFFSET ". static::getFormatedValue($offset);
            }
            $sql .= ';';
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

        // atualiza
        public function update() {
            $idTable = static::$idTable;
            $sql = "UPDATE " . static::$tableName . " SET ";
            foreach($this->values as $col => $value ) {
                if($col == 'primary_key')continue; 
                if($col == 'user_id_user')continue; 
                if($col == 'type')continue; 
                if($col != $idTable){
                $sql .= " `$col` = " . static::getFormatedValue($value) . ",";
                }
            }
            $sql[strlen($sql) - 1] = ' ';
            $sql .= "WHERE $idTable = " . $this->values['primary_key'];

            // printf($sql);
            Database::executeSQL($sql);
        }

        public function updatePass(){
            $idTable = static::$idTable;
            $sql = "UPDATE " . static::$tableName . " SET ";
            $sql .= " password = ";
            $sql .= static::getFormatedValue($this->values['password']);
            $sql .= ", validation = 0";
            $sql .=  " WHERE $idTable = " . $this->values['primary_key'];

            // print_r($sql);
            return Database::executeSQL($sql);
        }
        
        public function insert() {
            $idTable = static::$idTable;
            $sql = "INSERT INTO " . static::$tableName . " ("
                . implode(",", static::$columns) . ") VALUES (";
                foreach($this->values as $col => $value ) {
                    if($col == $idTable) continue;
                        $sql .= static::getFormatedValue($value) . ",";
                }
                $sql[strlen($sql) - 1] = ')';
                // print_r($sql);
           return Database::executeSQL($sql);
        }


       
        public function register() {
            $idTable = static::$idTable;
            $sql = "INSERT INTO " . static::$tableName . " ("
                . implode(",", static::$columns) . ") VALUES (";
                foreach($this->values as $col => $value ) {
                    if($col == $idTable) continue;
                    if($col == 'regType') continue;
                    if($col == 'validationId') continue;
                    if($col == 'confirmValidationDb') continue;
                    if($col == 'validation') continue;
                    if($col == 'confirmEmail') continue;
                    if($col == 'confirmPassword') {
                        date_default_timezone_set('America/Sao_Paulo');
                        $date = str_replace('=','T',date('Y-m-d=H:i:s'));
                        $sql .= static::getFormatedValue($date) . ",";
                        continue;
                    };
                        $sql .= static::getFormatedValue($value) . ",";
                }
            $sql[strlen($sql) - 1] = ')';
                
           return Database::executeSQL($sql);
        }

        public static function saveInvitationsSent($values){
            $sql = "INSERT INTO `wp_app_unregistered`(`email`, `date`, `id_user`, `type`,`validationId`) VALUES (";
           
            foreach($values as $col => $value ) {
                    $sql .= static::getFormatedValue($value) . ",";
            }
            $sql[strlen($sql) - 1] = ')';
            Database::executeSQL($sql);
        }
        public static function twoFactors($values){
            $sql = "INSERT INTO `wp_app_unregistered`(`email`, `date`, `type`,`validationId`,`password`) VALUES (";
           
            foreach($values as $col => $value ) {
                    $sql .= static::getFormatedValue($value) . ",";
            }
            $sql[strlen($sql) - 1] = ')';
            Database::executeSQL($sql);
        }
      
        public static function sanetizePost($post){
            $columns = User::$columns + Pub::$columns + Guest::$columns + Comment::$columns;
            $columns = $columns + ['email', 'date', 'id_user', 'type'];
            $uniqueColumns = array_unique($columns);
            
            foreach ($uniqueColumns as $col => $value) {
                
                if(!isset($post[$value]) && empty($post[$value])) continue; 

                if(is_array($post[$value])){

                    foreach ($post[$value] as $colPostArr => $valPostAr){
                        switch ($valPostAr) {
                            case 'email':
                                $_POST[$colPostArr]['email'] = isset($valPostAr['email']) ? sanitize_email($valPostAr['email']) : null;
                                break;
            
                            case 'id_user':
                            case 'id_guest':
                            case 'id_time':
                            case 'id_pub':
                            case 'id_comment':
                                $_POST[$colPostArr]['id_user'] = isset($valPostAr['id_user']) ? intval($valPostAr['id_user']) : null;
                                $_POST[$colPostArr]['id_guest'] = isset($valPostAr['id_guest']) ? intval($valPostAr['id_guest']) : null;
                                $_POST[$colPostArr]['id_time'] = isset($valPostAr['id_time']) ? intval($valPostAr['id_time']) : null;
                                $_POST[$colPostArr]['id_pub'] = isset($valPostAr['id_pub']) ? intval($valPostAr['id_pub']) : null;
                                $_POST[$colPostArr]['id_comment'] = isset($valPostAr['id_comment']) ? intval($valPostAr['id_comment']) : null;
                                break;
            
                            case 'trash':
                                $_POST[$colPostArr]['trash'] = (isset($valPostAr['trash'])) ? true : false;
                                break;
            
                            case 'photo':
                                $_POST[$colPostArr]['photo'] = isset($valPostAr['photo']) ? esc_url($valPostAr['photo']) : null;
                                break;
                                
                                default:
                                $_POST[$colPostArr][$value] = isset($valPostAr[$value]) ? sanitize_text_field($valPostAr[$value]) : null;
                                break;
                            }
                    }
                    continue;
                }

                switch ($value) {
                    case 'email':
                        $_POST['email'] = isset($post['email']) ? sanitize_email($post['email']) : null;
                        break;
                    case 'id_user':
                        $_POST['id_user'] = isset($post['id_user']) ? intval($post['id_user']) : null;
                        break;
                    case 'id_guest':
                        $_POST['id_guest'] = isset($post['id_guest']) ? intval($post['id_guest']) : null;
                        break;
                    case 'id_time':
                        $_POST['id_time'] = isset($post['id_time']) ? intval($post['id_time']) : null;
                        break;
                    case 'id_pub':
                        $_POST['id_pub'] = isset($post['id_pub']) ? intval($post['id_pub']) : null;
                        break;
                    case 'id_comment':
                        $_POST['id_comment'] = isset($post['id_comment']) ? intval($post['id_comment']) : null;
                        break;
    
                    case 'trash':
                        $_POST['trash'] = (isset($post['trash'])) ? true : false;
                        break;
    
                    case 'photo':
                        $_POST['photo'] = isset($post['photo']) ? esc_url($post['photo']) : null;
                        break;
                        
                        default:
                        $_POST[$value] = isset($post[$value]) ? sanitize_text_field($post[$value]) : null;
                        break;
                    }
               
                }
        }

        public static function validationId($key){
            $time = time();
            $time = strval($time);
            $id = $time . $key;
            $id = md5($id);
            return $id;
        }
        
        public static function getValidationId($email){
            $class = get_called_class();
            $sql = "SELECT * FROM `wp_app_unregistered` WHERE `email` = ";
            $sql .= static::getFormatedValue($email);
            $sql .= ' ORDER BY id_unregistered DESC LIMIT 1';
            
            $result = Database::getResultFromQuery($sql);
            
            if($result->num_rows === 0)  return null;
            
                return $result ? new $class($result->fetch_assoc()) : null;
        
        }

        public static function validarEmailNTTDataWebfoco($email) {
            // Expressão regular para verificar se o email pertence aos domínios desejados
            $webfoco = '/^(.+)@(webfoco\.com)$/i';
            $nttdata = '/^(.+)@(nttdata\.com|emeal\.nttdata\.com)$/i';
        
            // Executa a verificação usando a expressão regular
            if (preg_match($nttdata, $email) || preg_match($webfoco, $email)) {
                return true; // O email é válido
            } else {
                return false; // O email não é válido
            }
        }
        
    } 
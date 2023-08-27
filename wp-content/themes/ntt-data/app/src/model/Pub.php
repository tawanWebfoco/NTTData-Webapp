<?php
    class Pub extends Model{
        protected static $tableName = 'wp_app_pub';
        protected static $columns = ['id_user','message', 'date','file','type_file'];
        protected static $idTable = 'id_pub';
        public $arrayIdPubView = [];

        public function setArrayIdPubView($value) {
            $this->arrayIdPubView = array_merge($this->arrayIdPubView, $value);
        }

        public function getPub($filters = [], $column = '*', $order = '', $offset = '', $limit = '', $exeption = [], $join = '') {

            $objPub = $this->get($filters, $column, $order, $offset, $limit, $this->arrayIdPubView, $join);

            return $objPub;
        }


        public static function getIdPubForMap($array){
            return $array->id_pub;
        }
        
    }

    
<?php
    class Pub extends Model{
        protected static $tableName = 'wp_app_pub';
        protected static $columns = ['id_user','message', 'date','file','type_file'];
        protected static $idTable = 'id_pub';
        public $arrayIdPubView = [];
        protected $pointsForPub = 10;

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

        public function insert() {
            if(parent::insert()){
                // ATUALIZA TABELA DE ENGAJAMENTO
                $user = User::getOne(['id_user' => $this->id_user]);
                date_default_timezone_set('America/Sao_Paulo');
                $date = str_replace('=','T',date('Y-m-d=H:i:s'));
                
                $engagedData = [
                    'country' => $user->country,
                    'date' => $date,
                    'id_user' => $this->id_user,
                    'type' => 'pub'
                    ];

                $engaged = new Engaged($engagedData);
                $engaged->insert();

                // ATUALIZA SCORE
                $score = intval($user->score);
                $score = $score + $this->pointsForPub;

                $updateScore = [
                    'id_user' => $user->id_user,
                    'primary_key' => $user->id_user,
                    'score' => $score
                    ];
              
                    $updateScore = new User($updateScore);
                    if($updateScore->id_user) {
                          $updateScore->update();
                    }
            }
        }

        
        public function validateDelete(){

            $existPubDb = $this->getOne(['id_pub' => $this->id_pub]);
            // print_r(isset());
            $errors = [];

            if($this->id_user !== $this->user_id_user) {
                $errors['validationId'] = 'Você não tem permissão para apagar essa publicação';
            }
            
            if(empty($existPubDb)){
                $errors['validationId'] = 'Publicação não encontrada no Banco de dados';

            }
                if(count($errors) > 0) {
                    print_r($errors);
                // throw new ValidationException($errors);
            }
            }
    }

    
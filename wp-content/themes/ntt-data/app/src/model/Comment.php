<?php
// include_once(LANGUAGES_PATH.'/common.php');
    class Comment extends Model{
        protected static $tableName = 'wp_app_comment';
        protected static $columns = ['id_pub', 'message', 'id_user', 'date',];
        protected static $idTable = 'id_comment';
        protected $pointsForComment = 10;

        public function insert() {
            $id_comment = parent::insert();
            if($id_comment){
                $user = User::getOne(['id_user' => $this->id_user]);
                date_default_timezone_set('America/Sao_Paulo');
                $date = str_replace('=','T',date('Y-m-d=H:i:s'));
                
                $engagedData = [
                    'country' => $user->country,
                    'date' => $date,
                    'id_user' => $this->id_user,
                    'type' => 'comment',
                    'typeUser' => 'User'
                    ];

                $engaged = new Engaged($engagedData);
                $engaged->insert();

                // ATUALIZA SCORE
                $score = intval($user->score);
                $score = $score + $this->pointsForComment;

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
            return $id_comment;
        }
        public function validateDelete(){

            $existComment = $this->getOne(['id_comment' => $this->id_comment]);
            // print_r(isset());
            $errors = [];

            if($this->id_user !== $this->user_id_user) {
                $errors['validationId'] = _t['feed_erroapagarcom'];
            }
            
            if(empty($existComment)){
                $errors['validationId'] = _t['feed_errocom'];

            }
                if(count($errors) > 0) {
                    // print_r($errors);
                throw new ValidationException($errors);
            }
            }
    }

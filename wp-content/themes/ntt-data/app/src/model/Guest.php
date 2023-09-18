<?php
class Guest extends Model{
    protected static $tableName = 'wp_app_guest';
    protected static $columns = ['id_user','full_name','email', 'username', 'password','date','country','language'];
    protected static $idTable = 'id_guest';
    protected $pointsForInvite = 50;

    private function validate() {
        $errors = [];

        $validationDb = (Model::getValidationId($this->email)) ? Model::getValidationId($this->email) : null;

        if(!isset($validationDb)){
            $errors['validationId'] = _t['registro_erroconvite1'];
        }else{
            if($this->validationId !== $validationDb->validationId) {
                $errors['validationId'] = _t['registro_erroconvite2'];
            }
        }

        if(!$this->full_name) {
            $errors['full_name'] = _t['registro_erronome'];
        }
        
        if(!$this->email) {
            $errors['email'] = _t['registro_erroemail1'];
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = _t['registro_erroemail2'];
        }

        if(!$this->username) {
            $errors['username'] = _t['registro_errouser'];
        }

        if(!$this->country) {
            $errors['country'] = _t['registro_erropais'];
        }

        if(!$this->password) {
            $errors['password'] = _t['registro_errosenha'];
        }

        if(!$this->confirmPassword) {
            $errors['confirmPassword'] = _t['registro_erroconfsenha'];
        }

        if($this->password && $this->confirmPassword 
            && $this->password !== $this->confirmPassword) {
            $errors['password'] = _t['registro_errosenhasdiferentes'];
            $errors['confirmPassword'] = _t['registro_errosenhasdiferentes'];
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);

        }
    }
    
    public function validateUpdatePass(){
        $errors = [];

        $validationDb = Guest::getOne(['id_guest' => $this->id_user], 'validation')->validation;

        if($this->validationId !== $validationDb) {
            $errors['validationId'] = _t['registro_erromsg'];
        }

        if(!$this->confirmPassword) {
            $errors['confirm_password'] = _t['registro_erroconfsenha'];
        }

        if($this->password && $this->confirmPassword 
            && $this->password !== $this->confirmPassword) {
            $errors['password'] = _t['registro_errosenhasdiferentes'];
            $errors['confirmPassword'] = _t['registro_errosenhasdiferentes'];
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

   
    public function register(){
        $this->validate();
        $id_guest = parent::register();

         // ATUALIZA SCORE DE QUEM CONVIDOU
         $score = User::getOne(['id_user' => $this->id_user], 'score')->score;
         $score = $score + $this->pointsForInvite;

         $updateScore = [
             'id_user' => $this->id_user,
             'primary_key' => $this->id_user,
             'score' => $score
             ];
       
             $updateScore = new User($updateScore);
             if($updateScore->id_user) {
                   $updateScore->update();
             }

             return $id_guest;

    }

}

<?php
// include_once(LANGUAGES_PATH.'/common.php');

class User extends Model{
    protected static $tableName = 'wp_app_user';
    protected static $columns = ['full_name', 'email', 'username', 'password','date','country','office','language'  ];
    protected static $idTable = 'id_user';

    public function insert() {
        $this->validateLogin();
        return parent::insert();
    }

    public function validateLogin(){
        $errors = [];
        
         //  NOME
         if(!$this->full_name) {
            $errors['full_name'] = _t['registro_erronome'].'<br>';
        }
        
        // EMAIL
        if(!$this->email) {
            $errors['email'] = _t['registro_erroemail1'].'<br>';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = _t['registro_erroemail2'].'<br>';
        }
        
        
        if(!$this->validarEmailNTTDataWebfoco($this->email)) {
            $errors['email'] = _t['registro_erroapenascolab'].'<br>';
        } 

        if(User::getOne(['email' => $this->email]) || Guest::getOne(['email' => $this->email])){
            $errors['email'] = _t['registro_errojacadastrado'].'<br>';
        }

        // USERNAME
        if(!$this->username) {
            $errors['username'] = _t['registro_errouser'].'<br>';
        }
        if(User::getOne(['username' => $this->username]) || Guest::getOne(['username' => $this->username])){
            $errors['username'] = _t['registro_errousercadastrado'].'<br>';
        }

        // PAÍS
        if(!$this->country) {
            $errors['country'] = _t['registro_erropais'].'<br>';
        }

        // CARGO
        if(!$this->office) {
            $errors['office'] = _t['registro_errocargo'].'<br>';
        }

        // SENHA
        if(!$this->password) {
            $errors['password'] = _t['registro_errosenha'].'<br>';
        }

        if(!$this->confirmPassword) {
            $errors['confirmPassword'] = _t['registro_erroconfsenha'].'<br>';
        }

        if($this->password && $this->confirmPassword 
            && $this->password !== $this->confirmPassword) {
            $errors['password'] = _t['registro_errosenhasdiferentes'].'<br>' ;
            $errors['confirmPassword'] = _t['registro_errosenhasdiferentes'].'<br>';
        }
        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }

    }

    public function validateRegister() {
        $errors = [];
        
        // $validationDb = (Model::getValidationId($this->email)) ? Model::getValidationId($this->email)->validationId : null;
        
        if($this->validationId !== $this->confirmValidationDb) {
            $errors['validationId'] = _t['registro_errovalidacao'];
        }

        if($this->email && $this->confirmEmail 
            && $this->email !== $this->confirmEmail) {
            $errors['email'] = _t['registro_erroemailprereg'];
            $errors['confirmemail'] = _t['registro_erroemailprereg'];
        }
        
            if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    public function validateUpdatePass(){
        $errors = [];

        $validationDb = User::getOne(['id_user' => $this->id_user], 'validation')->validation;

        if($this->validationId !== $validationDb) {
            $errors['validationId'] = _t['registro_errolinkredef'];
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
        // $this->validateRegister();
        $this->validateLogin();
        return parent::register();
    }
   
    
}


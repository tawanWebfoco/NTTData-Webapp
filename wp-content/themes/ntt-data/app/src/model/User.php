<?php
class User extends Model{
    protected static $tableName = 'wp_app_user';
    protected static $columns = ['full_name', 'email', 'username', 'password', 'date','country', 'office'];
    protected static $idTable = 'id_user';

    public function insert() {
        $this->validate();
        return parent::insert();
    }


    private function validate() {
        $errors = [];

        $validationDb = (Model::getValidationId($this->email)) ? Model::getValidationId($this->email)->validationId : null;

        if($this->validationId !== $validationDb) {
            $errors['validationId'] = 'Insira o mesmo endereço de email ao qual enviamos o link.<br>  ';
        }

        //  NOME
        if(!$this->full_name) {
            $errors['full_name'] = 'Nome é um campo obrigatório.<br>';
        }
        
        // EMAIL
        if(!$this->email) {
            $errors['email'] = 'Email é um campo obrigatório.<br>';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email inválido.<br>';
        }

        if(!$this->validarEmailNTTDataWebfoco($this->email)) {
            $errors['email'] = 'Cadastro permitido apenas para colaboradores NTTDATA.<br>';
        } 

        if(User::getOne(['email' => $this->email]) || Guest::getOne(['email' => $this->email])){
            $errors['email'] = 'Email já cadastrado<br>';
        }

        // USERNAME
        if(!$this->username) {
            $errors['username'] = 'Usuário é um campo obrigatório.<br>';
        }
        if(User::getOne(['username' => $this->username]) || Guest::getOne(['username' => $this->username])){
            $errors['username'] = 'Nome de usuário já cadastrado, por favor tente outro.<br>';
        }

        // PAÍS
        if(!$this->country) {
            $errors['country'] = 'País é um campo obrigatório.<br>';
        }

        // CARGO
        if(!$this->office) {
            $errors['office'] = 'Cargo é um campo obrigatório.<br>';
        }

        // SENHA
        if(!$this->password) {
            $errors['password'] = 'Senha é um campo obrigatório.<br>';
        }

        if(!$this->confirmPassword) {
            $errors['confirmPassword'] = 'Confirmação de Senha é um campo obrigatório.<br>';
        }

        if($this->password && $this->confirmPassword 
            && $this->password !== $this->confirmPassword) {
            $errors['password'] = 'As senhas não são iguais.<br>';
            $errors['confirmPassword'] = 'As senhas não são iguais.<br>';
        }


        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
    public function register(){
        $this->validate();
        return parent::register();
    }
   
    
}


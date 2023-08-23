<?php
class User extends Model{
    protected static $tableName = 'wp_app_user';
    protected static $columns = ['full_name', 'email', 'username', 'password', 'date','country', 'office'];
    protected $idTable = 'id_user';

    public function insert() {
        $this->validate();
        return parent::insert();
    }

    
    
    private function validate() {
        $errors = [];

        $validationDb = (Model::getValidationId($this->email)) ? Model::getValidationId($this->email) : null;

        if($this->validationId !== $validationDb) {
            $errors['validationId'] = 'Insira o mesmo endereço de email ao qual enviamos o link  ';
        }

        if(!$this->full_name) {
            $errors['full_name'] = 'Nome é um campo obrigatório.';
        }
        
        if(!$this->email) {
            $errors['email'] = 'Email é um campo obrigatório.';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email inválido.';
        }

        if(!$this->username) {
            $errors['username'] = 'Usuário é um campo obrigatório.';
        }

        if(!$this->country) {
            $errors['country'] = 'País é um campo obrigatório.';
        }

        if(!$this->office) {
            $errors['office'] = 'Cargo é um campo obrigatório.';
        }

        // if(!$this->start_date) {
        //     $errors['start_date'] = 'Data de Admissão é um campo obrigatório.';
        // } elseif(!DateTime::createFromFormat('Y-m-d', $this->start_date)) {
        //     $errors['start_date'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        // }

        // if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {
        //     $errors['end_date'] = 'Data de Desligamento deve seguir o padrão dd/mm/aaaa.';
        // }

        if(!$this->password) {
            $errors['password'] = 'Senha é um campo obrigatório.';
        }

        if(!$this->confirmPassword) {
            $errors['confirm_password'] = 'Confirmação de Senha é um campo obrigatório.';
        }

        if($this->password && $this->confirmPassword 
            && $this->password !== $this->confirmPassword) {
            $errors['password'] = 'As senhas não são iguais.';
            $errors['confirmPassword'] = 'As senhas não são iguais.';
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


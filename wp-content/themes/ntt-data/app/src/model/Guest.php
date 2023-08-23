<?php
class Guest extends Model{
    protected static $tableName = 'wp_app_guest';
    protected static $columns = ['id_guest', 'country', 'date', 'email', 'full_name', 'id_user', 'password', 'photo', 'score', 'time', 'trash', 'username'];
    protected $idTable = 'id_guest';

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

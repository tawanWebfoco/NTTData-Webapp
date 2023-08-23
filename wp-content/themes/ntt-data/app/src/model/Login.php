<?php
class Login extends Model{

    public function validate(){
        $errors = [];

        if(!$this->email){
            $errors['email'] = 'E-mail é um campo obrigatório.';
        }

        if(!$this->password){
            $errors['password'] = 'Por favor, informe a senha.';
        }

        if(count($errors) > 0 ){
            throw new ValidationException($errors);
        }
    }
    
    public function checkLogin(){
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        $guest = Guest::getOne(['email' => $this->email]);
        
        if($user){
            if($user->off_company){
                throw new AppException('Usuário está desligado da empresa.');
            }

            if($this->password === $user->password){
                return $user;

            }
        }elseif($guest){
            
            if($this->password === $guest->password){
                return $guest;

            }
        }
        
        throw new AppException('Usuário ou Senha Inválidos.');
    }
}
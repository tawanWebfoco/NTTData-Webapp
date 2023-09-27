<?php
// include_once(LANGUAGES_PATH.'/common.php');
class Login extends Model{

    public function validate(){
        $errors = [];

        if(!$this->email){
            $errors['email'] = _t['login_erroemail'];
        }

        if(!$this->password){
            $errors['password'] = _t['login_errosenha'];
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
                throw new AppException(_t['login_errodesligado']);
            }

            if($this->password === $user->password){
                $user->password = null;
                return $user;

            }
        }elseif($guest){
            
            if($this->password === $guest->password){
                $guest->password = null;
                return $guest;

            }
        }
        
        throw new AppException(_t['login_errousersenha']);
    }
}
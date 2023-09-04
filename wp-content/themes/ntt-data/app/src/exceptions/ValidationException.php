<?php
/* Incluir Linguagens */
include_once get_template_directory().'/languages/common.php';

class ValidationException extends AppException{

    private $errors = [];

    public function __construct($errors = [],
        $message = _t['erro_validacao'],
         $code = 0, $previous = null){
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }      
    
    public function getErrors(){
        return $this->errors;
    }

    public function get($att){
        return $this->errors[$att];
    }
}
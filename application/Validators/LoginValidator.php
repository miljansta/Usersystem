<?php
namespace Application\Validators;

class LoginValidator extends Validator {

    /**
     * Validator rules for login
     */
    public function validatorRules(){
        $this->validator->required('email')->email();
        $this->validator->required('password')->string();
    }


}
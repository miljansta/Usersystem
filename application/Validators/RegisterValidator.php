<?php
namespace Application\Validators;

use Particle\Validator\Exception\InvalidValueException;

class RegisterValidator extends Validator {

    /**
     * Validator rules for registration
     */
    protected function validatorRules(){
        $this->validator->required('email')->email();
        $this->validator->required('name')->string();
        $this->validator->required('password');
        $this->validator->required('password-confirm')->callback(function($value, $values){
            if($value !== $values['password']){
                throw new InvalidValueException("Your passwords must be equal.", "password-confirm");
            }
            return true;
        });

    }


}
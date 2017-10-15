<?php
namespace Application\Validators;

use Particle\Validator\Validator as ParticleValidator;

class Validator{

    /**
     * @var array
     */
    protected $data;

    /**
     * @var Validator
     */
    protected $validator;

    public function __construct($data){
        $this->data = $data;
        $this->validator = new ParticleValidator();

    }

    public function isValid(){
        $this->validatorRules();
        $result = $this->validator->validate($this->data);
        return ($result->isValid())?$result->isValid():$result->getMessages();
    }
}
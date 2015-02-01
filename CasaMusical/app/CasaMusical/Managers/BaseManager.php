<?php

namespace CasaMusical\Managers;

abstract class BaseManager{
	protected $entity;
	protected $data;

	public function __construct($entity, $data){
		$this->entity = $entity;
		$this->data = $data;
	}

	abstract public function getRules();

	public function isValid(){

		$rules = $this->getRules();
		$validacion = \Validator::make($this->data, $rules);
		$isValid = $validacion->passes();
		$this->errors = $validacion->messages();

		return $isValid;
	}

	public function prepareData($data){
		return $data;
	}


	public function save(){
		if( ! $this->isValid()){
			return false;
		}
		$this->entity->fill($this->prepareData($this->data));
		$this->entity->save();
		return true;
	}

	public function getErrors(){
		return $this->errors;
	}
}
<?php 

namespace CasaMusical\Managers;

class ProviderManager extends BaseManager
{
	public function getRules(){
		$rules = array(
						'name'		=> 'required',
						'home'		=> 'required',
						'phone'		=> 'required',
						'delivery_time'	=> 'required'						
						);
		return $rules;
	}
}

 ?>
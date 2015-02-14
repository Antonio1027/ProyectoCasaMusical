<?php 

namespace CasaMusical\Managers;

class ProductManager extends BaseManager
{
	public function getRules(){
		$rules = array(
					'product' 		=> 'required',
					'model'	  		=> 'required',
					'price'	  		=> 'required | numeric',
					'gain'	  		=> 'required | numeric',
					'price_iva'		=> 'required | numeric',
					'reserve'		=> 'required | numeric',
					'reorderpoint'	=> 'required | numeric',
					'key'			=> 'required | unique:products,key,' . $this->entity->id,
					'provider_id'	=> 'required'	
				);
		return $rules;
	}
}

 ?>
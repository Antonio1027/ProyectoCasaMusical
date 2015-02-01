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
					'reorderpoint'	=> 'required | numeric'		
				);
		return $rules;
	}
}

 ?>
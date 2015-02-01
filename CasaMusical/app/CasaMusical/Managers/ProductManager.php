<?php 

namespace CasaMusical\Managers;

class ProductManager extends BaseManager
{
	public function getRules(){
		$rules = array(
					'product' 		=> 'required',
					'model'	  		=> 'required',
					'price'	  		=> 'required',
					'gain'	  		=> 'required',
					'price_iva'		=> 'required',
					'reserve'		=> 'required',
					'reorderpoint'	=> 'required'		
				);
		return $rules;
	}
}

 ?>
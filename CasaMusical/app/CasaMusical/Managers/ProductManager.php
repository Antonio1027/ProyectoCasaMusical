<?php 

namespace CasaMusical\Managers;

class ProductManager extends BaseManager
{
	public function getRules(){
		$rules = array(
					'product' 		=> 'required',
					'model'	  		=> 'required',
					'price_iva'		=> 'required | numeric',					
					'price'	  		=> 'required | numeric',					
					'price_sale'	=> 'required | numeric',
					'reserve'		=> 'required | numeric',
					'reorderpoint'	=> 'required | numeric',
					'key'			=> 'required | unique:products,key,' . $this->entity->id,
					'provider_id'	=> 'required'
				);
		return $rules;
	}

	public function prepareData($data){		
		if(isset($data['price']) && isset($data['price_iva']) && isset($data['price_sale'])){
			$this->entity->gain_min = (float)$data['price'] - (float)$data['price_iva'];
			$this->entity->gain_max = (float)$data['price_sale'] - (float)$data['price_iva'];
		}	

		return $data;
	}
}

 ?>
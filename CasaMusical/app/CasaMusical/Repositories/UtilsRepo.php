<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Product;
use CasaMusical\Entities\Provider;

class UtilsRepo extends \Eloquent
{
	public function allProducts($product){		
		return Product::where('product','LIKE','%'.$product.'%')
						->orderBy('id','Asc')
						->get();
	}

	public function reorderPointProducts($product){
		return Product::where('status','=','pr')
						->where('product','LIKE','%'.$product.'%')
						->get();
	} 
	public function providersList(){		
		return Provider::lists('name','id');
	}
}

 ?>

<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Product;

class UtilsRepo extends \Eloquent
{
	public function allProducts($product){		
		return Product::where('product','LIKE','%'.$product.'%')->get();
	}

	public function reorderPointProducts($product){
		return Product::where('status','=','pr')
						->where('product','LIKE','%'.$product.'%')
						->get();
	} 
}

 ?>
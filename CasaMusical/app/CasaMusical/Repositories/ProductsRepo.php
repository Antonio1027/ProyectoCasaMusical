<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Product;

class ProductsRepo extends \Eloquent
{
	public function newProduct(){
		$product = new Product();
		$product->status = 'r';
		return $product;
	}
	public function findProduct($id){
		return Product::find($id);		
	}
}

 ?>
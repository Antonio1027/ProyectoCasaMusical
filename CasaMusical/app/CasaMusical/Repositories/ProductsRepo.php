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

	public function deleteProduct($id){
		$producto = Product::find($id);
		if($producto)
			return $producto->delete();
		else
			return false;
	}

	public function productsByProvider($id){
		$products = Product::where('provider_id','=',$id)->get();
		return $products;
	}
}

 ?>
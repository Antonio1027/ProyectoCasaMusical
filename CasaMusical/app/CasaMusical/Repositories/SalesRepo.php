<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Sale;

class SalesRepo extends \Eloquent
{
	public function allSales(){
		return Sale::all();
	}	

	public function newSale($product,$quantity){
		$sale = new Sale();	
		$sale->product = $product->product;
		$sale->model = $product->model;
		$sale->quantity = $quantity;
		$sale->price = $product->price;
		$sale->total = $product->price * $quantity;
		return $sale;		
	}
}

 ?>
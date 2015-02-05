<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Sale;

class SalesRepo extends \Eloquent
{
	public function allSales(){
		return Sale::orderBy('created_at','Desc')->get();
	}	

	public function newSale($product,$quantity,$date){
		$sale = new Sale();	
		$sale->product = $product->product;
		$sale->model = $product->model;
		$sale->quantity = $quantity;
		$sale->price = $product->price_iva;
		$sale->total = $product->price_iva * $quantity;
		$sale->date = $date;
		return $sale;		
	}
}

 ?>
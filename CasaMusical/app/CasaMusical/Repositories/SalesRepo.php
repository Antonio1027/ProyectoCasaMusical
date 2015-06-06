<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Sale;

class SalesRepo extends \Eloquent
{
	public function allSales(){
		return Sale::join('products','sales.product_id','=','products.id')
					->orderBy('sales.created_at','Desc')
					->select('sales.*','products.price_iva','products.product','products.model')
					->get();
	}	

	public function newSale($product,$quantity,$date,$discount){
		$sale = new Sale();	
		$sale->product_id = $product->id;		
		$sale->quantity = $quantity;		
		$sale->total = $product->price_iva * $quantity;
		$sale->total_discount = $sale->total - $discount;
		$sale->date = $date;
		return $sale;		
	}

	public function findSale($id){
		return Sale::find($id);		
	}
}

 ?>
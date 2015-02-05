<?php 

use CasaMusical\Repositories\SalesRepo;
use CasaMusical\Repositories\ProductsRepo;

class SalesController extends BaseController
{
	protected $salesRepo;
	protected $producsRepo;
	function __construct(SalesRepo $salesRepo, ProductsRepo $productsRepo)
	{
		$this->salesRepo = $salesRepo;
		$this->productsRepo = $productsRepo;
	}

	public function Sales(){
		$sales = $this->salesRepo->allSales();
		if($sales)
			return Response::json($sales,200);			
		else
			return Response::json(array('msg' =>'No se encontraron ventas'),404);
	}

	public function newSale(){
		$data = Input::all();				
		$product = $this->productsRepo->findProduct($data['id']);
		if($product && $data){
			$reserve = $product->reserve - $data['quantity'];
			if($reserve >=  0){				
				$sale = $this->salesRepo->newSale($product,$data['quantity']);	
				$product->reserve = $reserve;
				if($sale->save() && $product->save())
					return Response::json(array('msg'=>'Venta registrada'),201);

				return Response::json(array('msg'=>'Venta no registrada'),422);
			}		
			else
				return Response::json(array('msg'=>'No hay articulos suficientes para realizar la venta'),422);				
		}
		else return Response::json(array('msg','Producto no encontrado'),404);
	}
}

 ?>
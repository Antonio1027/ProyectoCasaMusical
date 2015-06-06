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
				$sale = $this->salesRepo->newSale($product,(float)$data['quantity'],$data['date'],(float)$data['discount']);					
				if(isset($data['discount'])){
					$sale->discount = (float)$data['discount'];					
				}
				else
					$sale->discount = 0;

				$product->reserve = $reserve;

				if($product->reserve <= $product->reorderpoint)
					$product->status = 'pr';

				if($sale->save() && $product->save())
					return Response::json(array('msg'=>'Venta registrada'),201);

				return Response::json(array('msg'=>'Venta no registrada'),422);
			}		
			else
				return Response::json(array('msg'=>'No hay articulos suficientes para realizar la venta'),422);				
		}
		else return Response::json(array('msg','Producto no encontrado'),404);
	}

	public function restoreSale($id){
		$sale = $this->salesRepo->findSale($id);		
		if($sale){
			$product = $this->productsRepo->findProduct($sale->product_id);					
			if($sale->delete() && $product){
				$product->reserve = $product->reserve + $sale->quantity;

				if($product->reserve > $product->reorderpoint)
					$product->status = 'r';
				else
					$product->status = 'pr';

				if($product->save())
					return Response::json(array('msg'=>'Venta eliminada'),201);				
				else
					return Response::json(array('msg'=>'Ocurrion en error al eliminar. Intente mas tarde'),201);
			}
			else
				return Response::json(array('msg','Ocurrio un error intente más tarde'),404);
		}
		else
			return Response::json(array('msg'=>'No se encontraron resultados'),422);
	}
	
}

 ?>
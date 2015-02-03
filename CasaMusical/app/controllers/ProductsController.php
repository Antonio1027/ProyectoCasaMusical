<?php 

use CasaMusical\Repositories\ProductsRepo;
use CasaMusical\Managers\ProductManager;

class ProductsController extends BaseController
{
	protected $productRepo;
	function __construct(ProductsRepo $productRepo)
	{		
		$this->productRepo = $productRepo;
	}
	
	public function newProduct(){		
		$data = Input::all();					
		$product = $this->productRepo->newProduct();
		$manager = new ProductManager($product,$data);		
		if($manager->save()){
			return Response::json(array('status'=>'success','msg'=>'Producto registrado'));
		}
		return Response::json(array('status'=>'Error','Errors'=>$manager->getErrors()));
	}

	public function editProduct($id){
		$product = $this->productRepo->findProduct($id);
		if($product)
			return Response::json($product);
		return Response::json(array('status'=>'Error','errors'=>'Articulo no encontrado'));
	}
}
 ?>
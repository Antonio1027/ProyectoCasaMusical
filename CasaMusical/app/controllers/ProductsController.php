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
			return Response::json(array('status'=>'success','msg'=>'Producto registrado'),201);//recurso creado
		}
		return Response::json(array('status'=>'Error','Errors'=>$manager->getErrors()),400);//solicitud no procesada
	}

	public function editProduct($id){
		$product = $this->productRepo->findProduct($id);
		if($product){
			Session::put('id_product',$product->id);
			return Response::json($product,200);//peticion exitosa
		}	
		return Response::json(array('status'=>'Error','errors'=>'Articulo no encontrado'),404);//recurso no encontrado
	}

	public function deleteProduct($id){
		$product = $this->productRepo->deleteProduct($id);
		if($product)		
			return Response::json(array('status'=>'success','msg'=>'Producto eliminado'),200);//peticion exitosa

		return Response::json(array('status'=>'error','msg'=>'No pudo eliminarse el producto'),400);//no hay connido para responder
	}

	public function updateProduct(){		
		$data = Input::all();
		$product = $this->productRepo->findProduct(Session::get('id_product'));		
		$manager = new ProductManager($product,$data);
		if($manager->save())
			return Response::json(array('status'=>'success','msg'=>'Producto actualizado'),200);//peticion exitosa
		return Response::json(array('status'=>'error','msg'=>$manager->getErrors()),422);//error de validacion
	}
}
 ?>
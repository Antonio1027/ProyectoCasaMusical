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
		if(isset($data['provider_id']['id']))
			$data['provider_id'] = $data['provider_id']['id'];
		$product = $this->productRepo->newProduct();
		$manager = new ProductManager($product,$data);		
		if($manager->save()){
			return Response::json(array('msg'=>'Producto registrado'),201);//recurso creado
		}
		return Response::json(array('errors'=>$manager->getErrors()),422);//solicitud no procesada
	}

	public function editProduct($id){

		$product = $this->productRepo->findProduct($id);
		if($product){
			return Response::json($product,200);//peticion exitosa
		}	
		return Response::json(array('msg'=>'Articulo no encontrado'),404);//recurso no encontrado
	}

	public function deleteProduct($id){
		$product = $this->productRepo->deleteProduct($id);
		if($product)		
			return Response::json(array('msg'=>'Producto eliminado'),200);//peticion exitosa

		return Response::json(array('msg'=>'No pudo eliminarse el producto'),404);//no hay connido para responder
	}

	public function updateProduct(){		
		$data = Input::all();
		$product = $this->productRepo->findProduct($data['id']);		
		$manager = new ProductManager($product,$data);
		if($manager->save())
			return Response::json(array('msg'=>'Producto actualizado'),200);//peticion exitosa
		return Response::json(array('errors'=>$manager->getErrors()),422);//error de validacion
	}	
}
 ?>
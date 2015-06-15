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
			Session::put('product_id',$product->id);
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
		if(isset($data['provider_id']['id']))
			$data['provider_id'] = $data['provider_id']['id'];		

		$product = $this->productRepo->findProduct(Session::get('product_id'));				
		
		if((int)$data['reserve'] > (int)$data['reorderpoint'])
			$data['status'] = 'r';
		else 
			$data['status'] = 'pr';

		$manager = new ProductManager($product,$data);
		if($manager->save())
			return Response::json(array('msg'=>'Producto actualizado'),200);//peticion exitosa
		else
			return Response::json(array('errors'=>$manager->getErrors()),422);//error de validacion
	}

	public function productsByProvider($provider_id){
		$products = $this->productRepo->productsByProvider($provider_id);									
		if($products->count())
			return Response::json($products,200);//peticion exitosa
		else
			return Response::json(array('msg'=>'No se encontraron resultados'),200);//peticion exitosa
	}	
}
 ?>
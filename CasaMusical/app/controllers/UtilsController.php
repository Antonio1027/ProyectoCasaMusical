<?php

use CasaMusical\Repositories\UtilsRepo;

class UtilsController extends BaseController
{
	protected $utilRepo;
	function __construct(UtilsRepo $utilRepo)
	{		
		$this->utilRepo = $utilRepo;
	}

	public function products(){				
		$product = Input::get('product');
		$products = $this->utilRepo->AllProducts($product);		
		if($products)
			return Response::json($products,200);
		else
			return Response::json(array('msg'=>'No se encontraron productos'),404);
		return Response::json($products);
	}

	public function providersList(){		
		$providersList = $this->utilRepo->providersList();
		if($providersList)
			return Response::json($providersList,200);
		return Reponse::json(array('msg'=>'No se encontraron proveedores'),404);
	}
}

 ?>
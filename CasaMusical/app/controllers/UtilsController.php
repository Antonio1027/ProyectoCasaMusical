<?php

use CasaMusical\Repositories\UtilsRepo;
use CasaMusical\Repositories\ProvidersRepo;

class UtilsController extends BaseController
{
	protected $utilRepo,$providersRepo;
	function __construct(UtilsRepo $utilRepo, ProvidersRepo $providersRepo)
	{		
		$this->utilRepo = $utilRepo;
		$this->providersRepo = $providersRepo;
	}

	public function products(){				
		$product = Input::get('product');

		$providers = $this->providersRepo->allProviders();		
		$products = $this->utilRepo->AllProducts($product);		

		if($products)
			return Response::json(array($products,$providers),200);
		else
			return Response::json(array('msg'=>'No se encontraron productos'),404);		
	}

	// public function providersList(){		
	// 	$providersList = $this->utilRepo->providersList();
	// 	if($providersList)
	// 		return Response::json($providersList,200);
	// 	return Reponse::json(array('msg'=>'No se encontraron proveedores'),404);
	// }
}

 ?>
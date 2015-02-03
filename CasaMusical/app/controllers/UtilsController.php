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
		return Response::json($products);
	}		
	public function reorderPointProducts(){
		$product = Input::get('product');
		$products = $this->utilRepo->reorderPointProducts($product);
		return Response::json($products->count());
	}
}

 ?>
<?php 

use CasaMusical\Repositories\ReportsRepo;

class ReportsController extends BaseController
{
	protected $reportsRepo;
	function __construct(ReportsRepo $reportsRepo)
	{
		$this->reportsRepo = $reportsRepo;
	}

	public function ordersReport(){
		$products = $this->reportsRepo->orders();		
		$data = $products->toArray();
		if($products->count()){
			$html = View::make('reports/ordersReport',compact('data'));
			return PDF::load($html,'A4','landscape')->show();
		}	
		else 
			return Redirect::back();
	}

	public function productsCatalog(){
		$products = $this->reportsRepo->productsCatalog();
		if($products->count()){
			$html = View::make('reports/productsCatalog',compact('products'));
			return PDF::load($html,'A4','landscape')->download();
		}
		else
			return Redirect::back();
	}
	
}

 ?>
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
		if($products){
			$html = View::make('reports/ordersReport',compact('products'));
			return PDF::load($html,'A4','portrait')->show();
		}	
		else 
			return Response::json(array('msg'=>'No se encontraron resultados'));
	}
	
}

 ?>
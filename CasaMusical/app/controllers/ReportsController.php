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
		set_time_limit(0);		
		if($products->count()){
			$html = View::make('reports/ordersReport',compact('data'));
			return PDF::load($html,'A4','landscape')->show();
		}	
		else 
			return Redirect::back();
	}

	public function productsCatalog(){

		function sputcsv($row,$delimiter = ',',$enclosure = '"', $eol = "\n"){
			static $fp = false;
			if($fp === false){
				$fp = fopen('php://temp','r+');
			}
			else
				rewind($fp);

			if(fputcsv($fp,$row,$delimiter,$enclosure) === false)
				return false;

			rewind($fp);
			$csv = fgets($fp);

			if($eol != PHP_EOL){
				$csv = substr($csv, 0,(0 - strlen(PHP_EOL))). $eol;
			}

			return $csv;
		}		


		$products = $this->reportsRepo->productsCatalog();		
		$data = $products->toArray();				
		
		if(PHP_EOL == "\r\n")
		{
			$eol = "\n";
		}
		else{
			$eol = "\r\n";
		}

		$csv_output = '';		

		foreach ($data as $key => $product) {			
			$product = array('index' => $key + 1) + $product;			
			$product['price'] = number_format($product['price'],2,'.',',');			
			$csv_output .=  sputcsv($product,',','"',$eol);
		}

		$filename = 'export_'.date('Y-m-d_H-i',time());
		header("Content-type: application/vnd.ms-excel");
		header("Content-disposition: csv" . date("Y-m-d") . ".csv");
		header("Content-disposition: filename=".$filename.".csv");
		print $csv_output;		
		exit;		
	}
	
}

 ?>
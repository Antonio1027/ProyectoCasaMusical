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
		$ordersByProvider = $this->reportsRepo->orders();		
		$data = $ordersByProvider->toArray();		
		set_time_limit(0);		
		if(count($data)){			
			$html = View::make('reports/ordersReport',compact('data'));
			return PDF::load($html,'A4','portrait')->show();
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

		$labels = array(
						array('#',
							'CLABE',
							'ARTICULO',
							'MODELO',
							'PRECIO CON IVA',
							'GANANCIA MINIMA',
							'PRECIO MINIMO',
							'GANANCIA',
							'PRECIO DE VENTA',
							'RESERVA',
							'PROVEEDORr',));

		$data =$labels + $products->toArray();	
		
		if(PHP_EOL == "\r\n")
		{
			$eol = "\n";
		}
		else{
			$eol = "\r\n";
		}

		$csv_output = '';		

		foreach ($data as $key => $product) {			
			$product = $product + array($eol);
			if($key > 0){
				$product = array('index' => $key) + $product + array($eol);					
				$product['price_iva'] = number_format($product['price_iva'],2,'.',',');
				$product['price'] = number_format($product['price'],2,'.',',');
				$product['price_sale'] = number_format($product['price_sale'],2,'.',',');
				$product['gain_min'] = number_format($product['gain_min'],2,'.',',');
				$product['gain_max'] = number_format($product['gain_max'],2,'.',',');
			}	
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
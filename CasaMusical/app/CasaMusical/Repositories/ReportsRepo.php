<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Product;

class ReportsRepo extends \Eloquent
{
		public function orders()
		{
			return Product::where('status','=','pr')
							->get();
		}

		public function productsCatalog()
		{
			return Product::where('reserve','>',0)
							->get();
		}
}

 ?>
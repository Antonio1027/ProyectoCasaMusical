<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Product;

class ReportsRepo extends \Eloquent
{
		public function orders()
		{
			return Product::join('providers','providers.id','=','products.provider_id')
							->select('products.*','providers.name','providers.delivery_time','providers.home')			
							->where('status','=','pr')
							->get();
		}

		public function productsCatalog()
		{
			return Product::where('reserve','>',0)
							->get();
		}
}

 ?>
<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Product;

class ReportsRepo extends \Eloquent
{
		public function orders()
		{
			return Product::join('providers','providers.id','=','products.provider_id')
							->select('products.reserve',
									 'products.product',
									 'products.price',
									 'providers.name',
									 'providers.delivery_time')			
							->where('status','=','pr')
							->orderBy('products.product','Asc')
							->get();
		}

		public function productsCatalog()
		{
			return Product::join('providers','providers.id','=','products.provider_id')
							->select('products.reserve',
									 'products.product',
									 'products.price',
									 'products.id',
									 'providers.name',
									 'providers.delivery_time')
							->orderBy('products.product','Asc')
							->get();
		}
}

 ?>
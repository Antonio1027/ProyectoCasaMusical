<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Product;
use CasaMusical\Entities\Provider;

class ReportsRepo extends \Eloquent
{
		public function orders()
		{
			return Provider::with(array('getproducts' => function($query){
								$query->where('reserve','<=','reorderpoint');
							}))
							->get();
		}

		public function productsCatalog()
		{
			return Product::join('providers','providers.id','=','products.provider_id')
							->select('products.key',
									 'products.product',
									 'products.model',
									 'products.price_iva',									 
									 'products.gain_min',
									 'products.price',
									 'products.gain_max',
									 'products.price_sale',
									 'products.reserve',
									 'providers.name')
							->where('reserve','>',0)
							->orderBy('products.product','Asc')
							->get();
			// return Product::limit(2)->get();
		}
}

 ?>
<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Provider;

class ProvidersRepo extends \Eloquent
{	
	public function newProvider(){		
	}

	public function findProvider($id){
		return Provider::find($id);
	}

		
}

 ?>
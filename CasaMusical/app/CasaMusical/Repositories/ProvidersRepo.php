<?php 

namespace CasaMusical\Repositories;
use CasaMusical\Entities\Provider;

class ProvidersRepo extends \Eloquent
{	
	public function allProviders(){
		return Provider::all();
	}	

	public function newProvider(){
		$provider = new Provider();
		return $provider;
	}

	public function findProvider($id){
		return Provider::find($id);
	}
	public function deleteProvider($id){
		$provider = Provider::find($id)->delete();
		return $provider;
	}

}

 ?>
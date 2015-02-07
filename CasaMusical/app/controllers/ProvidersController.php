<?php 

use CasaMusical\Repositories\ProvidersRepo;

class ProvidersController extends BaseController
{
	protected $providersRepo;

	function __construct(ProvidersRepo $providersRepo)
	{
		$this->providersRepo = $providersRepo;
	}

	public function newProvider(){		
		$data = Input::all();
		$provider = $this->providersRepo->newProvider();
		$manager = new ProviderManager($provider,$data);
		if($manager->save())
			return Response::json(array('msg'=>'Proveedor registrado'),201);		
		return Response::json(array('msg'=>$manager->getErrors()),422);
	}

	public function editProvider($id){
		$provider = $this->providersRepo->findProvider($id);
		if($provider)
			return Response::json($provider,200);
		return Response::json(array('msg'=>'No se encontro proveedor'),404);
	}

	public function updateProvider(){

	}
	public function deleteProvider(){
		
	}

}

 ?>
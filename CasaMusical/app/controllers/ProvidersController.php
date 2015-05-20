<?php 

use CasaMusical\Repositories\ProvidersRepo;
use CasaMusical\Managers\ProviderManager;

class ProvidersController extends BaseController
{
	protected $providersRepo;

	function __construct(ProvidersRepo $providersRepo)
	{
		$this->providersRepo = $providersRepo;
	}

	public function providers(){		
		$providers = $this->providersRepo->allProviders();		
		// dd($providers);
		if($providers)
			return Response::json($providers,200);
		return Response::json(array('msg'=>'No se encontraron registros'),404);
	}

	public function newProvider(){			
		$data = Input::all();
		$provider = $this->providersRepo->newProvider();
		$manager = new ProviderManager($provider,$data);		
		if($manager->save())
			return Response::json(array('msg'=>'Proveedor registrado'),201);		
		return Response::json(array('errors'=>$manager->getErrors()),422);
	}

	public function editProvider($id){
		$provider = $this->providersRepo->findProvider($id);
		if($provider){
			Session::put('provider_id',$provider->id);
			return Response::json($provider,200);
		}	
		return Response::json(array('msg'=>'No se encontro proveedor'),404);
	}

	public function updateProvider(){
		$data = Input::all();				
		$provider = $this->providersRepo->findProvider(Session::get('provider_id'));
		$manager = new ProviderManager($provider,$data);
		if($manager->save()){
			Session::forget('provider_id');
			return Response::json(array('msg'=>'Datos actualizados'),200);
		}
		return Response::json(array('errors'=>$manager->getErrors()),422);
	}
	public function deleteProvider($id){			
		$provider = $this->providersRepo->deleteProvider($id);
		if($provider)
			return Response::json(array('msg'=>'Proveedor eliminado'),200);
		else
			return Response::json(array('msg'=>'Proveedor no eliminado'),400);
	}

}

 ?>
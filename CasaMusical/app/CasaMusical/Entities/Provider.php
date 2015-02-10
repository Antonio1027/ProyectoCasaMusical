<?php
namespace CasaMusical\Entities;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Provider extends \Eloquent {

	use SoftDeletingTrait;

	protected $dates = array('deleted_at');
	
	protected $fillable = [
							'name',
							'home',
							'phone',
							'delivery_time',
							'description'];
	public function getproducts(){
		return $this->hasMany('CasaMusical\Entities\Product','provider_id');
	}						
}
<?php
namespace CasaMusical\Entities;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends \Eloquent {

	use SoftDeletingTrait;

	protected $dates = array('deleted_at');

	protected $fillable = array(
							'product',
							'model',
							'price',
							'gain',
							'price_iva',
							'reorderpoint',
							'reserve',
							'key',
							'provider_id',
							'status');
	public function getsales(){
		return $this->hasMany('CasaMusical\Entities\Sale','product_id');
	}
	public function getprovider(){
		return $this->belongsTo('CasaMusical\Entities\Provider','provider_id');	
	}
}
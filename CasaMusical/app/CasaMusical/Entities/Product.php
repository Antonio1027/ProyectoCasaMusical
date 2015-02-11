<?php
namespace CasaMusical\Entities;
class Product extends \Eloquent {
	protected $fillable = array(
							'product',
							'model',
							'price',
							'gain',
							'price_iva',
							'reorderpoint',
							'reserve',
							'key',
							'provider_id');
	public function getsales(){
		return $this->hasMany('CasaMusical\Entities\Sale','product_id');
	}
	public function getprovider(){
		return $this->belongsTo('CasaMusical\Entities\Provider','provider_id');	
	}
}
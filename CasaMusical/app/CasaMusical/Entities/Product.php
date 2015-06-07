<?php
namespace CasaMusical\Entities;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends \Eloquent {

	use SoftDeletingTrait;

	protected $dates = array('deleted_at');

	protected $fillable = array(
							'key',
							'product',
							'model',
							'price_iva',
							'gain_min',
							'price',
							'gain_max',
							'price_sale',
							'reorderpoint',
							'reserve',
							'status',
							'provider_id');
	public function getsales(){
		return $this->hasMany('CasaMusical\Entities\Sale','product_id');
	}
	public function getprovider(){
		return $this->belongsTo('CasaMusical\Entities\Provider','provider_id');	
	}
}
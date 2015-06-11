<?php

namespace CasaMusical\Entities;

class Sale extends \Eloquent {
	protected $fillable = [							
							'quantity',
							'total',
							'discount',
							'total_discount',							
							'product_id'
						];	
	public function getproduct(){
		return $this->belongsTo('CasaMusical\Entities\Product','product_id');
	}						
}
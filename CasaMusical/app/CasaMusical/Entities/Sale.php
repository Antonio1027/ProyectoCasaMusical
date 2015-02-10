<?php

namespace CasaMusical\Entities;

class Sale extends \Eloquent {
	protected $fillable = [
							'product',
							'model',
							'quantity',
							'price',
							'total',
							'product_id'
						];		
}
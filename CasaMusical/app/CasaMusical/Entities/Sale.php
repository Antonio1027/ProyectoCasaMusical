<?php

namespace CasaMusical\Entities;

class Sale extends \Eloquent {
	protected $fillable = array(
								'product',
								'model',
								'quantity',
								'price',
								'gain');
}
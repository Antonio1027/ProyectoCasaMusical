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
}
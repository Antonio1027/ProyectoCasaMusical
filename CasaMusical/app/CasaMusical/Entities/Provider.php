<?php
namespace CasaMusical\Entities;
class Provider extends \Eloquent {
	protected $fillable = [
							'name',
							'home',
							'phone',
							'delivery_time',
							'description'];
}
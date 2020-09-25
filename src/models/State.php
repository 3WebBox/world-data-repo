<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
   * Table name.
   *
   * @var string
  */
  protected $table = "states";


 /**
	* Get Country
 */
	public function country(){
		return $this->belongsTo('App\Models\Country','country_id','id');
	}
}

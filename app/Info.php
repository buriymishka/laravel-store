<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

	public $table = "info";

	protected $fillable = ['phone', 'address', 'email'];


}

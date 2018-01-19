<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
	
	protected $dates=['deleted_at'];
	
	protected $fillable = [
        'email','role_id','fname', 'lname', 'birth_date','gender','hired_date','phone',
		'street','town','city','country'
    ];
	
	public function user(){
		return $this->hasOne('App\User');
	}
	
	public function role(){
		return $this->belongsTo('App\Role');
	}
	
	public function getFullName(){
		return "{$this->fname} {$this->lname}";
	}
}
 
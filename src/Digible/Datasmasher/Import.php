<?php namespace Digible\DataSmasher;

use Illuminate\Database\Eloquent\Model;

class Import extends Model {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = [];

    protected $table = 'ds_imports';

    public function upload()
    {
        return $this->belongsTo('App\\Upload');
    }

    public function createdByPerson()
    {
        return $this->belongsTo('PeopleDBPerson', 'created_by');
    }

    public function updatedByPerson()
    {
        return $this->belongsTo('PeopleDBPerson', 'updated_by');
    }

    public function processes()
    {
        return $this->hasMany('Digible\DataSmasher\ImportProcess');
    }

}
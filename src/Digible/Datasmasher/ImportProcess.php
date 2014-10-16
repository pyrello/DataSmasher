<?php namespace Digible\DataSmasher;

class ImportProcesses extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = [];

    public function createdByPerson()
    {
        return $this->belongsTo('PeopleDBPerson', 'created_by');
    }

    public function updatedByPerson()
    {
        return $this->belongsTo('PeopleDBPerson', 'updated_by');
    }

    public function import()
    {
        return $this->belongsTo('App\\Import');
    }

}
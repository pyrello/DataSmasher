<?php

class DataSourcesController extends \BaseController {

	/**
	 * Display a listing of datasources
	 *
	 * @return Response
	 */
	public function index()
	{
		$datasources = Datasource::all();

		return View::make('datasources.index', compact('datasources'));
	}

	/**
	 * Show the form for creating a new datasource
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('datasources.create');
	}

	/**
	 * Store a newly created datasource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Datasource::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Datasource::create($data);

		return Redirect::route('datasources.index');
	}

	/**
	 * Display the specified datasource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$datasource = Datasource::findOrFail($id);

		return View::make('datasources.show', compact('datasource'));
	}

	/**
	 * Show the form for editing the specified datasource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$datasource = Datasource::find($id);

		return View::make('datasources.edit', compact('datasource'));
	}

	/**
	 * Update the specified datasource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$datasource = Datasource::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Datasource::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$datasource->update($data);

		return Redirect::route('datasources.index');
	}

	/**
	 * Remove the specified datasource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Datasource::destroy($id);

		return Redirect::route('datasources.index');
	}

}

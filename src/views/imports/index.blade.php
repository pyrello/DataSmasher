<p>{{ link_to_route('admin.data.imports.create', 'Start an Import', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($imports->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Created by</th>
				<th>Updated by</th>
				<th>Status</th>
				<th>Created</th>
                <th>Updated</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($imports as $import)
				<tr>
					<td>{{{ $import->id }}}</td>
					<td>{{{ $import->created_by_person->display_name }}}</td>
					<td>{{{ $import->updated_by_person->display_name }}}</td>
					<td>{{{ $import->status }}}</td>
					<td>{{{ $import->created_at->format('Y-m-d') }}}</td>
					<td>{{{ $import->updated_at->format('Y-m-d') }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.data.imports.destroy', $import->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.data.imports.show', 'View', array($import->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no imports
@endif
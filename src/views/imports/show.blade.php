<div>Created by: {{ $import->created_by_person->display_name }}</div>
<input type="hidden" class="import-id" data-id="{{ $import->id }}">
@if($import->status === 'created')
<h2 class="status">Status: <span data-status="{{ $import->status }}" class="label label-info">Created</span></h2>
<p>Your import has been created, but the data has not been extracted from it yet. Click the button below to queue your import for having data extracted.</p>
{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'POST', 'route' => array('admin.data.imports.extract', $import->id))) }}
    {{ Form::submit('Add to queue', array('class' => 'btn btn-primary btn-lg')) }}
{{ Form::close() }}
@elseif($import->status === 'queued')
<h2 class="status">Status: <span data-status="{{ $import->status }}" class="label label-warning">Queued</span></h2>
<p>Your import has been queued for data extraction. The amount of time the data extraction will take is based on the size of the file. Check back here to see if your data extraction has been completed and your import processing can continue.</p>
@elseif($import->status === 'extracting')
<h2 class="status">Status: <span data-status="{{ $import->status }}" class="label label-warning">Extracting Data</span></h2>
<p>Your data is being extracted. The amount of time the data extraction will take is based on the size of the file. Check back here to see if your data extraction has been completed and your import processing can continue.</p>
@elseif($import->status === 'extracted')
<h2 class="status">Status: <span data-status="{{ $import->status }}" class="label label-warning">Data Extracted</span></h2>
<p>Your data has been extracted. Please match the header fields from your upload to our fields so that we know how to process your import.</p>
<div id="section-match-fields">
    <h2>Match Fields</h2>
    {{ Form::open(['id' => 'match-fields']) }}
    @if(!is_null($import->fields))
    <table class="table table-striped">
    @foreach(json_decode($import->fields) as $header)
    <tr>
        <td>{{ $header }}</td>
        <td>{{ Form::select('column-' . str_replace(' ', '-', $header), $columns, null, ['class' => 'form-control']) }}</td>
    </tr>
    @endforeach

    </table>
    @endif
    {{ Form::submit('Match', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
</div>
@endif
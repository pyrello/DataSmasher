<div class="row">
    <div class="col-sm-12">
    <p>Upload a spreadsheet containing the data that you wish to update.</p>
        <div class="well">
            {{ Form::open([
                "route"        => 'admin.data.imports.store',
                "autocomplete" => "off",
                'class' => 'form-inline',
                'files' => true,
            ]) }}
            <div class="form-group">
                {{ Form::file('upload') }}
            </div>
            {{ HTML::decode(Form::button('<i class="icon-cloud-upload"></i> Upload File', [
                'class' => 'btn btn-primary',
                'type' => 'submit',
            ])) }}
            {{ Form::close() }}
            <p class="help-block">Allowed file extensions: {{ implode(', ', $allowed_extensions) }} <br />
                Maximum file size: {{ ini_get('post_max_size') }}</p>
        </div>
    </div>
</div>
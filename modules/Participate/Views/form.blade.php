<form action="" method="post" id="participate-form">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-3">
            <label for="name">{{ trans('Name') }}</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? old('name') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="name">{{ trans('Image') }}</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" class="form-control" id="logo" name="image"
                       value="{{ $data->image ?? NULL }}">
                <div class="input-group-prepend">
                    <button class="btn btn-primary btn-elfinder" type="button">
                        {{ trans('Open File Manager') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\Participate\Requests\ParticipateRequest','#participate-form') !!}

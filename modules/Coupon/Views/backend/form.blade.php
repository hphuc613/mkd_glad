<form action="" method="post" id="coupon-form">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-3">
            <label for="name">{{ trans('Code') }}</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" id="code" name="code" value="{{ $data->code ?? old('code') }}">
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
    <div class="form-group row">
        <div class="col-md-3">
            <label for="name">{{ trans('Date') }}</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control datetime-modal-form" id="date" name="date" value="{{ $data->date ?? old('date') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="status">{{ trans('Status') }}</label>
        </div>
        <div class="col-md-9">
            @php($prompt = ['' => trans('Select')])
            {!! Form::select('status', $prompt + $statuses, $data->status ?? NULL, [
                'id' => 'status',
                'class' => 'select2 form-control',
                'style' => 'width: 100%']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="description">{{ trans('Description') }}</label>
        </div>
        <div class="col-md-9">
            <textarea name="description" id="description" class="form-control"
                      rows="5">{{ $data->description ?? NULL }}</textarea>
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\Coupon\Requests\CouponRequest','#coupon-form') !!}
<script !src="">
    var lang = $('html').attr('lang');
    $('input.datetime-modal-form').datetimepicker({
        format: 'dd-mm-yyyy hh:ii',
        fontAwesome: true,
        autoclose: true,
        todayHighlight: true,
        todayBtn: true,
        language: lang,
    });
</script>

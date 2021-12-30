<form action="" method="post" id="voucher-form">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-3">
            <label for="code">{{ trans('Code') }}</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" id="code" name="code" value="{{ $data->code ?? old('code') }}">
        </div>
    </div>
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
            <label for="type">{{ trans('Voucher type') }}</label>
        </div>
        <div class="col-md-9">
            {!! Form::select('type',['1'=>trans('Raw Money').' ($)', '2'=>trans('Percent').' (%)'],$data->type ?? 1, [
               'id' => 'type',
               'class' => 'select2 form-control',
               'style' => 'width: 100%']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="value">{{ trans('Value') }}</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" class="form-control" id="value" name="value"
                       value="{{ $data->value ?? old('value') }}">
                <div class="input-group-prepend">
                    <button class="btn btn-default" id="btn-type" type="button">
                        {{($data->type ?? 1) == 1 ? '$' : '%' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="expiration_date">{{ trans('Expiration Date') }}</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control datetime-modal-form" id="expiration_date" name="expiration_date"
                   value="{{ $data->expiration_date ?? old('expiration_date') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="description">{{ trans('Description') }}</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" id="description" name="description"
                   value="{{ $data->description ?? old('description') }}">
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
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\Voucher\Requests\VoucherRequest','#voucher-form') !!}
<script !src="">
    var lang = $('html').attr('lang');
    var datetime = $('input.datetime-modal-form');
    datetime.attr('autocomplete', "off");
    datetime.datetimepicker({
        format: 'dd-mm-yyyy hh:ii',
        fontAwesome: true,
        autoclose: true,
        todayHighlight: true,
        todayBtn: true,
        language: lang,
    });
    $(document).on('change', '#type', function (event) {
        if ($(this).val() == 1) {
            $('#btn-type').text('$');
        }
        if ($(this).val() == 2) {
            $('#btn-type').text('%');
        }
    })
</script>

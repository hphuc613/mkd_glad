<form action="" method="post" class="form-material" id="offer-form" enctype=multipart/form-data>
    @csrf
    @php($prompt = ['' => trans('Select')])
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="name" class="title">{{ trans('Name') }}</label>
                <input type="text" class="form-control form-control-line" id="name" name="name"
                       value="{{ $data->name ?? null }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="month" class="title">{{ trans('Month') }}</label>
                <input type="text" class="form-control datetime-modal-form" id="month" name="month"
                       value="{{ $data->month ?? old('month') }}">
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label for="ckeditor" class="title">{{ trans('Description') }}</label>
                <textarea name="description" id="ckeditor">{{ $data->description ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="image" class="title">{{ trans('Image') }}</label>
                <input type="file" id="image" class="dropify" name="image"
                       data-default-file="{{ asset($data->image ?? null) }}"/>
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label for="product-select" class="title">{{ trans('Product Listing') }}</label>
                <div class="select-course w-100">
                    {!! Form::select('product_ids', [null => trans("Select Product")] + $product, null, [
                    'id' => 'product-select',
                    'class' => 'select2 form-control select-product',
                    'style' => 'width: 100%']) !!}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="product-list">
                    <thead>
                    <tr>
                        <th>{{ trans('Product Name') }}</th>
                        <th class="text-center">{{ trans('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data))
                        @foreach($bundles as $item)
                            @if(!empty($item))
                                <tr class="pl-2">
                                    <td>
                                        <input type="hidden" name="product_ids[]" value="{{ $item->id }}">
                                        <span class="text-option">{{ $item->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger delete-product"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
@push('js')
    {!! JsValidator::formRequest('Modules\Offer\Requests\OfferRequest','#offer-form') !!}

    <script !src="">
        $(document).ready(function () {
            $('.dropify').dropify();
        })
        var datetime = $('input.datetime-modal-form');
        datetime.attr('autocomplete', "off");
        datetime.datetimepicker({
            format: 'mm-yyyy',
            fontAwesome: true,
            startView: 'year',
            minView: 'year',
            autoclose: true,
            language: lang,
        });

        $(document).on('change', '.select-product', function () {
            var product = $(this);
            var html =
                '<tr id="' + product.val() + '">' +
                '<td>' +
                '<input type="hidden" name="product_ids[]" value="' + product.val() + '">' +
                '<span class="text-option">' + product.children(':selected').text() + '</span>' +
                '</td>' +
                '<td class="text-center"><button type="button" class="btn btn-danger delete-product"><i class="fas fa-trash"></i></button></td>' +
                '</tr>';
            $("#product-list tbody").append(html);
            product.children(':selected').remove();
        });

        /** Delete product*/
        $(document).on('click', '.delete-product', function () {
            var tr_parent = $(this).parents('tr');
            var value = tr_parent.attr('id');
            var option = tr_parent.find('.text-option').html();
            var html = '<option value="' + value + '">' + option + '</option>';
            $(document).find('#product-select').append(html);
            $(this).parents('tr').remove();
        });
    </script>

@endpush

<form action="" method="post" id="product-form" enctype=multipart/form-data>
    @csrf
    @php($prompt = ['' => trans('Select')])
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name" class="title">{{ trans('Name') }}</label>
                <input type="text" class="form-control form-control-line" id="name" name="name"
                       value="{{ $data->name ?? null }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sku" class="title">{{ trans('SKU') }}</label>
                <input type="text" class="form-control form-control-line" id="sku" name="sku"
                       value="{{ $data->sku ?? null }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="cate_id" class="title">{{ trans('Category') }}</label>
                {!! Form::select('cate_id', $prompt + $categories, $data->cate_id ?? NULL, [
                    'id' => 'cate_id',
                    'class' => 'select2 form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="status" class="title">{{ trans('Status') }}</label>
                {!! Form::select('status', $prompt + $statuses, $data->status ?? NULL, [
                    'id' => 'status',
                    'class' => 'select2 form-control']) !!}
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label for="description" class="title">{{ trans('Description') }}</label>
                <textarea name="description" id="description" class="form-control"
                          rows="11">{{ $data->description ?? NULL }}</textarea>
            </div>
            <div class="form-group">
                <label for="ckeditor" class="title">{{ trans('Content') }}</label>
                <textarea name="content" id="ckeditor">{{ $data->content ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="image" class="title">{{ trans('Image') }}</label>
                <input type="file" id="image" class="dropify" name="image"
                       data-default-file="{{ asset($data->image ?? null) }}"/>
            </div>
            @if(isset($data))
                <div class="form-group">
                    <a href="#" data-toggle="modal" data-target=".image-gallery" class="btn btn-outline-purple"><i
                            class="fa fa-plus"></i> {{ trans('Add more image') }}
                    </a>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="capacity" class="title">{{ trans('Price') }}</label>
                        <input type="number" name="price" class="form-control" value="{{ $data->price ?? NULL }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="title">{{ trans('Discount') }}</label>
                        <input type="number" name="discount" class="form-control" value="{{ $data->discount ?? NULL }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="stock_in" class="title">{{ trans('Stock In') }}</label>
                <input type="number" name="stock_in" class="form-control" value="{{ $data->stock_in ?? NULL }}">
            </div>
            <div class="form-group">
                <label for="tags" class="title">{{ trans('Tag') }}</label>
                @php($selected = isset($data) ? $data->tags->pluck("name")->toArray() : NULL)
                {!! Form::select('tags[][name]', $tags, $selected, [
                    'id' => 'tags',
                    'multiple' => 'multiple',
                    'class' => 'tag-select2 form-control']) !!}
            </div>
            @if(isset($data))
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Updated By') }}</label>
                    <div>{{ $data->updatedBy->name ?? "N/A" }}</div>
                </div>
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Updated At') }}</label>
                    <div>{{ formatDate(strtotime($data->updated_at), 'd-m-Y H:i:s') }}</div>
                </div>
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Created By') }}</label>
                    <div>{{ $data->author->name ?? "N/A" }}</div>
                </div>
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Created At') }}</label>
                    <div>{{ formatDate(strtotime($data->created_at), 'd-m-Y H:i:s') }}</div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="title">{{ trans('What is it?') }}</label>
                <textarea name="what_is_it" class="form-control" rows="6">{{ $data->what_is_it ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="title">{{ trans('Benefit') }}</label>
                <textarea name="benefit" class="form-control" rows="6">{{ $data->benefit ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="title">{{ trans('Ingredients') }}</label>
                <textarea name="ingredients" class="form-control" rows="6">{{ $data->ingredients ?? NULL }}</textarea>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-title"><h4 class="font-weight-bold">Capacities</h4></div>
        <div class="card-body" id="capacity">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ trans('Capacity') }}</th>
                    <th>{{ trans('Unit') }}</th>
                    <th>{{ trans('Price') }}</th>
                    <th>{{ trans('Discount') }}</th>
                    <th>{{ trans('Stock In') }}</th>
                </tr>
                </thead>
                <tbody id="capacity-list">
                @if(isset($data))
                    @foreach($data->capacities->sortBy('capacity') as $key => $capacity)
                        <tr class="capacity-item">
                            <td><input type="hidden" value="{{ $key }}" class="id-item">
                                <input type="text" name="capacity[{{ $key }}][capacity]" class="form-control"
                                       placeholder="{{ trans('Capacity') }}" value="{{ $capacity->capacity }}"></td>
                            <td><input type="text" name="capacity[{{ $key }}][unit]" class="form-control"
                                       placeholder="{{ trans('Unit') }}" value="{{ $capacity->unit }}"></td>
                            <td><input type="text" name="capacity[{{ $key }}][price]" class="form-control"
                                       placeholder="{{ trans('Price') }}" value="{{ $capacity->capacity }}"></td>
                            <td><input type="text" name="capacity[{{ $key }}][discount]" class="form-control"
                                       placeholder="{{ trans('Discount') }}" value="{{ $capacity->discount }}"></td>
                            <td><input type="text" name="capacity[{{ $key }}][stock_in]" class="form-control"
                                       placeholder="{{ trans('Stock In') }}" value="{{ $capacity->stock_in }}"></td>
                            <td>
                                <button class="btn btn-danger close-item"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a href="javascript:" id="add-capacity">Add Capacity</a>
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
@if(isset($data))
    @include("Product::backend.product._multiple_image")
@endif
@push('js')
    {!! JsValidator::formRequest('Modules\Product\Requests\ProductRequest','#product-form') !!}

    <script !src="">
        $(document).ready(function () {
            $('.dropify').dropify();
            $('.tag-select2').select2({
                tags: true
            });

            $(document).on('click', '.close-item', function () {
                $(this).parents('.capacity-item').remove();
            });
            $(document).on('click', '#add-capacity', function () {
                var item = $(document).find('.capacity-item');
                var last_item_id = 0;
                if (item.length > 0) {
                    var last_item = item[item.length - 1];
                    last_item_id = parseInt($(last_item).find('.id-item').val());
                }
                var next_item = last_item_id + 1;
                var html = '<tr class="capacity-item">\n' +
                    '                    <td><input type="hidden" value="' + next_item + '" class="id-item">' +
                    '                        <input type="number" name="capacity[' + next_item + '][capacity]" class="form-control"\n' +
                    '                               placeholder="{{ trans("Capacity") }}"></td>\n' +
                    '                    <td><input type="text" name="capacity[' + next_item + '][unit]" class="form-control"\n' +
                    '                               placeholder="{{ trans("Unit") }}"></td>\n' +
                    '                    <td><input type="number" name="capacity[' + next_item + '][price]" class="form-control"\n' +
                    '                               placeholder="{{ trans("Price") }}"></td>\n' +
                    '                    <td><input type="number" name="capacity[' + next_item + '][discount]" class="form-control"\n' +
                    '                               placeholder="{{ trans("Discount") }}"></td>\n' +
                    '                    <td><input type="number" name="capacity[' + next_item + '][stock_in]" class="form-control"\n' +
                    '                               placeholder="{{ trans("Stock In") }}"></td>\n' +
                    '                    <td>\n' +
                    '                        <button type="button" class="btn btn-danger close-item"><i class="fa fa-trash"></i></button>\n' +
                    '                    </td></tr>';

                $(this).parent('#capacity').find('#capacity-list').append(html);

            });
        });
    </script>
@endpush

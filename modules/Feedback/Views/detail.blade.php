<div class="form-group row">
    <div class="col-md-4">
        <label for="name">{{ trans('Member') }}</label>
    </div>
    <div class="col-md-8">
        <a href="{{ route('get.member.update', $data->member_id) }}">{{ $data->member->name ?? NULL}}</a>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label for="name">{{ trans('Product') }}</label>
    </div>
    <div class="col-md-8">
        <a href="{{ route('get.product.update', $data->product_id) }}">{{ ($data->product->sku .' | '. $data->product->name) ?? NULL}}</a>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label for="name">{{ trans('Vote') }}</label>
    </div>
    <div class="col-md-8">
        {!! $data->getStar() !!}
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4">
            <label for="name">{{ trans('Content') }}</label>
        </div>
        <div class="col-md-8">
            <div class="border" style="min-height: 10rem">
                {!! $data->content !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label for="name">{{ trans('Feedback At') }}</label>
    </div>
    <div class="col-md-8">
        {{ formatDate(strtotime($data->created_at), 'd-m-Y H:i:s') }}
    </div>
</div>

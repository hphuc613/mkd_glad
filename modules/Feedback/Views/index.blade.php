@extends("Base::backend.master")
@php($prompt = ['' => trans('All')])
@section("content")
    <div id="feedback-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans("Feedback") }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ trans("Feedback") }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--Search box-->
    <div class="search-box">
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#form-search-box" aria-expanded="false" aria-controls="form-search-box">
                <div class="title">{{ trans("Search") }}</div>
            </div>
            <div class="card-body collapse show" id="form-search-box">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans('Product') }}</label>
                                {!! Form::select('product_id', $prompt + $products, $filter['product_id'] ?? NULL, ['class' => 'select2 form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans('Member') }}</label>
                                {!! Form::select('member_id', $prompt + $members, $filter['member_id'] ?? NULL, ['class' => 'select2 form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn btn-info mr-2">{{ trans("Search") }}</button>
                        <button type="button" class="btn btn-default clear">{{ trans("Cancel") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="listing">
        <div class="card">
            <div class="card-body">
                <div class="sumary">
                    {!! summaryListing($data) !!}
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Member') }}</th>
                            <th>{{ trans('Email') }}</th>
                            <th>{{ trans('Product') }}</th>
                            <th>{{ trans('SKU') }}</th>
                            <th>{{ trans('Vote') }}</th>
                            <th>{{ trans('Created At') }}</th>
                            <th>{{ trans('Updated At') }}</th>
                            <th class="action">{{ trans('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                        @foreach($data as $item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{ $item->member->name }}</td>
                                <td>{{ $item->member->email }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->sku }}</td>
                                <td>{{ $item->vote }} <i class="fa fa-star text-warning"></i></td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s')}}</td>
                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i:s')}}</td>
                                <td class="link-action">
                                    <a href="{{ route("get.feedback.detail", $item->id) }}" class="btn btn-info"
                                       data-toggle="modal" data-target="#form-modal" data-title="{{ trans("Update Feedback") }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 pagination-style">
                        {{ $data->withQueryString()->render("vendor/pagination/default") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! getModal(["class" => "modal-ajax"]) !!}
@endsection

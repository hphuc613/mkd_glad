@extends("Base::backend.master")

@section("content")
    <div class="user-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans('Offer') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("get.offer.list") }}">{{ trans('Offer') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('Update Offer') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.offer.list") }}" class="btn btn-cyan">{{ trans("Back") }}</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ trans('Update Offer') }}</h4>
            </div>
            <div class="card-body">
                @include('Offer::form')
            </div>
        </div>
    </div>
@endsection

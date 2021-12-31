@extends('Base::frontend.master')

@section('content')
    <div class="container pt-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{trans('Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('My Voucher')}}</li>
            </ol>
        </nav>
        <section id="voucher" class="register">
            <h1 class="title-register">{{trans('My Voucher')}}</h1>
            <hr class="mb-3">

            <div class="table-responsive">
                <table class="table table-voucher">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('Code') }}</th>
                        <th>{{ trans('Name') }}</th>
                        <th>{{ trans('Value') }}</th>
                        <th>{{ trans('Expiration Date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ $item->voucher->code ?? '' }}</td>
                            <td>{{ $item->voucher->name ?? '' }}</td>
                            <td>{{ ($item->voucher->value ?? '') . ($item->voucher->type == 1 ? '$' : '%') }}</td>
                            <td>{{ $item->voucher->expiration_date != null ? formatDate(strtotime($item->voucher->expiration_date), 'd-m-Y H:i') : '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </section>
    </div>
@endsection
@push('js')
    {!! JsValidator::formRequest('Modules\Frontend\Requests\MemberRequest') !!}
    <script !src="">
        var lang = $('html').attr('lang');
        var datetime = $('input.date');
        datetime.attr('autocomplete', "off");
        datetime.datetimepicker({
            format: 'dd-mm-yyyy',
            fontAwesome: true,
            autoclose: true,
            todayHighlight: true,
            todayBtn: true,
            language: lang,
            startView: 'month',
            minView: 'month',
        });
    </script>
@endpush

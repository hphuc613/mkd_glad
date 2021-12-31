@extends("Base::backend.master")

@section("content")
    <div id="voucher-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans("Member Voucher").': '.($member->name ?? '').' '.($member->last_name ?? '') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ trans("Member Voucher") }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--Search box-->
  {{--  <div class="search-box">
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#form-search-box" aria-expanded="false"
                 aria-controls="form-search-box">
                <div class="title">{{ trans("Search") }}</div>
            </div>
            <div class="card-body collapse show" id="form-search-box">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">{{ trans("Voucher Code") }}</label>
                                <input type="text" class="form-control" id="code" name="code"
                                       value="{{ $filter['code'] ?? NULL }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">{{ trans("Voucher Name") }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $filter['name'] ?? NULL }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="expiration_date">{{ trans("Expiration Date") }}</label>
                                <input type="text" class="form-control date" id="expiration_date" name="expiration_date"
                                       value="{{ $filter['expiration_date'] ?? NULL }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans('Status') }}</label>
                                @php($prompt = ['' => trans('Select')])
                                {!! Form::select('status', $prompt + $statuses, $filter['status'] ?? NULL, ['class' => 'select2 form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans('Author') }}</label>
                                {!! Form::select('created_by', $prompt + $authors, $filter['created_by'] ?? NULL, ['class' => 'select2 form-control']) !!}
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
    </div>--}}
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
                            <th>{{ trans('Code') }}</th>
                            <th>{{ trans('Name') }}</th>
                            <th>{{ trans('Value') }}</th>
                            <th>{{ trans('Expiration Date') }}</th>
                            <th>{{ trans('Status') }}</th>
                            <th>{{ trans('Author') }}</th>
                            <th>{{ trans('Created At') }}</th>
                            <th>{{ trans('Updated At') }}</th>
                            <th style="width: 120px" class="action">{{ trans('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                        @foreach($data as $item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{ $item->voucher->code ?? '' }}</td>
                                <td>{{ $item->voucher->name ?? '' }}</td>
                                <td>{{ ($item->voucher->value ?? '') . ($item->voucher->type == 1 ? '$' : '%') }}</td>
                                <td>{{ $item->voucher->expiration_date != null ? formatDate(strtotime($item->voucher->expiration_date), 'd-m-Y H:i') : '' }}</td>
                                <td>{{ \Modules\Base\Models\Status::getStatus($item->voucher->status) ?? null }}</td>
                                <td>
                                    @if(isset($item->voucher->author))
                                        <a href="{{ route('get.user.update', $item->voucher->created_by) }}">{{ $item->voucher->author->name }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->voucher->created_at)->format('d/m/Y H:i:s')}}</td>
                                <td>{{ \Carbon\Carbon::parse($item->voucher->updated_at)->format('d/m/Y H:i:s')}}</td>
                                <td class="link-action">
                                    <a href="{{route('get.member.deleteVoucher',['member_id'=> $member->id,'voucher_id'=>$item->voucher->id])}}"
                                       class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
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

@extends("Base::backend.master")

@section("content")
    @php($prompt = ['' => trans('All')])
    <div id="participate-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans("Participate") }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ trans("Participate") }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{route('get.participate.create')}}" class="btn btn-primary"
               data-toggle="modal" data-target="#form-modal" data-title="{{ trans("Create Participate") }}">
                <i class="fa fa-plus"></i>&nbsp; {{ trans("Add New") }}
            </a>
        </div>
    </div>
    <!--Search box-->
    <div class="search-box">
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
                                <label for="name">{{ trans("Name") }}</label>
                                <input type="text" class="form-control" id="text-input" name="name"
                                       value="{{ $filter['name'] ?? NULL }}">
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
                            <th>{{ trans('Name') }}</th>
                            <th>{{ trans('Image') }}</th>
                            <th>{{ trans('Author') }}</th>
                            <th>{{ trans('Updated By') }}</th>
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
                                <td>{{ trans($item->name) }}</td>
                                <td class="image-box">
                                    <div class="image-item image-in-listing">
                                        <a href="{{ asset($item->image) }}" target="">
                                            <img src="{{ asset($item->image) }}" width="120" alt="{{ $item->title }}">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    @if(isset($item->author))
                                        <a href="{{ route('get.user.update', $item->created_by) }}">{{ $item->author->name }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>

                                <td>
                                    @if(isset($item->updatedBy))
                                        <a href="{{ route('get.user.update', $item->updated_by) }}">{{ $item->updatedBy->name }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s')}}</td>
                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i:s')}}</td>
                                <td class="link-action">
                                    <a href="{{ route('get.participate.update', $item->id) }}" class="btn btn-primary"
                                       data-toggle="modal" data-target="#form-modal"
                                       data-title="{{ trans("Update Participate") }}">
                                        <i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('get.participate.delete', $item->id) }}"
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
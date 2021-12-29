@extends('Base::frontend.master')

@section('content')
    <div class="container pt-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{trans('Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('Profile')}}</li>
            </ol>
        </nav>
        <section id="profile" class="register">
            <h1 class="title-register">{{trans('Profile')}}</h1>
            <hr class="mb-3">
            <form class="form-register mw-100" action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4 me-5">
                        <div class="form-group">
                            <label class="label-input-login" for="name">
                                {{trans('Name')}}
                            </label>
                            <input type="text" id="name" name="name" placeholder="{{trans('Name')}}"
                                   class="form-control input-login" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="last_name">
                                {{trans('Last name')}}
                            </label>
                            <input type="text" id="last_name" name="last_name" placeholder="{{trans('Last name')}}"
                                   class="form-control input-login" value="{{$data->last_name}}">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="email">
                                {{trans('Email address')}}
                            </label>
                            <input type="email" id="email" name="email" placeholder="{{trans('Email address')}}"
                                   class="form-control input-login" value="{{$data->email}}">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="username">
                                {{trans('Username')}}
                            </label>
                            <input type="text" id="username" name="username" placeholder="{{trans('Username')}}"
                                   class="form-control input-login" value="{{$data->username}}">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="password">
                                {{trans('Password')}}
                            </label>
                            <input type="password" id="password" name="password" placeholder="{{trans('Password')}}"
                                   class="form-control input-login" value="">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="password_re_enter">
                                {{trans('Confirm Password')}}
                            </label>
                            <input type="password" id="password_re_enter" name="password_re_enter"
                                   placeholder="{{trans('Confirm Password')}}"
                                   class="form-control input-login">
                        </div>

                        <button type="submit" class="btn btn-main btn-register">{{trans('Update')}}</button>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label-input-login" for="birthday">
                                {{trans('Birthday')}}
                            </label>
                            <input type="text" class="form-control input-login date" id="birthday" name="birthday"
                                   value="{{\Carbon\Carbon::parse($data->birthday)->format('d-m-Y') ?? old('birthday') }}"
                                   placeholder="dd-mm-yyyy">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="phone">
                                {{trans('Phone Number')}}
                            </label>
                            <input type="text" id="phone" name="phone" placeholder="{{trans('Phone Number')}}"
                                   class="form-control input-login" value="{{$data->phone}}">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="address">
                                {{trans('Address')}}
                            </label>
                            <input type="text" id="address" name="address" placeholder="{{trans('Address')}}"
                                   class="form-control input-login" value="{{$data->address}}">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="contact_info">
                                {{trans('Contact Info')}}
                            </label>
                            <input type="text" id="contact_info" name="contact_info"
                                   placeholder="{{trans('Contact Info')}}"
                                   class="form-control input-login" value="{{$data->contact_info}}">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="point">
                                {{trans('Point')}}
                            </label>
                            <input id="point" name="" readonly placeholder="{{trans('Point')}}" class="form-control input-login" value="100">
                        </div>
                    </div>
                </div>
            </form>
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

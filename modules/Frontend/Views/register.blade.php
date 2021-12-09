@extends('Base::frontend.master')

@section('content')
    <div class="container pt-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">建立新帳户</li>
            </ol>
        </nav>
        <section id="register" class="register">
            <h1 class="title-register">建立新帳戶</h1>
            <hr class="mb-3">
            <form class="form-register" action="" method="post">
                @csrf
                <div class="form-group">
                    <label class="label-input-login" for="first_name">
                        名字
                    </label>
                    <input type="text" id="first_name" name="first_name" placeholder="名字"
                           class="form-control input-login">
                </div>
                <div class="form-group">
                    <label class="label-input-login" for="last_name">
                        姓氏
                    </label>
                    <input type="text" id="last_name" name="last_name" placeholder="姓氏"
                           class="form-control input-login">
                </div>
                <div class="form-group">
                    <label class="label-input-login" for="email">
                        電郵地址 <span> *</span>
                    </label>
                    <input type="email" id="email" name="email" placeholder="電郵地址"
                           class="form-control input-login">
                </div>
                <div class="form-group">
                    <label class="label-input-login" for="password">
                        密碼 <span> *</span>
                    </label>
                    <input type="password" id="password" name="password" placeholder="密碼"
                           class="form-control input-login">
                </div>
                <div class="form-group">
                    <label class="label-input-login" for="password_re_enter">
                        確認密碼 <span> *</span>
                    </label>
                    <input type="password" id="password_re_enter" name="password_re_enter" placeholder="確認密碼"
                           class="form-control input-login">
                </div>
                <button type="submit" class="btn btn-main btn-register">建立新帳戶</button>
            </form>
        </section>
    </div>
@endsection
@push('js')
    {!! JsValidator::formRequest('Modules\Auth\Requests\AuthMemberRequest') !!}
@endpush

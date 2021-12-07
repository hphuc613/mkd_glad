
<div class="modal-login">
    <div class="row">
        <div class="col-lg-6">
            <img class="modal-image d-none d-sm-block" src="{{ asset('storage/upload/Home/modal-login.svg') }}"
                 alt="Modal Login">
        </div>
        <div class="col-lg-6 col-12">
            <div class="h-100">
                <div class="close-modal">
                    <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                        <i class="bi-x"></i>關閉
                    </a>
                </div>
                <div class="form-login">
                    <h3>登入</h3>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label class="label-input-login" for="email">電郵地址<span> *</span></label>
                            <input type="text" id="email" name="email" placeholder="電郵地址"
                                   class="form-control input-login">
                        </div>
                        <div class="form-group">
                            <label class="label-input-login" for="password">
                                密碼 <span> *</span>
                            </label>
                            <input type="password" id="password" name="password" placeholder="密碼"
                                   class="form-control input-login">
                        </div>
                        <div class="btn-group-login">
                            <button class="btn btn-outline-main btn-login" type="submit">登入</button>
                            <a href="{{ route('get.home.forgotPassword') }}" data-bs-toggle="modal"
                               data-bs-target="#form-modal" class="btn btn-forgot">
                                忘記密碼
                            </a>
                            <a href="register.html" class="btn btn-main btn-register">建立新帳戶</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



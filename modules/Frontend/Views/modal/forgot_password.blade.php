<!--Modal forgot password-->
<div class="modal-forgot">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="h-100">
                <div class="close-modal justify-content-start ps-5">
                    <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                        <i class="bi-x"></i>關閉
                    </a>
                </div>
                <div class="form-forgot">
                    <form action="{{ route('post.home.forgotPassword') }}" method="post">
                        @csrf
                        <h3>忘記密碼</h3>
                        <hr>
                        <div class="title-noti">我們將會發送電郵給你重設密碼</div>
                        <div class="form-group">
                            <label class="label-input-login" for="email-forgot">
                                電郵地址 <span> *</span>
                            </label>
                            <input type="text" id="email-forgot" name="email" placeholder="電郵地址"
                                   class="form-control input-login">
                        </div>
                        <div class="row-send">
                            <button type="submit" class="btn btn-main px-5 py-2 rounded-0">提交</button>
                            <div class="title-or">或</div>
                            <a href="javascript:"  data-bs-dismiss="modal" class="text-decoration-none title-cancel">取消</a>
                        </div>
                        <div class="divider one-line">或</div>
                        <div class="title-forgot mb-1">新客戶</div>
                        <div class="title-noti mb-lg-3 mb-5">申請賬戶後付款更快捷、查看訂單及其他資料</div>
                        <a href="register.html" class="btn btn-main btn-register">建立新帳戶</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img class="modal-image d-none d-sm-block" src="{{ asset('storage/upload/Home/modal-forgot.svg') }}"
                 alt="Modal Forgot">
        </div>
    </div>
</div>

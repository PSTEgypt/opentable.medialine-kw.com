<!-- Modal -->
<div class="modal fade" id="AuthLoginModel" tabindex="-1" role="dialog" aria-labelledby="AuthLoginModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="
    border-bottom: none;
">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row" style="display: flex;justify-content: center;">
<img src="{{asset('/img/Towipi-logo.svg')}}" alt="Logo" style="
    display: flex;
">
    </div>
      <div class="row" style="
    text-align: center;
">
<div class="col-md-6">
<a type="button" href="/signin" class="btn btn-secondary "  style="
    background-color: #F495BE;
    border-color: #F495BE;
">{{App::getLocale() == 'ar' ? "تسجيل ":"sign in"}}</a>

</div>

<div class="col-md-6">
<a type="button" href="/signup" class="btn btn-secondary" style="
    background-color: #F495BE;
    border-color: #F495BE;
">{{App::getLocale() == 'ar' ? "انشاء حساب جديد":"sign up"}}</a>

</div>
</div>

      </div>
      <div class="modal-footer"  style="
    border-top: none;
">

      </div>
    </div>
  </div>
</div>
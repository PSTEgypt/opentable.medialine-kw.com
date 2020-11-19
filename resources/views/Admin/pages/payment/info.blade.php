@extends('layoutDashboard.app',['title'=>'شحن الرصيد' ,'subTitle'=>' بيانات  شحن الرصيد '])
@section('style')
<style>
.content-wrapper, .main-footer, .main-header{
  z-index:0;
}

</style>

@endsection

@section('content')
@component('components.panel',['subTitle'=>'  بيانات  شحن الرصيد'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('https://00a306-qamarwahed-orange.magdsoft.com/'.$BalanceRecharge->image)}}" alt="User profile picture">
                </div>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
</span> <b class="float-right">    المبلغ او الرصيد </b>
                  </li>
                  
                  <li class="list-group-item">
                    @if($BalanceRecharge->is_approved == 1)
                    <span class="badge bg-success"> موافق</span><b class="float-right">الحالة </b>
                   @else
                    <span class="badge bg-danger">غير موافق</span> <b class="float-right">الحالة </b>
                  @endif  
                  </li>
                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($BalanceRecharge->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                  @if($BalanceRecharge->user !== NULL)         
                  <li class="list-group-item">
                  <span><a href="/user/info/{{$BalanceRecharge->user->id}}">{{$BalanceRecharge->user->name}}</a></span> <b class="float-right"> المستخدم  </b>
                  </li>                  
                    <th> </th>
                  @else
                  @if($BalanceRecharge->provider !== NULL) 
                  <li class="list-group-item">
                  <span><a href="/provider/info/{{$BalanceRecharge->provider->id}}">{{$BalanceRecharge->provider->name}}</a></span> <b class="float-right"> المندوب  </b> 
                  </li>          
                  @endif
                  @endif
                </ul>

                @if($BalanceRecharge->is_approved == 1)
                <a  href="/balance/recharging/disapprove/{{$BalanceRecharge->id}}" class="btn btn-block btn-danger btn-sm"> غير موافق </a>
                @else
                <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">موافق</button>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">شحن الرصيد</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="{{route('Balance.recharging.approve',$BalanceRecharge->id)}}" method="post" enctype="multipart/form-data" >
                      @csrf
                      <div class="form-group">
                        <label for="Inputamount"> الكمية  </label>
                        <input type="number" class="form-control" id="Inputamount"  name="amount">
                      </div>
                      <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                      <button type="submit" class="btn btn-primary">{{trans('dashboard.TextSend')}} </button>
                    </div>

                  </div>
                </div>
                @endif

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @endcomponent




      
 @endsection
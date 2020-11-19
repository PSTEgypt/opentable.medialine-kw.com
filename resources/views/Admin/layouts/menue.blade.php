 <!-- ============================================================== -->
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="{{url('/')}}/admin-pro/assets/images/users/profile.png" alt="user" /><span class="hide-menu">

                    @auth('web')
                    {{auth()->guard('web')->user()->name}}
                    @endauth
                    @auth('restaurants') 
                    {{auth()->guard('restaurants')->user()->name}}
                    @endauth
                    @auth('restaurant_emps')
                    {{auth()->guard('restaurant_emps')->user()->name}}
                    @endauth


                </span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="/admin/admin/edit/


                        @auth('web')
                        {{auth()->guard('web')->user()->id}}
                        @endauth
                        @auth('restaurants') 
                        {{auth()->guard('restaurants')->user()->id}}
                        @endauth
                        @auth('restaurant_emps')
                        {{auth()->guard('restaurant_emps')->user()->id}}
                        @endauth
                        ">
                        {{trans('dashboard.MyProfile')}}

                    </a></li>
                    <li><a href="javascript:void()">My Balance</a></li>
                    <li><a href="javascript:void()">Inbox</a></li>
                    <li><a href="javascript:void()">Account Setting</a></li>
                    <li><a href="javascript:void()">Logout</a></li>
                </ul>
            </li>
            <li class="nav-devider"></li>
            @if(Auth::guard('web')->check())            


           <li>
               
                <a href="/admin/types">
                            <i class="mdi mdi-gauge"></i>

                     <span class="label label-rouded label-themecolor pull-right">
                    {{App\type::count()}}

                </span>
                    {{\App::getLocale() == 'ar'  ?   "انواع  المطعم  " : "Type of Restaurant  " }}  


                </a>

            </li>

            <li>

               
            <a href="/admin/restaurants">
                <i class="mdi mdi-bullseye"></i>
                {{\App::getLocale() == 'ar'  ?   "  المطاعم  " : " Restaurants  " }} 
<span class="label label-rouded label-themecolor pull-right">
                {{App\restaurant::count()}}


            </span>
            </a>
        </li>




<li> <a class="has-arrow waves-effect waves-dark"
   href="/admin/payments" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">
    {{\App::getLocale() == 'ar'  ?   "    ادارة الاشتركات   " : " Subscriptions  " }} 


</span>

</a>
<ul aria-expanded="false" class="collapse">
    <li>
      
<a href="/admin/payments">
    <i class="mdi mdi-chart-bubble"></i>
    {{\App::getLocale() == 'ar'  ?   "     المطاعم المشتركة    " : " Subscriptions Restaurants  " }} 

     
</a></li>


<li>
  
   <a href="/admin/payment/unSubscription">
    <i class="mdi mdi-chart-bubble"></i>
     {{\App::getLocale() == 'ar'  ?   "     المطاعم غير المشتركة     " : " Unsubscriptions Restaurants  " }}

     
 </a></li>


 <li>
   

<a href="/admin/payment/ended">
    <i class="mdi mdi-chart-bubble"></i>
    {{\App::getLocale() == 'ar'  ?   "       منتهية الاشتراك      " : " end  Subscriptions Restaurants  " }} 
      
</a></li>


</ul>
</li>



<li> <a class="has-arrow waves-effect waves-dark" href="/admin/users" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">

    {{\App::getLocale() == 'ar'  ?   "        المستخدميين       " : "Users     " }} 
</span></a>
<ul aria-expanded="false" class="collapse">
    <li><a href="/admin/users">
        <i class="mdi mdi-arrange-send-backward"></i>
      {{\App::getLocale() == 'ar'  ?   "        المستخدميين       " : "Users     " }} 
  </a></li>
  <li>

    <a href="/admin/admins">
        <i class="mdi mdi-arrange-send-backward"></i>
   {{\App::getLocale() == 'ar'  ?   "           المسئوليين       " : " Admins" }} 
</a></li>

</ul>
</li>

@else 

<li>

    <a href="/restaurant/info">
       <i class="fa fa-user"></i>

       {{\App::getLocale() == 'ar'  ?   " بياناتي  " : "my info" }}  

   </a>

</li>

<li>
    <a href="/restaurant/foodCategorys">
        {{\App::getLocale() == 'ar'  ?   " انواع  الوجبات  " : "Type  of meals  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\foodCategory::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>



<li>
    <a href="/restaurant/food">
        {{\App::getLocale() == 'ar'  ?   "   الوجبات  " : "food  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\restaurant_food::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>


<li>
    <a href="/restaurant/tableTypes">
        {{\App::getLocale() == 'ar'  ?   "  انواع الطاولات   " : "tableTypes  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\tableType::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>


<li>
    <a href="/restaurant/tables">
        {{\App::getLocale() == 'ar'  ?   "   الطاولات   " : "tables  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\restaurant_table::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>


<li>
    <a href="/restaurant/reservations">
        {{\App::getLocale() == 'ar'  ?   "     الحجزات    " : "reservations  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\reservation::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>




<li>
    <a href="/restaurant/orders">
        {{\App::getLocale() == 'ar'  ?   "  الطلبات     " : "orders  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\order::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>



<li>
    <a href="/restaurant/timeworks">
        {{\App::getLocale() == 'ar'  ?   "    مواعيد العمل   " : "timeworks  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\timework::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>




<li>
    <a href="/restaurant/timeworks">
        {{\App::getLocale() == 'ar'  ?   "    مواعيد العمل   " : "timeworks  " }}  
        <span class="label label-rouded label-themecolor pull-right">
            {{App\timework::where('restaurant_id',auth()->guard('restaurants')->user()->id)->count()}}
        </span>
    </a>
</li>


<li>
    <a href="/restaurant/emps">
        {{\App::getLocale() == 'ar'  ?   " المشرفين    " : "Moderators  " }}  
        
    </a>
</li>



  

@endif

</ul>
</nav>
<!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
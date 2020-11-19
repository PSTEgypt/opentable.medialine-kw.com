  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
    
      <span class="brand-text font-weight-light">{{config('dashboard.nameApp')}}</span>
    </a>

<!-- Sidebar -->
    <div class="sidebar">
      <div>
      @component('components.info')@endcomponent
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

                         <!-- categories Route-->  

                         @if(Auth::guard('web')->check())            
             <li class="nav-item ">
              <a href="/admin/types" class="nav-link {{ Request::is(Route::currentRouteName() == 'types') ? 'active' : '' }}">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
               {{\App::getLocale() == 'ar'  ?   "انواع  المطعم  " : "Type of Restaurant	" }} 
                </p>
              </a>
            </li>   





             <!-- partyThemes Route-->  
        
            
           <!-- product  Route-->  
          <li class="nav-item ">
          
          <a href="/admin/restaurants" class="nav-link {{ Request::is(Route::currentRouteName() == 'restaurants') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            {{\App::getLocale() == 'ar'  ?   "  المطاعم  " : " Restaurants  " }} 
           
            </p>
          </a>
        </li>   





<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa  fa-book"></i>
              <p>
              {{\App::getLocale() == 'ar'  ?   "    ادارة الاشتركات   " : " Subscriptions  " }} 

               <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="/admin/payments" class="nav-link {{ Request::is(Route::currentRouteName() == 'payments') ? 'active' : '' }}">
                  <p>              {{\App::getLocale() == 'ar'  ?   "     المطاعم المشتركة    " : " Subscriptions Restaurants  " }} </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/payment/unSubscription" class="nav-link {{ Request::is(Route::currentRouteName() == 'payment.unSubscription') ? 'active' : '' }}">
                  <p>    {{\App::getLocale() == 'ar'  ?   "     المطاعم غير المشتركة     " : " Unsubscriptions Restaurants  " }} </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="/admin/payment/ended" class="nav-link {{ Request::is(Route::currentRouteName() == 'payment.ended') ? 'active' : '' }}">
                  <p> {{\App::getLocale() == 'ar'  ?   "       منتهية الاشتراك      " : " end  Subscriptions Restaurants  " }}  </p>
                </a>
              </li>
              
            </ul>
          </li>

             <!-- users Route-->  
             <li class="nav-item ">
              <a href="/admin/users" class="nav-link {{ Request::is(Route::currentRouteName() == 'users') ? 'active' : '' }}">
                <i class="nav-icon  fa fa-users" aria-hidden="true"></i>
                <p> {{\App::getLocale() == 'ar'  ?   "        المستخدميين       " : "Users     " }}  </p>

              </a>
            </li>




 
        
        
          
          <!-- admin Route-->  
          <li class="nav-item ">
          
          <a href="/admin/admins" class="nav-link {{ Request::is(Route::currentRouteName() == 'admins') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p> {{\App::getLocale() == 'ar'  ?   "           المسئوليين       " : " Admin Management      " }}  </p>

 
          </a>
        </li> 

@else 

   <!-- product  Route-->  
   <li class="nav-item ">
          
          <a href="/restaurant/info" class="nav-link {{ Request::is(Route::currentRouteName() == 'restaurant.info') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
          بياناتي  
            </p>
          </a>
        </li>   

        <li class="nav-item ">
              <a href="/restaurant/foodCategorys" class="nav-link {{ Request::is(Route::currentRouteName() == 'foodCategorys') ? 'active' : '' }}">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                  انواع  الوجبات 
                </p>
              </a>
            </li>   

 <li class="nav-item ">
          
          <a href="/restaurant/food" class="nav-link {{ Request::is(Route::currentRouteName() == 'restaurant.food') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
          الوجبات  
            </p>
          </a>
        </li>   



        <li class="nav-item ">
          
          <a href="/restaurant/tableTypes" class="nav-link {{ Request::is(Route::currentRouteName() == 'restaurant.tableTypes') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            انواع الطاولات   
            </p>
          </a>
        </li>   

        
        <li class="nav-item ">
          
          <a href="/restaurant/tables" class="nav-link {{ Request::is(Route::currentRouteName() == 'tables') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
          الطاولات   
            </p>
          </a>
        </li>   

        <li class="nav-item ">
        <a href="/restaurant/reservations" class="nav-link {{ Request::is(Route::currentRouteName() == 'reservations') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            الحجزات   
            </p>
          </a>
        </li>   

        <li class="nav-item ">
        <a href="/restaurant/orders" class="nav-link {{ Request::is(Route::currentRouteName() == 'orders') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            الطلبات   
            </p>
          </a>
        </li>   
      

    
        <li class="nav-item ">
          
          <a href="/restaurant/timeworks" class="nav-link {{ Request::is(Route::currentRouteName() == 'timeworks') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
             مواعيد العمل 
            </p>
          </a>
        </li>  
        <li class="nav-item ">
          
          <a href="/restaurant/emps" class="nav-link {{ Request::is(Route::currentRouteName() == 'emps') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
          المشرفين   
            </p>
          </a>
        </li>   


        


@endif
             
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
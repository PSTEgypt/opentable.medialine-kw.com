        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('dist/img/admin.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
            @auth('web')
            {{auth()->guard('web')->user()->name}}
            @endauth
            @auth('restaurants') 
            {{auth()->guard('restaurants')->user()->name}}
            @endauth
            @auth('restaurant_emps')
            {{auth()->guard('restaurant_emps')->user()->name}}
            @endauth
            </a>
          </div>
        </div>

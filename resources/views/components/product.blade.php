

<div class="card">
     <div class="pro-img">
          <a href="/product/info/{{$product->id}}"><img src="{{$product->main_image}}"  alt="product"></a>
          @if(Carbon\Carbon::now()->greaterThanOrEqualTo(Carbon\Carbon::parse($product->created_at)) 
&& Carbon\Carbon::now()->lessThanOrEqualTo(Carbon\Carbon::parse($product->created_at)->addDays(3)))
          <span class="status badge badge-primary">{{App::getLocale() == 'ar' ? "جديد":"New"}}</span>
          @endif
          @if($product->discount !== 0)
          <span class="status badge badge-warning">{{$product->discount}}% -</span>
          @endif
     </div>
     <div class="pro-desc">
          <div class="pro-info">
               <a href="/product/info/{{$product->id}}">
               <h4 class="pro-name">
               @if(App::getLocale() == 'ar')
               {{ $product->name_ar }}
               @else 
  
               {{ $product->name_en }}
               @endif
               </h4></a>
               <span class="price">
               <span class="aft-dis">EGP {{$product->price - $product->price*$product->discount/100 }}</span>
               <span class="bef-dis">EGP {{$product->price}}</span>
              
          </div>
          <div class="cart-view">
               <button form="AddTocart-{{$product->id}}"  type="submit" class="btn add-cart">{{App::getLocale() == 'ar' ? "شراء":"Buy"}}</button>
               <form id='AddTocart-{{$product->id}}' action="/product/add/cart/{{$product->id}}" method="get">
</form>
               <a  href="/product/info/{{$product->id}}" class="btn q-view"><span style="width:100%;text-align:center">{{App::getLocale() == 'ar' ? "مشاهدة":"View"}}</span></a>
             
               @auth('users')
               @if(!$product->wishList->isEmpty())
               <a  href="/wishlist/delete/{{ $product->id }}" class="btn fav"><i class="fas fa-heart"></i></a>
               @else 
               <a  href="/wishlist/add/{{ $product->id }}" class="btn fav"><i class="far fa-heart"></i></a>

               @endif

               @endauth

               @guest('users')
               <a  href="/wishlist/add/{{ $product->id }}" class="btn fav"><i class="far fa-heart"></i></a>

               @endguest

               
          </div>
     </div>
</div>



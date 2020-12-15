<header class="header"><!-- header -->
	<div class=" header__col-dan-hang" >
		<div class="header__tc">
			<a class="header__logo" title="Về trang chủ Thegioididong.com" href="{{asset('/')}}" aria-label="logo">
				<i class="fas fa-graduation-cap"></i>
			</a>
			<form class="header__form" action="{{asset('search')}}"  method="GET">
				@csrf
				@method('GET')
				<input class="header__top-input" type="text" name="search"  aria-label="Bạn tìm gì..." placeholder="Bạn tìm gì..."  >
				<button class="header__btntop" aria-label="tìm kiếm"><i class="fas fa-search"></i></button>
			</form>
		</div>

		<nav class="header__menu text-sm-left">
			<ul>
				@foreach($categories as $key => $value)
				<li>
					<a href="{{asset('category/'.$value->id.'/'.$value->cate_slug.'.html')}}" class="header__mobile" title="Điện thoại di động, smartphone">
						<i class="fas fa-mobile"></i>{{$value->cate_name}}
					</a>
				</li>
				@endforeach
			</ul>
		</nav>

		<div class="header__icon-rh">
			<p>Giỏ hàng</p><i class="fas fa-cart-arrow-down" style="color: #fff; font-size: 50px;"></i>
			<a href="{{asset('cart/show')}}" style="margin-left: -27px;">{{\Cart::getContent()->count()}}</a>
		</div>
	</div>
</header> <!-- end header -->

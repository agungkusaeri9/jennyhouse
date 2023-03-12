<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}">
                    <img src="{{ $setting->image() }}" class="img-fluid" alt="" style="max-width:140px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item @if(Route::currentRouteName() === 'home') active @endif"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item submenu dropdown @if(Route::currentRouteName() === 'products.index' || Route::currentRouteName() === 'products.show' || Route::currentRouteName() === 'products.category') active @endif">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false">Products</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">All Product</a></li>
                                @forelse ($product_categories as $category)
                                <li class="nav-item"><a class="nav-link" href="{{ route('products.category',$category->slug) }}">{{ $category->name }}</a></li>
                                @empty
                                @endforelse
                            </ul>
                        </li>
                        <li class="nav-item submenu  @if(Route::currentRouteName() === 'blogs.index' || Route::currentRouteName() === 'blogs.show') active @endif">
                            <a href="{{ route('blogs.index') }}" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item  @if(Route::currentRouteName() === 'contact') active @endif">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName() === 'about') active @endif"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                        @auth
                        <li class="nav-item  @if(Route::currentRouteName() === 'transactions.index') active @endif"><a class="nav-link" href="{{ route('transactions.index') }}">Transactions</a></li>
                        @endauth
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        {{-- <li class="nav-item">
                            <form action="" method="get">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </form>
                        </li> --}}
                        <li class="nav-item @if(Route::currentRouteName() === 'cart.index') active @endif"><a href="{{ route('cart.index') }}" class="cart"><span class="ti-bag"></span></a></li>
                     @auth
                     <li class="nav-item"><a href="javascript:void(0)" onclick="document.getElementById('formLogout').submit()" class="cart text-dark"><span class="text-dark"></span>Logout</a></li>
                     <form action="{{ route('logout') }}" id="formLogout" method="post">
                    @csrf</form>
                     @endauth
                        {{-- <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false"><span class="ti-user"></span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Profile</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    {{-- <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div> --}}
</header>

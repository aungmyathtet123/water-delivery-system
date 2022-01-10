<header class="main_menu home_menu">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark ">
                        <a class="navbar-brand" href="{{route('home')}}"> <img src="frontend/image/aa.png" alt="logo" height="100px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav navbar-dark">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('home')}}">Home</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('gallery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a class="nav-link " href="{{route('about')}}">About</a>
                                    
                                </li>
                                 @hasrole('admin')
                                 <li>
                                    <a class="nav-link " href="{{route('category.index')}}">Adminmanagement</a>
                                    
                                </li>
                                 @endhasrole

                                  @hasrole('shop')
                                 <li>
                                    <a class="nav-link " href="{{route('shopowner.index')}}">orderlist</a>
                                    
                                </li>
                                 @endhasrole
                                
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('contact')}}">Contact</a>
                                </li>

                                @guest
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
<!--                         <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search "></i></a>
                            <a href=""><i class="ti-heart "></i></a> -->
                            <!-- <div class="dropdown cart">
                                <a class="dropdown-toggle" href="{{route('cart')}}" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="showcart fas fa-cart-plus"></i>
                                </a>
                            </div> -->
                            <a href="{{route('cart')}}">
                                <i class="showcart fas fa-cart-plus "><h6 id="b1"></h6></i> 
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control " id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div> -->
    </header>
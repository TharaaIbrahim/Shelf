     <nav class="topnav">
     <div class="Logo">  
       <label>Shelf</label>
<img src="assets/img/shelf-logo white.png" alt="shelf website's logo">
          </div>
        <button class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </button>
        <div class="navbar" id="navbar">
      <a class="links" href="/">Home</a>
      <a class="links" href="/books" >Shelf</a> 
      <a  Class="links" href="/about">About</a> 
      <a  class="links" href="#">Contact</a> 
      <a  class="links" href="/addbook">Add Book</a> 
      <a  href="/account" >Account</a>
     </div>
     <div class="auth-list">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                             
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              
                            @endif

                            @if (Route::has('register'))
                             
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              
                            @endif
                        @else
                            
                                <a id="navbarDropdown"
                                 {{-- class="nav-link dropdown-toggle"  --}}
                                 href="shelf/account" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                @if(Auth::user()->role=="admin")
                                <a  href="admin/admin"
                                     >
                                        {{ __('dashboard') }}
                                    </a>
                                    @endif
                                {{-- <div class="row" --}}
                                {{-- class="dropdown-menu dropdown-menu-end" --}}
                                 {{-- aria-labelledby="navbarDropdown"
                                 > --}}
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form>
                                {{-- </div> --}}
                           
                        @endguest
       
    
    </div>
    </nav>

<main>
        @yield('content')
    </main>
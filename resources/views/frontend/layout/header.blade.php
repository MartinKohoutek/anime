 <!-- Header Section Begin -->
 <header class="header">
     <div class="container">
         <div class="row">
             <div class="col-lg-2">
                 <div class="header__logo">
                     <a href="{{ url('/') }}">
                         <img src="{{ asset('frontend/img/logo.png') }}" alt="">
                     </a>
                 </div>
             </div>
             <div class="col-lg-8">
                 <div class="header__nav">
                     <nav class="header__menu mobile-menu">
                         <ul>
                             <li class="active"><a href="{{ url('/') }}">Homepage</a></li>
                             <li><a href="./categories.html">Categories <span class="arrow_carrot-down"></span></a>
                                 <ul class="dropdown">
                                     <li><a href="./categories.html">Categories</a></li>
                                     <li><a href="./anime-details.html">Anime Details</a></li>
                                     <li><a href="./anime-watching.html">Anime Watching</a></li>
                                     <li><a href="./blog-details.html">Blog Details</a></li>
                                     <li><a href="./signup.html">Sign Up</a></li>
                                     <li><a href="./login.html">Login</a></li>
                                 </ul>
                             </li>
                             <li><a href="./blog.html">Our Blog</a></li>
                             <li><a href="#">Contacts</a></li>
                             @auth
                                 <li>
                                     <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                         <a href="{{ route('logout') }}"
                                             onclick="event.preventDefault(); this.closest('form').submit()">Logout</a>
                                     </form>
                                 </li>
                             @else
                                 <li><a href="{{ route('login') }}">Login</a></li>
                             @endauth
                         </ul>
                     </nav>
                 </div>
             </div>
             <div class="col-lg-2">
                 <div class="header__nav header__right">
                     <nav class="header__menu mobile-menu">
                         <ul class="d-flex">
                             <li><a href="#" class="search-switch"><span class="icon_search"></span></a></li>
                             <li>
                                 <a href="">
                                     <span class="icon_profile"></span>
                                     <span class="arrow_carrot-down"></span>
                                 </a>
                                 <ul class="dropdown">
                                     @auth
                                         <li><a href="{{ route('user.dashboard') }}">User Dashboard</a></li>
                                         <li><a href="{{ route('user.profile') }}">User Profile</a></li>
                                         <li><a href="{{ route('user.change.password') }}">Change Password</a></li>
                                         <li><a href="./blog-details.html">Blog Details</a></li>
                                         <li><a href="./signup.html">Sign Up</a></li>
                                         <li>
                                             <form action="{{ route('logout') }}" method="post">
                                                 @csrf
                                                 <a href="{{ route('logout') }}"
                                                     onclick="event.preventDefault(); this.closest('form').submit()">Logout</a>
                                             </form>
                                         </li>
                                     @else
                                         <li><a href="{{ route('login') }}">Login</a></li>
                                         <li><a href="{{ route('register') }}">Register</a></li>
                                     @endauth
                                 </ul>
                             </li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
         <div id="mobile-menu-wrap"></div>
     </div>
 </header>
 <!-- Header End -->

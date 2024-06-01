<div class="bottom_header_bg bottom_parent">
    <div class="custom_container bottom_header_container">
        <div class="home_icon">
            <span id="bars">
                <li id="animated_hamn" onclick="myFunction(this)">
                    <div>
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </li>
            </span>

            <a id="home" href="{{ url('/') }}">{{ __('প্রচ্ছদ') }}</a>
        </div>
        <div class="logo_part mobile_logo">
            <a href="{{ url('/') }}"><img width="251" height="70" src="{{ asset(settings()->logo) }}"
                    alt="ismart4news logo"></a>
        </div>
        <div class="nav_menu_ground">
            <ul id="menu-home" class="ul_menu">

                @foreach (newscategories()->take(12) as $Newscategory)
                    @if ($Newscategory->menu_publish)
                        <li id="menu-item-11"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-11">
                            <a href="{{ route($Newscategory->slug, strtolower($Newscategory->name)) }}">{{ $Newscategory->name }}
                            </a>
                        </li>
                    @endif
                @endforeach


            </ul>
        </div>
        <div class="search_container">
            <ul class="ul_menu always_show">
                <li id="animated_hamn" onclick="myFunction(this)">
                    <div>
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <span class="other_heading">{{ __('অন্যান্য') }}</span>
                </li>
            </ul>
            <div class="search_icon"><i class="fa fa-search"></i></div>
            <div class="cross_icon"><i style="color: #ffffff;" class="fas fa-times"></i></div>
            <div class="search_inner">
                <form style="width:100%;" role="search" action="{{ route('search') }}" method="GET" id="searchform">
                    @csrf
                    <div class="search_form_div">
                        <input value="{{ old('search') }}" type="search" name="search"
                            placeholder="{{ __('সার্চ করুন ...') }}" id="s" required />
                        <button type="submit" id="seachsubmit"><i class="fa fa-search"></i></button>
                        <div id="search_close"><i class="fa fa-times"></i></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="drop_nav_menu_container">
        <ul class="drop_nav_menu">

            @foreach (newscategories() as $Newscategory)
                <li class="cat-item cat-item-4">
                    <a href="{{ route($Newscategory->slug, strtolower($Newscategory->name)) }}">{{ $Newscategory->name }}
                    </a>
                </li>
            @endforeach


        </ul>
    </div>
    <div class="header_mobile_menu">
        <div class="header_mobile_menu_ground">
            <ul id="menu-home-1" class="header_mobile_menu_ul">

                @foreach (newscategories() as $Newscategory)
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-11">
                        <a href="{{ route($Newscategory->slug, strtolower($Newscategory->name)) }}">{{ $Newscategory->name }}
                        </a>
                    </li>
                @endforeach


            </ul>
        </div>
    </div>
</div>
<div class="scrollmenu">
    <ol>
        @foreach (newscategories() as $Newscategory)
            <li class="cat-item cat-item-4">
                <a href="{{ route($Newscategory->slug, strtolower($Newscategory->name)) }}">{{ $Newscategory->name }}
                </a>
            </li>
        @endforeach

    </ol>
</div>


<div class="marquee_container_bg">
    <div class="marquee_container  bg-dark">
        <div class="marquee_name bg-warning text-dark">{{ __('শিরোনাম') }}</div>
        <marquee class="marquee_title_sizeing" behavior="scroll" direction="left" scrollamount="3"
            onmouseover="this.stop();" onmouseout="this.start();">


            @foreach (breakingnews() as $breaking_news)
                <h2><a
                        href="
        @if ($breaking_news->news_category) @if (Route::has(strtolower($breaking_news->news_categoryslug)))
            {{ route(strtolower($breaking_news->news_categoryslug) . '.details', $breaking_news->id) }} @endif
            @endif
                ">
                        {{ $breaking_news->title }}
                    </a></h2>
            @endforeach


        </marquee>
    </div>
</div>


{{-- <div class="-manu-bar">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-5 d-lg-none">
                <div class="-logo">
                    <a href="{{ URL('/') }}"><img src="{{ asset(settings()->logo) }}" alt="logo"></a>
                </div>
            </div>
            <div class="col-7 order-lg-2 col-lg-2">
                <ul class="-right-btns">
                    <li>
                        <button class="-search-btn" data-bs-toggle="modal" data-bs-target="#popupSearch">
                            <span class="icon"><svg viewBox="0 0 511.999 511.999">
                                    <path
                                        d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667 S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732 c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667 c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z">
                                    </path>
                                </svg></span>
                        </button>
                        <div class="modal fade" id="popupSearch" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('search') }}" method="GET">
                                        @csrf
                                        <input type="search" name="search" placeholder="Search...">
                                        <button type="submit">{{ __('Search') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="-profile-btn" data-bs-toggle="modal" data-bs-target="#signInModal">
                            <span class="icon"><svg viewBox="0 0 512 512">
                                    <path
                                        d="M333.187,237.405c32.761-23.893,54.095-62.561,54.095-106.123C387.282,58.893,328.389,0,256,0 S124.718,58.893,124.718,131.282c0,43.562,21.333,82.23,54.095,106.123C97.373,268.57,39.385,347.531,39.385,439.795 c0,39.814,32.391,72.205,72.205,72.205H400.41c39.814,0,72.205-32.391,72.205-72.205 C472.615,347.531,414.627,268.57,333.187,237.405z M164.103,131.282c0-50.672,41.225-91.897,91.897-91.897 s91.897,41.225,91.897,91.897S306.672,223.18,256,223.18S164.103,181.954,164.103,131.282z M400.41,472.615H111.59 c-18.097,0-32.82-14.723-32.82-32.821c0-97.726,79.504-177.231,177.231-177.231s177.231,79.504,177.231,177.231 C433.231,457.892,418.508,472.615,400.41,472.615z">
                                    </path>
                                </svg></span>
                        </div>

                        <div class="modal fade" id="signInModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content p-0">
                                    <div class="-user-avatar">
                                        <h3 class="-login-header">{{ __('Sign In') }}</h3>
                                        <div id="loginMessage">
                                            @if (session()->has('message'))
                                                <div class="alert alert-{{ session('type') }}">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <form class="-user-avatar-form" action="{{ route('signin') }}"
                                            method="POST">
                                            @csrf
                                            <div class="-input-group">
                                                <label for="phone">{{ __('Email') }}</label>
                                                <input type="text" id="phone" name="email"
                                                    class="form-control" placeholder="Your E-mail">
                                            </div>
                                            <div class="-input-group">
                                                <label for="pass">{{ 'Password' }}</label>
                                                <div class="password-area">
                                                    <input id="pass" type="password" class="form-control"
                                                        placeholder="Password" name="password">
                                                    <span class="field-icon toggle-pass">
                                                        <svg class="eye-show" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 511.992 511.992">
                                                            <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105
                                                            c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886
                                                            C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128
                                                            c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424
                                                            C463.013,282.065,362.256,383.996,255.995,383.996z" />
                                                            <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333
                                                            S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64
                                                            S291.28,319.996,255.995,319.996z" />
                                                        </svg>

                                                        <svg class="eye-close" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512.001 512.001">
                                                            <path
                                                                d="M316.332,195.662c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.16-4.16,10.944,0,15.083
                                                            c12.075,12.075,18.752,28.139,18.752,45.248c0,35.285-28.715,64-64,64c-17.109,0-33.173-6.656-45.248-18.752
                                                            c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.139-4.16,10.923,0,15.083c16.085,16.128,37.525,25.003,60.331,25.003
                                                            c47.061,0,85.333-38.272,85.333-85.333C341.334,233.187,332.46,211.747,316.332,195.662z" />
                                                            <path
                                                                d="M270.87,172.131c-4.843-0.853-9.792-1.472-14.869-1.472c-47.061,0-85.333,38.272-85.333,85.333
                                                            c0,5.077,0.619,10.027,1.493,14.869c0.917,5.163,5.419,8.811,10.475,8.811c0.619,0,1.237-0.043,1.877-0.171
                                                            c5.781-1.024,9.664-6.571,8.64-12.352c-0.661-3.627-1.152-7.317-1.152-11.157c0-35.285,28.715-64,64-64
                                                            c3.84,0,7.531,0.491,11.157,1.131c5.675,1.152,11.328-2.859,12.352-8.64C280.534,178.702,276.652,173.155,270.87,172.131z" />
                                                            <path d="M509.462,249.102c-2.411-2.859-60.117-70.208-139.712-111.445c-5.163-2.709-11.669-0.661-14.379,4.587
                                                            c-2.709,5.227-0.661,11.669,4.587,14.379c61.312,31.744,110.293,81.28,127.04,99.371c-25.429,27.541-125.504,128-230.997,128
                                                            c-35.797,0-71.872-8.64-107.264-25.707c-5.248-2.581-11.669-0.341-14.229,4.971c-2.581,5.291-0.341,11.669,4.971,14.229
                                                            c38.293,18.496,77.504,27.84,116.523,27.84c131.435,0,248.555-136.619,253.483-142.443
                                                            C512.854,258.915,512.833,253.091,509.462,249.102z" />
                                                            <path d="M325.996,118.947c-24.277-8.171-47.829-12.288-69.995-12.288c-131.435,0-248.555,136.619-253.483,142.443
                                                            c-3.115,3.669-3.371,9.003-0.597,12.992c1.472,2.112,36.736,52.181,97.856,92.779c1.813,1.216,3.84,1.792,5.888,1.792
                                                            c3.435,0,6.827-1.664,8.875-4.8c3.264-4.885,1.92-11.52-2.987-14.763c-44.885-29.845-75.605-65.877-87.104-80.533
                                                            c24.555-26.667,125.291-128.576,231.552-128.576c19.861,0,41.131,3.755,63.189,11.157c5.589,2.005,11.648-1.088,13.504-6.699
                                                            C334.572,126.862,331.585,120.825,325.996,118.947z" />
                                                            <path d="M444.865,67.128c-4.16-4.16-10.923-4.16-15.083,0L67.116,429.795c-4.16,4.16-4.16,10.923,0,15.083
                                                            c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115L444.865,82.211
                                                            C449.025,78.051,449.025,71.288,444.865,67.128z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <button type="submit" class="-btn">{{ __('SIGN IN') }}</button>
                                            <span>{{ __("Don't have an account?") }} <a data-bs-toggle="modal"
                                                    data-bs-dismiss="modal"
                                                    href="#modal-signUp">{{ __('Sign up') }}</a></span>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-lg-none">
                        <button type="button" class="manu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-12 order-lg-1 col-lg-10">
                <nav class="-main-manu">
                    <button class="close-btn d-lg-none">
                        <span></span>
                        <span></span>
                    </button>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">{{ home() }}</a>
                        </li>

                        @foreach (newscategories()->take(2) as $Newscategory)
                            @if ($Newscategory->menu_publish)
                                <li>
                                    <a href="{{ route($Newscategory->slug, strtolower($Newscategory->name)) }}">{{ $Newscategory->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach


                        <li>
                            <a href="{{ route('contactus') }}">{{ contactus() }}</a>
                        </li>

                    </ul>

                </nav>
            </div>
        </div>
    </div>



    {{-- signup modal --}}
{{-- <div class="modal fade" id="modal-signUp">
        <div class="modal-dialog">
            <div class="modal-content p-0">
                <div class="-user-avatar">
                    <h3 class="-login-header">{{ __('Create your Account') }}</h3>
                    <form class="-user-avatar-form" action="{{ route('signup') }}" method="POST">
                        @csrf
                        <div class="-input-group">
                            <label for="firstName">{{ __('First Name') }}</label>
                            <input id="firstName" type="text" name="first_name" class="form-control"
                                placeholder="First Name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="-input-group">
                            <label for="lastName">{{ __('Last Name') }}</label>
                            <input id="lastName" type="text" name="last_name" class="form-control"
                                placeholder="Last Name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="-input-group">
                            <label for="phoneone">{{ __('Phone') }}</label>
                            <input id="phoneone" type="number" name="phone" class="form-control"
                                placeholder="Phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="-input-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="text" name="email" class="form-control"
                                placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="-input-group">
                            <label for="ps">{{ __('Password') }}</label>
                            <div class="password-area">
                                <input id="ps" type="password" class="form-control" placeholder="Password"
                                    name="password" required>
                                <div toggle="#ps" class="field-icon toggle-password">
                                    <svg class="eye-show" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 511.992 511.992">
                                        <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105
                                                c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886
                                                C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128
                                                c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424
                                                C463.013,282.065,362.256,383.996,255.995,383.996z" />
                                        <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333
                                                S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64
                                                S291.28,319.996,255.995,319.996z" />
                                    </svg>

                                    <svg class="eye-close" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512.001 512.001">
                                        <path
                                            d="M316.332,195.662c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.16-4.16,10.944,0,15.083
                                                c12.075,12.075,18.752,28.139,18.752,45.248c0,35.285-28.715,64-64,64c-17.109,0-33.173-6.656-45.248-18.752
                                                c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.139-4.16,10.923,0,15.083c16.085,16.128,37.525,25.003,60.331,25.003
                                                c47.061,0,85.333-38.272,85.333-85.333C341.334,233.187,332.46,211.747,316.332,195.662z" />
                                        <path
                                            d="M270.87,172.131c-4.843-0.853-9.792-1.472-14.869-1.472c-47.061,0-85.333,38.272-85.333,85.333
                                                c0,5.077,0.619,10.027,1.493,14.869c0.917,5.163,5.419,8.811,10.475,8.811c0.619,0,1.237-0.043,1.877-0.171
                                                c5.781-1.024,9.664-6.571,8.64-12.352c-0.661-3.627-1.152-7.317-1.152-11.157c0-35.285,28.715-64,64-64
                                                c3.84,0,7.531,0.491,11.157,1.131c5.675,1.152,11.328-2.859,12.352-8.64C280.534,178.702,276.652,173.155,270.87,172.131z" />
                                        <path d="M509.462,249.102c-2.411-2.859-60.117-70.208-139.712-111.445c-5.163-2.709-11.669-0.661-14.379,4.587
                                                c-2.709,5.227-0.661,11.669,4.587,14.379c61.312,31.744,110.293,81.28,127.04,99.371c-25.429,27.541-125.504,128-230.997,128
                                                c-35.797,0-71.872-8.64-107.264-25.707c-5.248-2.581-11.669-0.341-14.229,4.971c-2.581,5.291-0.341,11.669,4.971,14.229
                                                c38.293,18.496,77.504,27.84,116.523,27.84c131.435,0,248.555-136.619,253.483-142.443
                                                C512.854,258.915,512.833,253.091,509.462,249.102z" />
                                        <path d="M325.996,118.947c-24.277-8.171-47.829-12.288-69.995-12.288c-131.435,0-248.555,136.619-253.483,142.443
                                                c-3.115,3.669-3.371,9.003-0.597,12.992c1.472,2.112,36.736,52.181,97.856,92.779c1.813,1.216,3.84,1.792,5.888,1.792
                                                c3.435,0,6.827-1.664,8.875-4.8c3.264-4.885,1.92-11.52-2.987-14.763c-44.885-29.845-75.605-65.877-87.104-80.533
                                                c24.555-26.667,125.291-128.576,231.552-128.576c19.861,0,41.131,3.755,63.189,11.157c5.589,2.005,11.648-1.088,13.504-6.699
                                                C334.572,126.862,331.585,120.825,325.996,118.947z" />
                                        <path d="M444.865,67.128c-4.16-4.16-10.923-4.16-15.083,0L67.116,429.795c-4.16,4.16-4.16,10.923,0,15.083
                                                c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115L444.865,82.211
                                                C449.025,78.051,449.025,71.288,444.865,67.128z" />
                                    </svg>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="-input-group">
                            <label for="passs">{{ __('Confirmation Password') }}</label>
                            <div class="password-area">
                                <input id="passs" type="password" class="form-control" placeholder="Password"
                                    name="password_confirmation" required>
                                <div toggle="#passs" class="field-icon toggle-pas">
                                    <svg class="eye-show" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 511.992 511.992">
                                        <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105
                                                c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886
                                                C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128
                                                c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424
                                                C463.013,282.065,362.256,383.996,255.995,383.996z" />
                                        <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333
                                                S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64
                                                S291.28,319.996,255.995,319.996z" />
                                    </svg>

                                    <svg class="eye-close" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512.001 512.001">
                                        <path
                                            d="M316.332,195.662c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.16-4.16,10.944,0,15.083
                                                c12.075,12.075,18.752,28.139,18.752,45.248c0,35.285-28.715,64-64,64c-17.109,0-33.173-6.656-45.248-18.752
                                                c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.139-4.16,10.923,0,15.083c16.085,16.128,37.525,25.003,60.331,25.003
                                                c47.061,0,85.333-38.272,85.333-85.333C341.334,233.187,332.46,211.747,316.332,195.662z" />
                                        <path
                                            d="M270.87,172.131c-4.843-0.853-9.792-1.472-14.869-1.472c-47.061,0-85.333,38.272-85.333,85.333
                                                c0,5.077,0.619,10.027,1.493,14.869c0.917,5.163,5.419,8.811,10.475,8.811c0.619,0,1.237-0.043,1.877-0.171
                                                c5.781-1.024,9.664-6.571,8.64-12.352c-0.661-3.627-1.152-7.317-1.152-11.157c0-35.285,28.715-64,64-64
                                                c3.84,0,7.531,0.491,11.157,1.131c5.675,1.152,11.328-2.859,12.352-8.64C280.534,178.702,276.652,173.155,270.87,172.131z" />
                                        <path d="M509.462,249.102c-2.411-2.859-60.117-70.208-139.712-111.445c-5.163-2.709-11.669-0.661-14.379,4.587
                                                c-2.709,5.227-0.661,11.669,4.587,14.379c61.312,31.744,110.293,81.28,127.04,99.371c-25.429,27.541-125.504,128-230.997,128
                                                c-35.797,0-71.872-8.64-107.264-25.707c-5.248-2.581-11.669-0.341-14.229,4.971c-2.581,5.291-0.341,11.669,4.971,14.229
                                                c38.293,18.496,77.504,27.84,116.523,27.84c131.435,0,248.555-136.619,253.483-142.443
                                                C512.854,258.915,512.833,253.091,509.462,249.102z" />
                                        <path d="M325.996,118.947c-24.277-8.171-47.829-12.288-69.995-12.288c-131.435,0-248.555,136.619-253.483,142.443
                                                c-3.115,3.669-3.371,9.003-0.597,12.992c1.472,2.112,36.736,52.181,97.856,92.779c1.813,1.216,3.84,1.792,5.888,1.792
                                                c3.435,0,6.827-1.664,8.875-4.8c3.264-4.885,1.92-11.52-2.987-14.763c-44.885-29.845-75.605-65.877-87.104-80.533
                                                c24.555-26.667,125.291-128.576,231.552-128.576c19.861,0,41.131,3.755,63.189,11.157c5.589,2.005,11.648-1.088,13.504-6.699
                                                C334.572,126.862,331.585,120.825,325.996,118.947z" />
                                        <path d="M444.865,67.128c-4.16-4.16-10.923-4.16-15.083,0L67.116,429.795c-4.16,4.16-4.16,10.923,0,15.083
                                                c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115L444.865,82.211
                                                C449.025,78.051,449.025,71.288,444.865,67.128z" />
                                    </svg>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="-input-group">
                            <button class="-btn">{{ __('SIGN UP') }}</button>
                        </div>
                        <span>{{ __('Already member?') }} <a href="#signInModal" data-bs-toggle="modal"
                                data-bs-dismiss="modal">{{ __('Sign in here') }}</a></span>
                    </form>
                </div>

            </div>
        </div>
    </div> --}}
{{-- </div> --}}

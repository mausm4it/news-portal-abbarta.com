<style>
    .brand-image {
        opacity: .8;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ URL('/admin') }}" class="brand-link">
        <img src="{{ asset($settings->icon) }}" alt="MAANEWS icon" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ $settings->short_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ 'Dashboard' }}

                        </p>
                    </a>

                </li>

                @can('isSuperAdmin')
                    <li
                        class="nav-item {{ Request::routeIs('admin.role') || Request::routeIs('admin.role.edit') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::routeIs('admin.role') || Request::routeIs('admin.role.edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                {{ __('Role Manage') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.role') }}"
                                    class="nav-link {{ Request::routeIs('admin.role') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' Role List') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @canany(['isSuperAdmin', 'isAdmin', 'isEditor'])
                    <li
                        class="nav-item  {{ Request::routeIs('admin.user') || Request::routeIs('admin.user.create') || Request::routeIs('admin.user.edit') || Request::routeIs('admin.subscriber') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::routeIs('admin.user') || Request::routeIs('admin.user.create') || Request::routeIs('admin.user.edit') || Request::routeIs('admin.subscriber') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{ __('User Manage') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.user') }}"
                                    class="nav-link {{ Request::routeIs('admin.user') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' User List') }}</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="{{ route('admin.subscriber') }}" class="nav-link {{ Request::routeIs('admin.subscriber') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __(' Subscriber List') }}</p>
                            </a>
                        </li> --}}

                        </ul>
                    </li>
                @endcanany
                @canany(['isSuperAdmin', 'isAdmin', 'isEditor', 'isReporter'])
                    <li
                        class="nav-item {{ Request::routeIs('admin.news.category') || Request::routeIs('admin.news.subcategory') || Request::routeIs('admin.news.speciality') || Request::routeIs('admin.news') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::routeIs('admin.news.category') || Request::routeIs('admin.news.subcategory') || Request::routeIs('admin.news.speciality') || Request::routeIs('admin.news') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                {{ __('News Manage') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.news.category') }}"
                                    class="nav-link {{ Request::routeIs('admin.news.category') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' News Category') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.news.subcategory') }}"
                                    class="nav-link {{ Request::routeIs('admin.news.subcategory') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' News Sub-Category') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.news.speciality') }}"
                                    class="nav-link {{ Request::routeIs('admin.news.speciality') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' News Speciality') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.news') }}"
                                    class="nav-link {{ Request::routeIs('admin.news') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('All News') }}</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li
                        class="nav-item {{ Request::routeIs('admin.photogallery') || Request::routeIs('admin.photogallery.edit') || Request::routeIs('admin.videogallery') || Request::routeIs('admin.videogallery.create') || Request::routeIs('admin.videogallery.edit') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::routeIs('admin.photogallery') || Request::routeIs('admin.photogallery.edit') || Request::routeIs('admin.videogallery') || Request::routeIs('admin.videogallery.create') || Request::routeIs('admin.videogallery.edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-photo-video"></i>
                            <p>
                                {{ __('Media') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.photogallery') }}"
                                    class="nav-link {{ Request::routeIs('admin.photogallery') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' Photo Gallery') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.videogallery') }}"
                                    class="nav-link {{ Request::routeIs('admin.videogallery') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Video Gallery') }}</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcanany
                @canany(['isSuperAdmin', 'isAdmin', 'isEditor', 'isReporter', 'isAccountent'])
                    <li
                        class="nav-item {{ Request::routeIs('admin.blog.category') || Request::routeIs('admin.blog.subcategory') || Request::routeIs('admin.blog') || Request::routeIs('admin.blog.create') || Request::routeIs('admin.blog.edit') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::routeIs('admin.blog.category') || Request::routeIs('admin.blog.subcategory') || Request::routeIs('admin.blog') || Request::routeIs('admin.blog.create') || Request::routeIs('admin.blog.edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                {{ __('Blog Manage') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.blog.category') }}"
                                    class="nav-link {{ Request::routeIs('admin.blog.category') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' Blog Category') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog.subcategory') }}"
                                    class="nav-link {{ Request::routeIs('admin.blog.subcategory') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' Blog Sub-Category') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog') }}"
                                    class="nav-link {{ Request::routeIs('admin.blog') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' Blog List') }}</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    {{-- <li
                        class="nav-item {{ Request::routeIs('admin.reporter') || Request::routeIs('admin.reporter.create') || Request::routeIs('admin.reporter.edit') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::routeIs('admin.reporter') || Request::routeIs('admin.reporter.create') || Request::routeIs('admin.reporter.edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{ __('News Reporters') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.reporter') }}"
                                    class="nav-link {{ Request::routeIs('admin.reporter') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' All Reporters') }}</p>
                                </a>
                            </li>


                        </ul>
                    </li> --}}
                    <li class="nav-item {{ Request::routeIs('admin.contact') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::routeIs('admin.contact') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope-open-text"></i>

                            <p>
                                {{ __('Contact Manage') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.contact') }}"
                                    class="nav-link {{ Request::routeIs('admin.contact') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __(' Contact Info') }}</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcanany
                @canany(['isSuperAdmin', 'isAdmin', 'isEditor'])
                    <li
                        class="nav-item {{ Request::routeIs('admin.settings.index') || Request::routeIs('admin.company.index') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::routeIs('admin.settings.index') || Request::routeIs('admin.company.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fas fa-fw fa-cog"></i>

                            <p>
                                {{ __('Settings') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.index') }}"
                                    class="nav-link {{ Request::routeIs('admin.settings.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Site Settings') }}</p>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.company.index') }}"
                                    class="nav-link {{ Request::routeIs('admin.company.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Company Info') }}</p>
                                </a>

                            </li>
                        </ul>
                    </li>
                @endcanany
                @canany(['isSuperAdmin', 'isAdmin'])
                    <li class="nav-item {{ Request::routeIs('admin.ads.index') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::routeIs('admin.ads.index') ? 'active' : '' }}">
                            <i class="nav-icon  fas fa-ad"></i>

                            <p>
                                {{ __('Ads Manage') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.ads.index') }}"
                                    class="nav-link {{ Request::routeIs('admin.ads.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Ads Settings') }}</p>
                                </a>

                            </li>

                        </ul>
                    </li>
                    <li class="nav-item {{ Request::routeIs('admin.seo.index') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::routeIs('admin.seo.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-assistive-listening-systems"></i>

                            <p>
                                {{ __('SEO Report') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.seo.index') }}"
                                    class="nav-link {{ Request::routeIs('admin.seo.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('SEO Optimization') }}</p>
                                </a>

                            </li>

                        </ul>
                    </li>
                    <li class="nav-item {{ Request::routeIs('admin.social.index') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::routeIs('admin.social.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-share-alt"></i>

                            <p>
                                {{ __('Social') }}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.social.index') }}"
                                    class="nav-link {{ Request::routeIs('admin.social.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Social Share') }}</p>
                                </a>

                            </li>

                        </ul>
                    </li>
                @endcanany

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<header class="ishorizontal-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('images/galicia-dark-logo.svg') }}" alt="" height="26"
                            width="100">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('images/galicia-dark-logo.svg') }}" alt="" height="28"
                            width="100">
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('images/galicia-dark-logo.svg') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('images/galicia-dark-logo.svg') }}" alt="" height="30">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse"
                data-bs-target="#topnav-menu-content">
                <i class="bx bx-menu align-middle"></i>
            </button>

            <!-- start page title -->
            <div class="page-title-box align-self-center d-none">
                <h4 class="page-title mb-0">@yield('page-title')</h4>
            </div>
            <!-- end page title -->

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block language-switch ms-2 ms-xl-3">
                <button type="button" class="btn header-item d-none" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="header-lang-img" src="{{ URL::asset('#') }}"
                        alt="Header Language" height="18">
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
                        <img src="{{ URL::asset('#') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">English</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="{{ URL::asset('#') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                        <img src="{{ URL::asset('#') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                        <img src="{{ URL::asset('#') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                        <img src="{{ URL::asset('#') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">Russian</span>
                    </a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon " data-bs-toggle="modal" aria-haspopup="true"
                    data-bs-target="#myModal">
                    <i class="bx bx-search icon-sm align-middle"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <form class="p-2">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0"
                                    placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon d-none"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-bell icon-sm align-middle"></i>
                    <span class="noti-dot bg-danger rounded-pill">4</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-15"> Notifications </h5>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small fw-semibold text-decoration-underline"> Mark all as
                                    read</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar  nonce="newN0nc3ForS3cur1ty" style="max-height: 250px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('images/users/avatar-3.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour
                                                ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('images/users/avatar-6.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour
                                                ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user d-none"
                        src="{{ URL::asset('images/users/avatar-3.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15">{{ Auth::user()->name }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->email }}</p>
                    </div>
                    {{-- 
                    <a class="dropdown-item" href="contacts-profile"><i
                            class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Profile</span></a>
                    <a class="dropdown-item" href="apps-chat"><i
                            class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Messages</span></a>
                    <a class="dropdown-item" href="pages-faqs"><i
                            class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Help</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                            class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle me-3">Settings</span><span
                            class="badge bg-success-subtle text-success ms-auto">New</span></a>
                    <a class="dropdown-item" href="auth-lock-screen"><i
                            class="mdi mdi-lock text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Lock screen</span></a>
                    <div class="dropdown-divider"></div>
                     --}}
                    <a class="dropdown-item" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">@lang('Cerrar sesión')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"  nonce="newN0nc3ForS3cur1ty" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="d-inline-block d-flex align-items-center">
                <div class="d-flex align-items-center border-start border-white ms-2 ps-3">
                    <a class="text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        @lang('Cerrar sesión')
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page" href="{{ route('dashboard') }}">
                                <i class="bx bx-home-alt icon nav-icon"></i>
                                <span data-key="t-dashboards">@lang('Inicio')</span>
                            </a>
                        </li>
                        @can('show meets')
                            <li class="nav-item">
                                <a class="nav-link arrow-none" aria-current="page" href="{{ route('events') }}">
                                    <i class="bx bx-calendar-event icon nav-icon"></i>
                                    <span data-key="t-deals">@lang('Juntas IBA')</span>
                                </a>
                            </li>
                        @endcan
                        @can('show deals')
                            <li class="nav-item">
                                <a class="nav-link arrow-none" aria-current="page" href="{{ route('deals') }}">
                                    <i class="bx bx-briefcase icon nav-icon"></i>
                                    <span data-key="t-deals">@lang('Deals')</span>
                                </a>
                            </li>
                        @endcan
                        @can('show travels')
                            <li class="nav-item">
                                <a class="nav-link arrow-none" aria-current="page" href="{{ route('travels') }}">
                                    <i class="bx bxs-plane-alt icon nav-icon"></i>
                                    <span data-key="t-deals">@lang('Viajes')</span>
                                </a>
                            </li>
                        @endcan
                        @can('show partners')
                            <li class="nav-item">
                                <a class="nav-link arrow-none" aria-current="page" href="{{ route('partners') }}">
                                    <i class="far fa-address-card icon nav-icon"></i>
                                    <span data-key="t-deals">@lang('Directorio')</span>
                                </a>
                            </li>
                        @endcan
                        {{-- @can('show platillos') --}}
                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page"
                                href="{{ route('menu_items.index') }}">
                                <i class="fas fa-utensils icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Catering')</span>
                            </a>
                        </li>
                        {{-- @endcan --}}


                        {{-- @endcan --}}
                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page" href="{{ route('orders.index') }}">
                                <i class="fas fa-shopping-cart icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Ordenes')</span>
                            </a>
                        </li>
                        {{-- @endcan --}}

                        {{-- @endcan --}}
                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page" href="{{ route('orders.kitchen') }}">
                                <i class="fas fa-shopping-cart icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Ordenes Cocina')</span>
                            </a>
                        </li>
                        {{-- @endcan --}}

                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page" href="{{ route('maps.index') }}">
                                <i class="fas fa-map icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Mapa interactivo')</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page"
                                href="{{ route('directory.index') }}">
                                <i class="fas fa-map icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Directorio')</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page"
                                href="{{ route('next-to-me.index') }}">
                                <i class="fas fa-map-marker-alt icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Cerca de mí')</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page"
                                href="{{ route('notificaciones.index') }}">
                                <i class="fas fa-bell icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Notificaciones')</span>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link arrow-none" aria-current="page" href="{{ route('service.proposals') }}">
                                <i class="fas fa-file-signature  icon nav-icon"></i>
                                <span data-key="t-deals">@lang('Propuestas de Servicios')</span>
                            </a>
                        </li> --}}
                        @if (App::hasDebugModeEnabled())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-home-alt icon nav-icon"></i>
                                    <span data-key="t-dashboards">Dashboards</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                    <a href="index" class="dropdown-item" data-key="t-ecommerce">Ecommerce</a>
                                    <a href="dashboard-sales" class="dropdown-item" data-key="t-sales">Sales</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-cube icon nav-icon"></i>
                                    <span data-key="t-elements">Elements</span>
                                    <div class="arrow-down"></div>
                                </a>

                                <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                    aria-labelledby="topnav-uielement">
                                    <div class="ps-2 p-lg-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="menu-title">Elements</div>
                                                    <div class="row g-0">
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <a href="ui-alerts" class="dropdown-item"
                                                                    data-key="t-alerts">Alerts</a>
                                                                <a href="ui-buttons" class="dropdown-item"
                                                                    data-key="t-buttons">Buttons</a>
                                                                <a href="ui-cards" class="dropdown-item"
                                                                    data-key="t-cards">Cards</a>
                                                                <a href="ui-carousel" class="dropdown-item"
                                                                    data-key="t-carousel">Carousel</a>
                                                                <a href="ui-dropdowns" class="dropdown-item"
                                                                    data-key="t-dropdowns">Dropdowns</a>
                                                                <a href="ui-grid" class="dropdown-item"
                                                                    data-key="t-grid">Grid</a>
                                                                <a href="ui-images" class="dropdown-item"
                                                                    data-key="t-images">Images</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <a href="ui-lightbox" class="dropdown-item"
                                                                    data-key="t-lightbox">Lightbox</a>
                                                                <a href="ui-modals" class="dropdown-item"
                                                                    data-key="t-modals">Modals</a>
                                                                <a href="ui-offcanvas" class="dropdown-item"
                                                                    data-key="t-offcanvas">Offcanvas</a>
                                                                <a href="ui-rangeslider" class="dropdown-item"
                                                                    data-key="t-range-slider">Range Slider</a>
                                                                <a href="ui-progressbars" class="dropdown-item"
                                                                    data-key="t-progress-bars">Progress Bars</a>
                                                                <a href="ui-sweet-alert" class="dropdown-item"
                                                                    data-key="t-sweet-alert">Sweet-Alert</a>
                                                                <a href="ui-tabs-accordions" class="dropdown-item"
                                                                    data-key="t-tabs-accordions">Tabs & Accordions</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <a href="ui-typography" class="dropdown-item"
                                                                    data-key="t-typography">Typography</a>
                                                                <a href="ui-video" class="dropdown-item"
                                                                    data-key="t-video">Video</a>
                                                                <a href="ui-general" class="dropdown-item"
                                                                    data-key="t-general">General</a>
                                                                <a href="ui-colors" class="dropdown-item"
                                                                    data-key="t-colors">Colors</a>
                                                                <a href="ui-rating" class="dropdown-item"
                                                                    data-key="t-rating">Rating</a>
                                                                <a href="ui-notifications" class="dropdown-item"
                                                                    data-key="t-notifications">Notifications</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                                    role="button">
                                    <i class="bx bx-store icon nav-icon"></i>
                                    <span data-key="t-apps">Apps</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                    <a href="apps-calendar" class="dropdown-item" data-key="t-calendar">Calendar</a>

                                    <a href="apps-todo" class="dropdown-item" data-key="t-todo">Todo</a>

                                    <a href="apps-file-manager" class="dropdown-item" data-key="t-filemanager">File
                                        Manager</a>

                                    <a href="apps-chat" class="dropdown-item" data-key="t-chat">Chat</a>


                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-ecommerce" role="button">
                                            <span data-key="t-ecommerce">Ecommerce</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                            <a href="ecommerce-products" class="dropdown-item"
                                                data-key="t-products">Products</a>
                                            <a href="ecommerce-product-detail" class="dropdown-item"
                                                data-key="t-product-detail">Product Detail</a>
                                            <a href="ecommerce-orders" class="dropdown-item"
                                                data-key="t-orders">Orders</a>
                                            <a href="ecommerce-customers" class="dropdown-item"
                                                data-key="t-customers">Customers</a>
                                            <a href="ecommerce-cart" class="dropdown-item" data-key="t-cart">Cart</a>
                                            <a href="ecommerce-checkout" class="dropdown-item"
                                                data-key="t-checkout">Checkout</a>
                                            <a href="ecommerce-shops" class="dropdown-item"
                                                data-key="t-shops">Shops</a>
                                            <a href="ecommerce-add-product" class="dropdown-item"
                                                data-key="t-add-product">Add Product</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-email" role="button">
                                            <span data-key="t-email">Email</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                                            <a href="email-inbox" class="dropdown-item" data-key="t-inbox">Inbox</a>
                                            <a href="email-read" class="dropdown-item" data-key="t-read-email">Read
                                                Email</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-invoices" role="button">
                                            <span data-key="t-invoices">Invoices</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-invoices">
                                            <a href="invoices-list" class="dropdown-item"
                                                data-key="t-invoice-list">Invoice List</a>
                                            <a href="invoices-detail" class="dropdown-item"
                                                data-key="t-invoice-detail">Invoice Detail</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-contact" role="button">
                                            <span data-key="t-contacts">Contacts</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                            <a href="contacts-grid" class="dropdown-item" data-key="t-user-grid">User
                                                Grid</a>
                                            <a href="contacts-list" class="dropdown-item" data-key="t-user-list">User
                                                List</a>
                                            <a href="contacts-profile" class="dropdown-item"
                                                data-key="t-user-profile">Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components"
                                    role="button">
                                    <i class="bx bx-layer icon nav-icon"></i>
                                    <span data-key="t-components">Components</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-components">
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-form" role="button">
                                            <span data-key="t-forms">Forms</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-form">
                                            <a href="form-elements" class="dropdown-item"
                                                data-key="t-form-elements">Form
                                                Elements</a>
                                            <a href="form-layouts" class="dropdown-item"
                                                data-key="t-form-layouts">Form
                                                Layouts</a>
                                            <a href="form-validation" class="dropdown-item"
                                                data-key="t-form-validation">Form Validation</a>
                                            <a href="form-advanced" class="dropdown-item"
                                                data-key="t-form-advanced">Form
                                                Advanced</a>
                                            <a href="form-editors" class="dropdown-item"
                                                data-key="t-form-editors">Form
                                                Editors</a>
                                            <a href="form-uploads" class="dropdown-item"
                                                data-key="t-form-upload">Form
                                                File Upload</a>
                                            <a href="form-wizard" class="dropdown-item" data-key="t-form-wizard">Form
                                                Wizard</a>
                                            <a href="form-mask" class="dropdown-item" data-key="t-form-mask">Form
                                                Mask</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-table" role="button">
                                            <span data-key="t-tables">Tables</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-table">
                                            <a href="tables-basic" class="dropdown-item"
                                                data-key="t-basic-tables">Basic
                                                Tables</a>
                                            <a href="tables-advanced" class="dropdown-item"
                                                data-key="t-advanced-tables">Advance Tables</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-charts" role="button">
                                            <span data-key="t-charts">Charts</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                            <a href="charts-apex" class="dropdown-item" data-key="t-apex-charts">Apex
                                                Charts</a>
                                            <a href="charts-chartjs" class="dropdown-item"
                                                data-key="t-chartjs-charts">Chartjs Charts</a>
                                            <a href="charts-tui" class="dropdown-item" data-key="t-ui-charts">Toast
                                                UI
                                                Charts</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-icons" role="button">
                                            <span data-key="t-icons">Icons</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                            <a href="icons-evaicons" class="dropdown-item" data-key="t-evaicons">Eva
                                                Icons</a>
                                            <a href="icons-boxicons" class="dropdown-item"
                                                data-key="t-boxicons">Boxicons</a>
                                            <a href="icons-materialdesign" class="dropdown-item"
                                                data-key="t-material-design">Material Design</a>
                                            <a href="icons-fontawesome" class="dropdown-item"
                                                data-key="t-font-awesome">Font Awesome 5</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-map" role="button">
                                            <span data-key="t-maps">Maps</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-map">
                                            <a href="maps-google" class="dropdown-item"
                                                data-key="t-google">Google</a>
                                            <a href="maps-vector" class="dropdown-item"
                                                data-key="t-vector">Vector</a>
                                            <a href="maps-leaflet" class="dropdown-item"
                                                data-key="t-leaflet">Leaflet</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more"
                                    role="button">
                                    <i class="bx bx-file icon nav-icon"></i>
                                    <span data-key="t-pages">Pages</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-more">
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-authentication" role="button">
                                            <span data-key="t-authentication">Authentication</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-authentication">
                                            <a href="auth-login" class="dropdown-item" data-key="t-login">Login</a>
                                            <a href="auth-register" class="dropdown-item"
                                                data-key="t-register">Register</a>
                                            <a href="auth-recoverpw" class="dropdown-item"
                                                data-key="t-recover-password">Recover Password</a>
                                            <a href="auth-lock-screen" class="dropdown-item"
                                                data-key="t-lock-screen">Lock Screen</a>
                                            <a href="auth-logout" class="dropdown-item"
                                                data-key="t-logout">Logout</a>
                                            <a href="auth-confirm-mail" class="dropdown-item"
                                                data-key="t-confirm-mail">Confirm Mail</a>
                                            <a href="auth-email-verification" class="dropdown-item"
                                                data-key="t-email-verification">Email Verification</a>
                                            <a href="auth-two-step-verification" class="dropdown-item"
                                                data-key="t-two-step-verification">Two Step Verification</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-utility" role="button">
                                            <span data-key="t-utility">Utility</span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                            <a href="pages-starter" class="dropdown-item"
                                                data-key="t-starter-page">Starter Page</a>
                                            <a href="pages-maintenance" class="dropdown-item"
                                                data-key="t-maintenance">Maintenance</a>
                                            <a href="pages-comingsoon" class="dropdown-item"
                                                data-key="t-coming-soon">Coming Soon</a>
                                            <a href="pages-timeline" class="dropdown-item"
                                                data-key="t-timeline">Timeline</a>
                                            <a href="pages-faqs" class="dropdown-item" data-key="t-faqs">FAQs</a>
                                            <a href="pages-pricing" class="dropdown-item"
                                                data-key="t-pricing">Pricing</a>
                                            <a href="pages-404" class="dropdown-item" data-key="t-error-404">Error
                                                404</a>
                                            <a href="pages-500" class="dropdown-item" data-key="t-error-500">Error
                                                500</a>
                                        </div>
                                    </div>

                                    <a href="layouts-horizontal" class="dropdown-item"
                                        data-key="t-horizontal">Horizontal</a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Default Modal Heading</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                <form id="search-form" action="{{ route('search') }}">
                    <div class="search-box">
                        <div class="position-relative">
                            <input type="text" name="q" id="search"
                                class="form-control rounded bg-light border-0" placeholder="Search...">
                            <i class="bx bx-search search-icon"></i>
                        </div>
                    </div>
                </form>
                <div class="result-search pt-2 d-none">

                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save
                    changes</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@section('search-script')
    <script nonce="newN0nc3ForS3cur1ty" >
        (function($) {
            const myModalEl = document.getElementById('myModal')
            myModalEl.addEventListener('shown.bs.modal', event => {
                $('#search').focus();
            })
            myModalEl.addEventListener('hidden.bs.modal', event => {
                $('.result-search').empty()
                $('.result-search').addClass('d-none')
                $('#search').val('')
            })
            $('#search').keyup(delay(function(e) {
                let q = $(this).val();
                $.ajax({
                    url: "{{ route('searching') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        q: q
                    },
                    success: function(data) {
                        // console.log(data);
                        $('.result-search').empty()
                        $('.result-search').removeClass('d-none')
                        $('.result-search').append(get_results(data))
                    },
                    error: function(request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                }); // ajax 
            }, 400));
        })(jQuery);

        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this,
                    args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }

        function get_results(data) {
            var result = '';
            if (data.deals)
                data.deals.forEach(deal => {
                    result += search_result_deal(deal)
                });
            if (data.travels)
                data.travels.forEach(travel => {
                    result += search_result_travel(travel)
                });
            return result;
        }

        function search_result_travel(travel) {
            return `
            <div class="list-group mt-2">
                <div class="list-group-item list-group-item-action px-3 pt-3">
                    <div>
                        <a href="#" class="mb-0 h6">${travel.name}</a>
                        <a href="#" class="badge rounded-pill bg-success">Travel Report</a>
                        ${ badge_practice_areas(travel.practice_areas) }
                    </div>
                    <small class="lh-1">${travel.start_date}</small>
                    <div class="m-0 text-truncate">${travel.purpose}</div>
                    <p class="mb-1">
                        <small class="mb-0 fw-semibold">Clients: </small>
                        ${ badge_clients(travel.clients) }
                    </p>
                    <p class="mb-1">
                        <small class="mb-0 fw-semibold">Client Referees: </small>
                        ${ badge_contacts(travel.contacts) }
                    </p>
                    <div class="partners">
                        <small class="mb-0 fw-semibold">Partners: </small>
                        ${ badge_partners(travel.partners) }
                    </div>
                </div>
            </div>`
        }

        function search_result_deal(deal) {
            return `
            <div class="list-group mt-2">
                <div class="list-group-item list-group-item-action px-3 pt-3">
                    <div>
                        <a href="#" class="mb-0 h6">${deal.name}</a>
                        <a href="#" class="badge rounded-pill bg-warning text-bg-secondary">Deal Report</a>
                        ${ badge_practice_areas(deal.practice_areas) }
                    </div>
                    <small class="lh-1">${deal.date_completion}</small>
                    <div class="m-0 text-truncate">${deal.summary}</div>
                    <p class="mb-1">
                        <small class="mb-0 fw-semibold">Clients: </small>
                        ${ badge_clients(deal.clients) }
                    </p>
                    <p class="mb-1">
                        <small class="mb-0 fw-semibold">Client Referees: </small>
                        ${ badge_contacts(deal.contacts) }
                    </p>
                    <div class="partners">
                        <small class="mb-0 fw-semibold">Partners: </small>
                        ${ badge_partners(deal.partners) }
                    </div>
                </div>
            </div>`
        }

        function badge_practice_areas(practice_areas) {
            var result = '';
            if (practice_areas)
                practice_areas.forEach(practice_area => {
                    result += `<a href="#" class="badge bg-primary-subtle text-primary">${practice_area.name}</a>`;
                });
            return result;
        }

        function badge_clients(clients) {
            var result = '';
            if (clients)
                clients.forEach(client => {
                    result += `<a href="#" class="badge bg-primary-subtle text-primary">${client.name}</a>`;
                });
            return result;
        }

        function badge_contacts(contacts) {
            var result = '';
            if (contacts)
                contacts.forEach(contact => {
                    result += `<a href="#" class="badge bg-dark">${contact.name}</a>`;
                });
            return result;
        }

        function badge_partners(partners) {
            var result = '';
            if (partners)
                partners.forEach(partner => {
                    result += `<a href="#" class="link-body-emphasis">${partner.name}</a>, `;
                });
            return result;
        }
    </script>
@endsection

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('sweetalert/sweetalert.css')}}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-database"> </i>
                                Statistics
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Projects
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">

                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">

                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesión') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                    </div>

                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button"
                                        class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-theme-settings">
           
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Gestion de Usuarios</li>
                            <li>
                                <a href="{{asset('Rol')}}">
                                    <i class="metismenu-icon pe-7s-global">
                                    </i>Roles
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Usuario')}}">
                                    <i class="metismenu-icon pe-7s-global">
                                    </i>Registrar Usuarios
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Proyectos</li>
                            <li>
                                <a href="{{asset('Proyecto')}}">
                                    <i class="metismenu-icon pe-7s-graph">
                                    </i>Proyectos
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Cliente')}}">
                                    <i class="metismenu-icon pe-7s-portfolio">
                                    </i>Clientes
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Tipo_de_poblacion')}}">
                                    <i class="metismenu-icon pe-7s-map">
                                    </i>Tipos de Poblaciones
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Encuesta')}}">
                                    <i class="metismenu-icon pe-7s-note2">
                                    </i>Encuestas
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Asignacion_encuesta')}}">
                                    <i class="metismenu-icon pe-7s-pen">
                                    </i>Asignacion Encuestas
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Formularios</li>
                            <li>
                                <a href="{{asset('Formulario')}}">
                                    <i class="metismenu-icon pe-7s-menu">
                                    </i>Formularios
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Gestion de preguntas</li>
                            <li>
                                <a href="{{asset('Pregunta')}}">
                                    <i class="metismenu-icon pe-7s-help1">
                                    </i>Preguntas
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Tipo_de_pregunta')}}">
                                    <i class="metismenu-icon pe-7s-eyedropper">
                                    </i>Tipos de Preguntas
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Opcione')}}">
                                    <i class="metismenu-icon pe-7s-more">
                                    </i>Opciones Preguntas
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Form_preg')}}">
                                    <i class="metismenu-icon pe-7s-menu">
                                    </i>Forms. Preguntas
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Respuesta')}}">
                                    <i class="metismenu-icon pe-7s-check">
                                    </i>Respuestas
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('Flujo')}}">
                                    <i class="metismenu-icon pe-7s-way">
                                    </i>Flujos
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Usuarios</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-gleam icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>
                                    Resumen Del Proyecto
                                    <div class="page-title-subheading">Estado actual de proyecto - Informacion en tiempo
                                        Real
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="Example Tooltip"
                                    data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Buttons
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                        Inbox
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Book
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Picture
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                                    <i class="nav-link-icon lnr-file-empty"></i>
                                                    <span>
                                                        File Disabled
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('contenido')



                    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                </div>
            </div>
            <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
            <script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
            
            @include('sweet::alert')

            <script src="{{asset('js/Bootstrap/Select/bootstrap-select.js')}}"></script>

            <script type="text/javascript">
                $('.selectpicker').selectpicker({
                });
            </script>
</body>

</html>

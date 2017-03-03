<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title or 'need title' }}</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    {{ HTML::style('admin/css/site.min.css'); }}
    @yield('css')


</head>
<body>
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                @include('moderators.include.logo')
            </div>

            <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
                @include('moderators.include.top_left_menu')
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
                @include('moderators.include.menu')
            </div>

            <div class="col-xs-12 col-sm-9 content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $title or 'Need a title' }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        @include('moderators.include.message')

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
        <script src="/admin/js/html5shiv.js"></script>
        <script src="/admin/js/respond.min.js"></script>
    <![endif]-->
    {{ HTML::script('admin/js/site.min.js'); }}
    @yield('js')
</body>
</html>

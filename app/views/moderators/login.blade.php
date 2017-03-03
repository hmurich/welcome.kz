<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вход в модераторскую зону</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="/admin/css/site.min.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/admin/js/site.min.js"></script>
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #303641;
            color: #C1C3C6
        }
    </style>
</head>
<body>
    <div class="container">
        @include('moderators.include.message')

        <form class="form-signin" role="form" action="{{ action('ModeratorController@postLogin') }}" method="post">
            <h3 class="form-signin-heading" style='text-align: center; margin-bottom: 20px;'>Форма входа</h3>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" autocomplete="off" required=""/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class=" glyphicon glyphicon-lock "></i>
                    </div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required="" />
                </div>
            </div>
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        </form>
    </div>
    <div class="clearfix"></div>
</body>
</html>

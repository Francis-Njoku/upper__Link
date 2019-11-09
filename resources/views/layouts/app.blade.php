<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

</head>
<body>
    <div id="app">

        <main class="py-4">
        @include('inc.navbar')
        <div class="container">
                @include('inc.message')
            @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ url('/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
            <script>
               $(document).ready(function() {
                src = "{{ route('searchajax') }}";
                 $("#search_text").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: src,
                            dataType: "json",
                            data: {
                                term : request.term
                            },
                            success: function(data) {
                                response(data);

                            }
                        });
                    },
                    minLength: 3,

                });
            });
            </script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
        CKEDITOR.replace('article-ckeditor');
        </script>
    <script src="{{ asset('js/admin_crud.js') }}" defer></script>
</body>
</html>

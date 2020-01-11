<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ url('assets/dist') }}/bootstrap-tagsinput.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets') }}/sweetalert/css/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('forminformation.index') }}">
                                         Form Information          
                                    </a>
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<!-- //<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

    <script src="{{ url('assets')}}/js/bootstrap-notify.js"></script>
    <script src="{{url('assets')}}/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{ url('assets') }}/sweetalert/js/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script src="{{ url('assets') }}/js/custom.js"></script>
         <script type="text/javascript">


                $(document).ready(function() {


                $(".add-more").click(function(){ 
                    var html = $(".copy").html();
                    $(".after-add-more").append(html);
                    // $('.custom-tag').tagsinput('destroy');
                    $('.custom-tag').tagsinput('refresh', {preventPost: true});

            
                });
             

               

                  // $('input').tagsinput({
                  //   onTagExists: function(item, $tag) {
                  //     $tag.hide().fadeIn();
                  //   }
                  // });

                    @if (session()->has('error'))
                          $.notify({
                              message: "{{ session('error') }}"
                              },{
                              type: 'danger',
                              timer: 1000,
                              placement: {
                                  from: 'bottom',
                                  align: 'right'
                              }
                          }); 
                        @endif
                        @if (session()->has('success'))
                          $.notify({
                              message: "{{ session('success') }}"
                              },{
                              type: 'success',
                              timer: 1000,
                              placement: {
                                  from: 'bottom',
                                  align: 'right'
                              }
                          }); 
                    @endif


                });

                $('body').on('change', '.input-types', function() {
                    _self=$(this);
                     if( (_self.val()==2) || _self.val()==3){
                        _self.parents('.col-sm-2').siblings('.custom-input-tags').show();
                    }else{
                        _self.parents('.col-sm-2').siblings('.custom-input-tags').hide();
                    }
                     console.log(_self.parents('.col-sm-2').siblings('.custom-input-tags').find('input').val());
              // Action goes here.
                });
                

        </script>

</html>

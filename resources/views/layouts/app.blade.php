<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trại Giam Phú Sơn</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-4.5.0/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--                <img src="https://w7.pngwing.com/pngs/310/332/png-transparent-computer-icons-home-house-desktop-service-home-blue-logo-room.png" alt="" width="5%" height="auto">--}}
                Trang chủ
            </a>

            <!-- Authentication Links -->
            @guest
                {{--                            <li class="nav-item">--}}
                {{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                {{--                            </li>--}}
                {{--                                                    @if (Route::has('register'))--}}
                {{--                                                        <li class="nav-item">--}}
                {{--                                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                {{--                                                        </li>--}}
                {{--                                                    @endif--}}
            @else
                <a class="navbar-brand" href="{{ url('/ncc') }}">Nhà cung cấp</a>
                <a class="navbar-brand" href="" data-toggle="modal" data-target="#exampleModal">Xuất Excel</a>
                {{--            <!-- Right Side Of Navbar -->--}}
            <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{route('export_excel_month')}}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xuất file excel theo tháng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="i4">Chọn tháng:</label>
                                    </div>
                                    <div class="container">
                                        <div class="col-sm-12" style="height:130px;">
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker10'>
                                                    <input type='text' class="form-control" name="month"/>
                                                    <span class="input-group-addon">
                                                    <i class="btn btn-success">Chọn tháng</i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Tải xuống</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                             style="position: absolute;">
                            <a class="dropdown-item" href="{{asset('/my-profile')}}">Thông tin cá nhân</a>
                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">Thêm tài khoản</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            @endguest

        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="{{ asset('bootstrap-4.5.0/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>

{{--<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>--}}
<script type="text/javascript">
    $(function () {
        $('#datetimepicker10').datetimepicker({
            viewMode: 'years',
            format: 'MM/YYYY',
        });
    });
</script>
</body>
</html>

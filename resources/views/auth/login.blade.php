
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>Авторизация</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/bash.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/pages/login/login-2.css')}}" rel="stylesheet" type="text/css" />
    </head>

	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable">

		<div class="d-flex flex-column flex-root">
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
					<div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
						<div class="d-flex flex-column-fluid flex-column flex-center">
							<div class="login-form login-signin py-11">
                                @if (count($errors) > 0)
                                    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}" class="form" novalidate="novalidate">
									@csrf
									<div class="text-center pb-8">
										<h2 class="font-weight-bolder text-dark">Вход в панель администрирования</h2>
									</div>
									<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Логин</label>
										<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="login" autocomplete="on" />
									</div>
									<div class="form-group">
										<div class="d-flex justify-content-between mt-n5">
											<label class="font-size-h6 font-weight-bolder text-dark pt-5">Пароль</label>
										</div>
										<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
									</div>
									<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
										<div class="checkbox-inline">
											<label class="checkbox m-0 text-muted">
											<input type="checkbox" name="remember">
											<span></span>Запомнить меня</label>
										</div>
										{{-- <a href="{{route('password.request')}}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary">Забыли пароль ?</a> --}}
									</div>
									<div class="text-center pt-2">
										<button type="submit" class="btn border-0 font-weight-bolder font-size-h6 px-8 py-4 my-3" style="background-color: #B1DCED">Вход</button>
									</div>
								</form>
                            </div>
						</div>
					</div>
				</div>
                <div class="content order-1 order-lg-2 d-lg-flex flex-column w-100 pb-0 d-none" style="background-color: #B1DCED;">
                    <div class="d-flex flex-column-fluid flex-lg-center">
                        <div class="d-flex flex-column justify-content-center w-100">
                            <img class="img-fluid" src="{{asset('img/logo.png')}}" style="max-width: 400px; margin: auto" alt="">
                        </div>
                    </div>
                </div>
            </div>
		</div>

		<script>
			let HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
		</script>

		<script>
			let KTAppSettings = {
				"breakpoints": {
					"sm": 576,
					"md": 768,
					"lg": 992,
					"xl": 1200,
					"xxl": 1200
				},
				"colors": {
					"theme": {
						"base": {
							"white": "#ffffff",
							"primary": "#0BB783",
							"secondary": "#E5EAEE",
							"success": "#1BC5BD",
							"info": "#8950FC",
							"warning": "#FFA800",
							"danger": "#F64E60",
							"light": "#F3F6F9",
							"dark": "#212121"
						},
						"light": {
							"white": "#ffffff",
							"primary": "#D7F9EF",
							"secondary": "#ECF0F3",
							"success": "#C9F7F5",
							"info": "#EEE5FF",
							"warning": "#FFF4DE",
							"danger": "#FFE2E5",
							"light": "#F3F6F9",
							"dark": "#D6D6E0"
						},
						"inverse": {
							"white": "#ffffff",
							"primary": "#ffffff",
							"secondary": "#212121",
							"success": "#ffffff",
							"info": "#ffffff",
							"warning": "#ffffff",
							"danger": "#ffffff",
							"light": "#464E5F",
							"dark": "#ffffff"
						}
					},
					"gray": {
						"gray-100": "#F3F6F9",
						"gray-200": "#ECF0F3",
						"gray-300": "#E5EAEE",
						"gray-400": "#D6D6E0",
						"gray-500": "#B5B5C3",
						"gray-600": "#80808F",
						"gray-700": "#464E5F",
						"gray-800": "#1B283F",
						"gray-900": "#212121"
					}
				},
				"font-family": "Poppins"
			};
		</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>

	</body>
</html>

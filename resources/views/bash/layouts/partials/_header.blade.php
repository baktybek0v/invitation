<div id="kt_header" class="header flex-column header-fixed">
	<div class="header-top">
		<div class="container-fluid">
			<div class="d-none d-lg-flex align-items-center mr-3">
				{{--<a href="{{route('bash.index')}}" class="mr-4">
					<h5 class="d-none text-light d-lg-flex align-items-center mr-10 mb-0 font-weight-normal">Админ панель</h5>
				</a>--}}
                <a href="{{route('bash.index')}}">
                    <img alt="Logo" src="{{asset('img/logo.png')}}" class="max-h-100px" />
                </a>
				{{--<div class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-500px">
					<h6 class="d-none text-light d-lg-flex align-items-center mr-10 mb-0 font-weight-normal">Админ панель</h6>
                </div>--}}
			</div>
			<div class="topbar">
				{{--<div class="dropdown">
					<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
						<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-4">
							@if(LaravelLocalization::getCurrentLocale() == 'ru')
							<img class="h-20px w-20px rounded-sm" src="{{asset('assets/media/svg/flags/248-russia.svg')}}"/>
							@elseif(LaravelLocalization::getCurrentLocale() == 'ky')
							<img class="h-20px w-20px rounded-sm" src="{{asset('assets/media/svg/flags/152-kyrgyzstan.svg')}}"/>
							@endif
						</div>
					</div>
					<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
						<ul class="navi navi-hover py-4">
							<li class="navi-item">
								@if(LaravelLocalization::getCurrentLocale() != 'ru')
								<a href="{{ LaravelLocalization::getLocalizedURL('ru', null, [], true) }}" class="navi-link">
									<span class="symbol symbol-20 mr-3">
										<img src="{{asset('assets/media/svg/flags/248-russia.svg')}}"/>
									</span>
									<span class="navi-text">Русский</span>
								</a>
								@elseif(LaravelLocalization::getCurrentLocale() != 'ky')
								<a href="{{ LaravelLocalization::getLocalizedURL('ky', null, [], true) }}" class="navi-link">
									<span class="symbol symbol-20 mr-3">
										<img src="{{asset('assets/media/svg/flags/152-kyrgyzstan.svg')}}"/>
									</span>
									<span class="navi-text">Кыргыз</span>
								</a>
								@endif
							</li>
						</ul>
					</div>
				</div>--}}
				<div class="dropdown">
					<div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
						<div class="btn btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
							<div class="d-flex flex-column text-right pr-3">
                                <span class="text-dark-50 font-weight-bolder font-size-base d-md-inline">{{auth()->user()->getRoleNames()->first()}}</span>
								<span class="text-muted font-weight-bold font-size-base d-md-inline">Здравствуйте, {{auth()->user()->name}}</span>
							</div>
							<span class="symbol symbol-35">
								<span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">{{mb_substr(auth()->user()->name, 0, 1, "UTF-8")}}</span>
							</span>
						</div>
					</div>
					<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
						<div class="d-flex align-items-center p-8 rounded-top">
							<div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
								<img src="{{ asset('assets/media/users/default.jpg')}}"/>
							</div>
							<div class="d-flex flex-column">
								<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline">{{auth()->user()->getRoleNames()->first()}}</span>
								<span class="text-muted font-weight-bold font-size-base d-none d-md-inline">{{auth()->user()->name}}</span>
							</div>
						</div>
						<div class="separator separator-solid"></div>
						<div class="navi navi-spacer-x-0 pt-5">
							<a href="{{route('bash.profile')}}" class="navi-item px-8">
								<div class="navi-link">
									<div class="navi-icon mr-2">
										<i class="flaticon2-calendar-3 text-success"></i>
									</div>
									<div class="navi-text">
										<div class="font-weight-bold">Настройки</div>
										<div class="text-muted">Настройки аккаунта</div>
									</div>
								</div>
							</a>
							<div class="navi-separator mt-3"></div>
							<div class="navi-footer px-8 py-5">
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
										Выход из системы
									</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

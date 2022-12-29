<div class="aside aside-left flex-column flex-row-auto" id="kt_aside">
	<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
		<div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1"
			data-menu-dropdown-timeout="500">
			<ul class="menu-nav">

				{{--<li class="menu-item {{ (request()->is(app()->getLocale())) ? 'menu-item-active' : '' }}"
				aria-haspopup="true">
				<a href="{{route('bash.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
							height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path
									d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
									fill="#000000" fill-rule="nonzero" />
								<path
									d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
									fill="#000000" opacity="0.3" />
							</g>
						</svg>
					</span>
					<span class="menu-text">Главная</span>
				</a>
				</li>--}}


				<!-- Панель управление::Begin -->
				<li class="menu-section">
					<h4 class="menu-text">Панель управления</h4>
					<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
				</li>
				<!-- Панель управление::End -->

				<!-- Главная::Begin -->
				<li class="menu-item {{ (request()->is(app()->getLocale())) ? 'menu-item-active' : '' }}"
					aria-haspopup="true">
					<a href="{{route('bash.index')}}" class="menu-link">
						<span class="svg-icon menu-icon">
							<i class="menu-icon flaticon-home-1"></i>
						</span>
						<span class="menu-text">Главная</span>
					</a>
				</li>
				<!-- Главная::End -->

				<!-- События::Begin -->
				<li class="menu-item {{ (request()->is(app()->getLocale().'/events')) ? 'menu-item-active' : '' }}"
					aria-haspopup="true">
					<a href="{{route('bash.events.index')}}" class="menu-link">
						<span class="svg-icon menu-icon">
							<i class="menu-icon flaticon-event-calendar-symbol"></i>
						</span>
						<span class="menu-text">События</span>
					</a>
				</li>
				<!-- События::End -->

				<!-- Отчёты::Begin -->
				{{-- <li class="menu-item {{ (request()->is(app()->getLocale().'/calendar_drivers')) ? 'menu-item-active' : '' }}"
					aria-haspopup="true">
					<a href="#" class="menu-link">
						<span class="svg-icon menu-icon">
							<i class="menu-icon flaticon2-browser-2"></i>
						</span>
						<span class="menu-text">Отчёты</span>
					</a>
				</li> --}}
				<!-- Отчёты::End -->


				<!-- Почты::Start -->
				<li class="menu-item {{ (request()->is(app()->getLocale().'/emails')) ? 'menu-item-active' : '' }}"
					aria-haspopup="true">
					<a href="{{route('bash.emails.index')}}" class="menu-link">
						<span class="svg-icon menu-icon">
							<i class="menu-icon flaticon-multimedia-2"></i>
						</span>
						<span class="menu-text">Почта</span>
					</a>
				</li>
				<!-- Почты::End -->


				<!-- Система::Begin -->
				{{--   @canany('log-index', 'users-index', 'permissions-index')
                    <li class="menu-section">
                        <h4 class="menu-text">Система</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>
                @endcanany --}}
				<!-- Система::End -->



				<!-- Журнал действий::Begin -->
				{{--    @can('log-index')
                    <li class="menu-item  {{ (request()->is(app()->getLocale().'/activity*')) ? 'menu-item-active' : '' }}"
				aria-haspopup="true">
				<a href="/activity" class="menu-link">
					<span class="svg-icon menu-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
							version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path
									d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
									fill="#000000" opacity="0.3" />
								<path
									d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
									fill="#000000" />
								<rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
								<rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
								<rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
								<rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
								<rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
								<rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
							</g>
						</svg>
					</span>
					<span class="menu-text">Журнал действий</span>
				</a>
				</li>
				@endcan --}}
				<!-- Журнал действий::End -->


				<!-- Локализация::Begin -->
				<li class="menu-item {{ (request()->is(app()->getLocale().'/translations*')) ? 'menu-item-active' : '' }}"
				aria-haspopup="true">
				<a href="{{route('bash.translations.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
							height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path
									d="M3,19 L5,19 L5,21 L3,21 L3,19 Z M8,19 L10,19 L10,21 L8,21 L8,19 Z M13,19 L15,19 L15,21 L13,21 L13,19 Z M18,19 L20,19 L20,21 L18,21 L18,19 Z"
									fill="#000000" opacity="0.3" />
								<path
									d="M10.504,3.256 L12.466,3.256 L17.956,16 L15.364,16 L14.176,13.084 L8.65000004,13.084 L7.49800004,16 L4.96000004,16 L10.504,3.256 Z M13.384,11.14 L11.422,5.956 L9.42400004,11.14 L13.384,11.14 Z"
									fill="#000000" />
							</g>
						</svg>
					</span>
					<span class="menu-text">Локализация</span>
				</a>
				</li>
				<!-- Локализация::End -->


				<!-- Пользователи::Begin -->
				{{--  @can('users-index')
                    <li class="menu-item {{ (request()->is(app()->getLocale().'/users*')) ? 'menu-item-active' : '' }}"
				aria-haspopup="true">
				<a href="{{route('bash.users.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
							version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"></rect>
								<path
									d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
									fill="#000000"></path>
							</g>
						</svg>
					</span>
					<span class="menu-text">Пользователи</span>
				</a>
				</li>
				@endcan --}}
				<!-- Пользователи::End -->


				{{-- @canany('users-index', 'roles-index', 'permissions-index')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="#" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
                                        <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Контроль доступа</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{route('bash.roles.index')}}" class="menu-link">
				<i class="menu-bullet menu-bullet-line">
					<span></span>
				</i>
				<span class="menu-text">Роли</span>
				</a>
				</li>
				<li class="menu-item" aria-haspopup="true">
					<a href="{{route('bash.permissions.index')}}" class="menu-link">
						<i class="menu-bullet menu-bullet-line">
							<span></span>
						</i>
						<span class="menu-text">Права</span>
					</a>
				</li>
			</ul>
		</div>
		</li>
		@endcanany --}}
		</ul>
	</div>
</div>
</div>
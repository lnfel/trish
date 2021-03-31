<nav
	x-data="{ scrollAtTop: true }"
	class="flex fixed w-full items-center justify-between px-6 h-16 text-white z-10"
	:class="{ 'shadow-md' : !scrollAtTop }"
	@scroll.window="scrollAtTop = (window.pageYOffset > 45) ? false : true"
>
	<div class="flex items-center">
		<button aria-label="Open Menu" class="menu-btn rounded border-2 border-transparent hover:border-white focus:outline-none mr-2">
			<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
				<path d="M4 6h16M4 12h16M4 18h16"></path>
			</svg>
		</button>
		<h1 class="text-2xl font-medium font-sans tracking-wider"><a href="{{ URL::to('/') }}">{{ config('app.name', 'Laravel') }} &#12290;</a></h1>
	</div>
	<div class="flex items-center hidden md:block">
		<!-- horizontal nav -->
		@auth('web')
			<a class="px-4 py-2 mr-2 font-medium tracking-wider hover:underline" href="{{ URL::to('/') }}">{{ __('Home') }}</a>	
		@endauth

		@auth('admin')
			<a class="px-4 py-2 mr-2 font-medium tracking-wider hover:underline" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
		@endauth
		
		<a class="px-4 py-2 mr-2 font-medium tracking-wider hover:underline" href="{{ Auth::guard('admin')->check() ? route('services.index') : URL::to('/community-services') }}">{{ __('Services') }}</a>
		@guest
		<a class="px-4 py-2 mr-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 {{ Route::current()->getName() == 'login' ? 'hidden' : 'inline' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
		<a class="px-4 py-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 {{ Route::current()->getName() == 'register' || '/' ? 'hidden' : 'inline' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
		@endguest

		
		@if(Auth::guard('admin')->check() && Route::current()->getName() !== 'index')
			<div x-data="{ dropdownOpen: false }" class="relative inline">
				<button @click="dropdownOpen = !dropdownOpen" class="relative px-4 py-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline cursor-pointer">
					{{ Auth::user()->first_name }} <i class="fas fa-ellipsis-v ml-4"></i>
				</button>

				<div x-show="dropdownOpen" x-cloak="" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 text-left w-48 bg-white rounded overflow-hidden shadow-xl z-20">
					<form method="POST" action="{{ route('admin.logout') }}" class="block mb-0">
						@csrf
						<button type="submit" class="w-full px-4 py-2 text-left text-sm text-gray-800 bg-white hover:bg-gray-200 border-b focus:outline-none focus:shadow-outline cursor-pointer"><i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}</button>
					</form>
				</div>
			</div>
		@elseif(Auth::guard('web')->check() && Route::current()->getName() !== 'admin.dashboard')
			<div x-data="{ dropdownOpen: false }" class="relative inline">
				<button @click="dropdownOpen = !dropdownOpen" class="relative px-4 py-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline cursor-pointer">
					{{ Auth::user()->name }} <i class="fas fa-ellipsis-v ml-4"></i>
				</button>

				<div x-show="dropdownOpen" x-cloak="" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 text-left w-48 bg-white rounded overflow-hidden shadow-xl z-20">
					<a href="{{ route('appointments.index') }}" class="block px-4 py-2 text-sm text-gray-800 bg-white hover:bg-gray-200 border-b">My Appointments</a>
					<form method="POST" action="{{ route('user.logout') }}" class="block">
						@csrf
						<button type="submit" class="w-full px-4 py-2 text-left text-sm text-gray-800 bg-white hover:bg-gray-200 border-b focus:outline-none focus:shadow-outline cursor-pointer"><i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}</button>
					</form>
				</div>
			</div>
		@endif
	</div>
	<div class="overlay z-10 fixed inset-0 transition-opacity" style="display: none;">
		<div tabindex="0" class="absolute inset-0 bg-black opacity-50"></div>
	</div>
	<aside x-data="" x-cloak class="main-menu text-gray-700 flex flex-col justify-between transform top-0 left-0 bg-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30 -translate-x-full">
		<h1 class="text-2xl bg-green-600 font-sans tracking-wider border-b py-4 px-6 mb-4">{{ config('app.name', 'Laravel') }} &#12290;</h1>
		<ul class="flex flex-col flex-1 justify-start text-xl">
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="{{ Auth::guard('admin')->check() ? route('services.index') : route('client.services') }}" data-target="1"><i class=""></i> Services</a>
			</li>
			@if(Auth::guard('admin')->check())
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="{{ route('requirements.index') }}" data-target="1"><i class=""></i> Requirements</a>
			</li>
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="{{ route('slots.index') }}" data-target="1"><i class=""></i> Slots</a>
			</li>
			@endif
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="{{ Auth::guard('admin')->check() ? route('client.user.appointments') : route('appointments.index') }}" data-target="1"><i class=""></i> Appointments</a>
			</li>
			@if(Auth::guard('web')->check())
				<li class="mb-2">
					<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="{{ route('appointments.renew.index') }}" data-target="1"><i class=""></i> Renew</a>
				</li>
			@endif
		</ul>
		<div class="p-4 text-center text-sm">
			<!-- <span>Courtesy of <a class="text-indigo-700 font-bold" href="http://bk2o1.tk/">BK2o1</a></span> -->
		</div>
	</aside>
</nav>
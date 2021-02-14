<nav class="flex fixed w-full items-center justify-between px-6 h-16 text-gray-700 z-10">
	<div class="flex items-center">
		<button aria-label="Open Menu" class="menu-btn hover:text-yellow-700 focus:outline-none mr-2">
			<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
				<path d="M4 6h16M4 12h16M4 18h16"></path>
			</svg>
		</button>
		<h1 class="text-2xl font-sans tracking-wider">{{ config('app.name', 'Laravel') }} &#12290;</h1>
	</div>
	<div class="flex items-center hidden md:block">
		<!-- horizontal nav -->
		<a class="px-4 py-2 mr-2 font-bold hover:underline" href="{{ URL::to('/') }}">{{ __('Home') }}</a>
		<a class="px-4 py-2 mr-2 font-bold hover:underline" href="#">{{ __('Services') }}</a>
		@guest
		<a class="px-4 py-2 mr-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 {{ Route::current()->getName() == 'login' ? 'hidden' : 'inline' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
		<a class="px-4 py-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 {{ Route::current()->getName() == 'register' || '/' ? 'hidden' : 'inline' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
		@endguest

		
		@if(Auth::guard('admin')->check() && Route::current()->getName() !== 'index')
			<form method="POST" action="{{ route('admin.logout') }}" class="inline">
				@csrf
				<button type="submit" class="px-4 py-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline cursor-pointer">{{Auth::guard('web')->check() ? 'true' : 'false'}} {{Auth::guard('admin')->check()}} {{ Auth::user()->first_name }} {{ __('Logout') }}</button>
			</form>
		@elseif(Auth::guard('web')->check() && Route::current()->getName() !== 'admin.dashboard')
			<form method="POST" action="{{ route('user.logout') }}" class="inline">
				@csrf
				<button type="submit" class="px-4 py-2 font-bold text-white rounded bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline cursor-pointer">{{ Auth::user()->name }} {{ __('Logout') }}</button>
			</form>
		@endif

		@auth('admin')
			
		@endauth

		@auth('web')
			
		@endauth
	</div>
	<div class="overlay z-10 fixed inset-0 transition-opacity" style="display: none;">
		<div tabindex="0" class="absolute inset-0 bg-black opacity-50"></div>
	</div>
	<aside class="main-menu flex flex-col justify-between transform top-0 left-0 bg-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30 -translate-x-full">
		<h1 class="text-2xl font-sans tracking-wider border-b py-4 px-6 mb-4">Online Baranggay Services &#12290;</h1>
		<ul class="flex flex-col flex-1 justify-start text-xl">
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="#" data-target="1"><i class="fas fa-snowflake"></i> Menu</a>
			</li>
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="#" data-target="2"><i class="fas fa-seedling"></i> Menu</a>
			</li>
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white" href="#" data-target="3"><i class="fas fa-sun"></i> Menu</a>
			</li>
			<li class="mb-2">
				<a class="nav-item block px-4 py-2 hover:bg-blue-500 hover:text-white active" href="#" data-target="4"><i class="fab fa-canadian-maple-leaf transform rotate-45"></i> Menu</a>
			</li>
		</ul>
		<div class="p-4 text-center text-sm">
			<!-- <span>Courtesy of <a class="text-indigo-700 font-bold" href="http://bk2o1.tk/">BK2o1</a></span> -->
		</div>
	</aside>
</nav>
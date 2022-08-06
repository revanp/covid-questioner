<nav class="main-header navbar navbar-expand border-bottom-0 navbar-light navbar-white">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" v-pre>
				{{ Auth::user()->name }} <i class="ti-angle-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="{{ route('logout') }}">
					<i class="ti-power-off text-primary"></i> {{ __('Logout') }}
				</a>
			</div>
		</li>
	</ul>
</nav>
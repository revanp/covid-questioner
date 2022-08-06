<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-navy">
	<a href="{{ url('admin/') }}" class="brand-link text-center">
		<span class="brand-text"><b>Covid</b> Questioner</span>
	</a>

	<div class="sidebar">
		<nav class="mt-3">
			<ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="{{ url('') }}" class="nav-link @if(Request::is('/')) active @endif">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ url('admin/participants') }}" class="nav-link @if(Request::is('admin/participants')) active @endif">
						<i class="nav-icon fa fa-pencil-alt"></i>
						<p>Peserta</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ url('admin/questions') }}" class="nav-link @if(Request::is('admin/questions')) active @endif">
						<i class="nav-icon fa fa-list-alt"></i>
						<p>Pertanyaan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ url('admin/users') }}" class="nav-link @if(Request::is('admin/users')) active @endif">
						<i class="nav-icon fa fa-users"></i>
						<p>Akun Pengguna</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
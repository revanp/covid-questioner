@extends('layouts.app-admin')
@section('title', $title)

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3 class="m-0 text-dark">{{ $title }}</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">{{ $title }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-6">
				<div class="small-box bg-info">
					<div class="inner">
						<h3>10 KG</h3>

						<p>Stok Barang</p>
					</div>
					<div class="icon">
						<i class="fa fa-list-alt"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
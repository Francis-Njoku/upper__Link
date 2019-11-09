@extends('layouts.app')

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">All Bills</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List of Bills</h1>
			</div>
		</div>
		<!--/.row-->

		<div id="content">
                @include('admin.bills_only')
        </div>
        <!--<div class="loading">
            <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i><br/>
            <span>Loading</span>
        </div> -->
	</div>	<!--/.main-->

@endsection

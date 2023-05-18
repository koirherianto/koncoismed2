@extends('layouts.app')

@section('content')

<section class="createCard" id="createCard">
	<div class="row">
		<div class="col-12">
			<div class="card">
                <div class="border-left-light-blue border-left-6 box-shadow-1 rounded">
				<div class="card-header">
					<h4 class="card-title">Detail Informasi Relawan</h4>
					<a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
        			{{-- <div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div> --}}
                    <div class="col-sm-12">
                        <a class="btn btn-info float-right"
                           href="{{ route('relawans.index') }}">
                                                        @lang('Kembali')
                                                </a>
                    </div>
				</div>
				<div class="card-content">
					<div class="card-body">
						{{-- <p>Card will take any credit card form and make it the best part of the checkout process (without you changing anything). Everything is created with pure CSS, HTML, and jQuery — no images required.</p> --}}
						{{-- <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col-xl-6">
							<div class="grid-item mb-4">
                                <img src="{{$dpt->getFirstMediaUrl()}}"width="300px">
							</div>
                        </div> --}}
                        <div class="col-3">
                        </div>
                        </div>
                        <div class="col-md-12">
                            @include('relawans.show_fields')
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
    </div>
</section>

    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                    @lang('Detail Informasi') @lang('')
                    </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success float-right"
                       href="{{ route('dpts.index') }}">
                                                    @lang('Kembali')
                                            </a>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            @include('dpts.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    
@endsection

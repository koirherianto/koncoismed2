@extends('layouts.app')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
        <h2 class="content-header-title">Feedback</h2>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a>
            </li>
            {{-- <li class="breadcrumb-item"><a href="#"></a>
            </li> --}}
            <li class="breadcrumb-item active">Feedback
            </li>
            </ol>
        </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @include('flash::message')
                <div class="clearfix"></div>
                <div class="card">
                    <div class="border-green border-left-6 box-shadow-1 rounded">
                        <div class="card-content ">
                            @if ($feedbackAbility)
                                <form action="/feedback" method="POST" class="p-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judulFeedback" class="form-label">Judul</label>
                                        <input type="text" name="judulFeedback" class="form-control border-light-green border-darken-4 border-left-6" id="judulFeedback">
                                    </div>
                                    <div class="mb-3">
                                        <label for="feedback"  class="form-label">Feedback</label>
                                        <textarea class="form-control border-light-green border-darken-4 border-left-6" name="feedback" id="feedback" rows="3"></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-green">Kirim</button>

                                </form>
                            @else
                                <h2 class="mx-5 my-3">Feedback anda telah kami terima.</h2>
                                <h6 class="mx-5 my-3"> Anda Bisa mengirimkan feedback setelah 7 hari.</h6>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @include('feedbacks.list') --}}


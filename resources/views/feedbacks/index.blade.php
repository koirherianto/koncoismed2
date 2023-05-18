@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @include('flash::message')
                <div class="clearfix"></div>
                <div class="card">
                    <div class="border-light-blue border-left-6 box-shadow-1 rounded">
                        <div class="card-content ">
                            @if ($feedbackAbility)
                                <form action="/feedback" method="POST" class="p-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judulFeedback" class="form-label">Judul Feedback</label>
                                        <input type="text" name="judulFeedback" class="form-control" id="judulFeedback">
                                    </div>
                                    <div class="mb-3">
                                        <label for="feedback"  class="form-label">Feedback</label>
                                        <textarea class="form-control" name="feedback" id="feedback" rows="3"></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </form>
                            @else
                                <h2 class="mx-5 my-3">Feedback anda telah kami terima.</h2>
                                <h6 class="mx-5 my-3"> Anda Bisa mengirimkan feedback 7 hari sekali.</h6>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @include('feedbacks.list') --}}


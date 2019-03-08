@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('imageupload') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Browse Image') }}</label>
                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control" name="image" required autofocus>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            @if (Session::has('imgname'))
               <div class="alert alert-info">Original Image: <img src="{{URL::asset('/images')}}/{{Session::get('imgname')}}"></div>
            @endif
        </div>
    </div>
</div>
@endsection
   
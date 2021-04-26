@extends('layouts.main')

@section('custom-css')
@endsection

@section('content')
@include('shared._header')

<section class="wrapper">
    <div class="inner">
        @if(session('class'))
            <div class="alert alert-{{session('class')}}">
                <li>{{session('message')}}</li>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <header class="special">
                    <h3>Create video Livestream</h3>
                </header>
                <form class="" action="{{ route('video.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label><i class="text-danger">(*)</i>Title</label>
                        <input name="title" type="text" placeholder="Your title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label><i class="text-danger">(*)</i>Description</label>
                        <input name="description" type="text" placeholder="Description Video" class="form-control" value="{{ old('description') }}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><i class="text-danger">(*)</i>Image Thumb</label>
                        <input type="file" id="input-file" name="img"accept="image/*"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-md pull-right">Create</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <header class="special">
                    <h3>Your List Video Livestream</h3>
                    <p>(Note: Video pending auto delete in 5 mins if you are not livestream)</p>
                </header>
                @include('video._list')
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
@endsection

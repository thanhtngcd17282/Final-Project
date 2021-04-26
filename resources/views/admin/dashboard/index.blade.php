@extends('admin.layouts.app')

@section('title','Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-xl-4 col-sm-6 mb-6">
        @include('admin/dashboard/_users')
    </div>
    <div class="col-xl-4 col-sm-6 mb-6">
        @include('admin/dashboard/_videos')
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="page-header">
      <h1>Videos</h1>
    </div>

    @include ('admin/videos/_list')
@endsection

@extends('layouts.main')

@section('custom-css')

@endsection

@section('content')
@include('shared._header')

<section class="wrapper">
    <div class="inner">
        <h3>Search</h3>
        <form class="input-group rounded" method="post" action="{{ route('search') }}">
            @csrf
            <input type="search" name="key" class="form-control rounded" placeholder="Search" aria-label="Search"
              aria-describedby="search-addon"/>
            <button type="submit" class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <br><br>
        @include('search._list')
    </div>
</section>

@endsection

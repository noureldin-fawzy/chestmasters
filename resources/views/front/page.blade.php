@extends('layouts.front')

@section('special-styles')
@endsection

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="editor">
                <h2 class="inner-title">{{ $page->title }}</h2>
                <img src="{{ Voyager::image($page->image) }}" class="img-fluid editor-img">
                <p class="inner-text mb-0">

                  {!! $page->body !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('special-scripts')
@endsection

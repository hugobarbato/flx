@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '') 
@section('message')  
<div class="text-wrapper">
    <div class="title" data-content="404">
        404
    </div>

    <div class="subtitle">
        Oops, a página que você está procurando não existe.
    </div>

    <div class="buttons">
        <a class="button" href="/">Home Page</a>
    </div>
    <!-- __('Server Error') -->
</div>
@endsection
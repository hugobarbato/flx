@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '') 
@section('message')  
<div class="text-wrapper">
    <div class="title" data-content="404">
        403
    </div>

    <div class="subtitle">
        Acesso negado :( 
    </div>

    <div class="buttons">
        <a class="button" href="/">Home Page</a>
    </div>
    <!-- __('Server Error') -->
</div>
@endsection

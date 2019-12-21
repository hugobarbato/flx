@extends('errors::minimal')
<!--  --> 
@section('title', __('Server Error'))
@section('code', '') 
@section('message')  
<div class="text-wrapper">
    <div class="title" data-content="404">
        500
    </div>

    <div class="subtitle">
        Oops, algo de errado.
    </div>

    <div class="buttons">
        <a class="button" href="/">Home Page</a>
    </div>
    <!-- __('Server Error') -->
</div>
@endsection
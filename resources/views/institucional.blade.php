@extends('layouts.app')
@section('title',$site->nm_titulo)
@section('content') 
    <article>
        <div class="container">
            <div class="container-home">
            {!! $site->ds_site !!}
            </div>
        </div>
    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script> 
  
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
<style>
 
</style>
@endsection
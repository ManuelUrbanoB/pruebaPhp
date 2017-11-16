@extends('layouts.principal')
@section('head')
@endsection
@section('content')
@if(count($errors)>0)
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    <ui>
    @foreach($errors->all() as $error)
        <li>{!!$error!!}</li>
    @endforeach
    </ui>
</div>
@endif
    <div class="container center">
    <h2>Crear Empleado</h2>
    <br>
        <div class="center">
       <div class="alert alert-info">
         Los campos con asteriscos (*) son obligatorios
        </div>
            <br>
            {!!Form::open(['route'=>'empleado.store','method'=>'POST','class'=>'form-horizontal','id'=>'form-empleado'])!!}
               @include('empleado.form')
            {!!Form::close()!!}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://demo.expertphp.in/js/jquery.validate.min.js"></script>
    <script  type = "text/javascript" src="../js/jquery.validate.js"></script>
    
    
@endsection
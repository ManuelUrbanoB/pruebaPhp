@extends('layouts.principal')
@section('content')
    <div class="container center">
    <h2>Actualizar Empleado</h2>
    <br>
        <div class="center">
       <div class="alert alert-info">
         Los campos con asteriscos (*) son obligatorios
        </div>
            <br>
            {!!Form::open(['route'=>['empleado.update',$empleado->id],'method'=>'PUT','class'=>'form-horizontal','id'=>'form-empleado'])!!}
                @include('empleado.formUpdate')
            {!!Form::close()!!}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://demo.expertphp.in/js/jquery.validate.min.js"></script>
    <script  type = "text/javascript" src="../../js/jquery.validate.js"></script>
@endsection
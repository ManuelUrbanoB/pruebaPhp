@extends('layouts.principal')
@if(Session::has('message'))
 <div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>{{Session::get('message')}}
  </div>
@endif
@section('content')
<h2>Lista de empleados</h2>
    <br>
    <div class="headerNavigation buttonNew">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a  class="btn btn-primary" href="empleado/create">
                <i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp; Crear
            </a>
        </div>
    </div> 
    <br>
    <br>
    <br>  
  <div class="container">
  <table id="table" class="table table-striped ">
    <thead>
      <tr>
        <th><i class="fa fa-user fa-fw" aria-hidden="true"></i> &nbsp; Nombre</th>
        <th><i class="fa fa-at" aria-hidden="true"></i> &nbsp;Email</th>
        <th><i class="fa fa-venus-mars" aria-hidden="true"></i> &nbsp;Sexo</th>
        <th><i class="fa fa-briefcase" aria-hidden="true"></i> &nbsp;Area</th>
        <th><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;Boletin</th>
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    @foreach($empleados as $empleado)
        <tbody>
            <tr>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->sexo}}</td>
                <td>{{$empleado->area}}</td>
                <td>{{$empleado->boletin}}</td>
                <td>
                {!! link_to_route('empleado.edit', $title = '' , $parameters = $empleado->id, $attributes= ['class'=>'fa fa-pencil-square-o fa-2x', 'aria-hidden'=>'true'])!!}
                </td>
                <td>
                 {!!Form::open(['route'=>['empleado.destroy',$empleado->id],'method'=>'DELETE'])!!}
                    <button class="fa fa-trash fa-2x"></button>
                 {!!Form::close()!!}
                
                </td>
            </tr>
        </tbody>
    @endforeach
  </table>
  </div>
  {!!$empleados->render()!!}
  
@endsection
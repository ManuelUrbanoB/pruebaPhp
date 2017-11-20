                <div class="form-group ">
                     <label class="control-label col-sm-3">Nombre completo: *</label>
                    <div class="col-sm-9">
                    {!!Form::text('nombre',$empleado->nombre,['class'=>'form-control','placeholder'=>'Nombre completo del empleado','id'=>'nombre'])!!}
                    </div>
                </div>
                <div class="form-group ">
                    <label  class="control-label col-sm-3">Correo electrónico: *</label>
                    <div class="col-sm-9">
                    {!!Form::email('email',$empleado->email,['class'=>'form-control','placeholder'=>'Correo electrónico'])!!}
                    </div>
                </div>
                 <div class="form-group ">
                    <label  class="control-label col-sm-3">Sexo: *</label>
                    <div class="col-sm-9">
                    @if($empleado->sexo=='M')
                        <div>
                            {!!Form::radio('genero','M',true)!!}Masculino
                        </div>
                        <div>
                            {!!Form::radio('genero','F')!!}Femenino
                        </div>
                    @else
                        <div>
                            {!!Form::radio('genero','M')!!}Masculino
                        </div>
                        <div>
                            {!!Form::radio('genero','F',true)!!}Femenino
                        </div>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                <label  class="control-label col-sm-3">Area*</label>
                     <div class="col-sm-9">
                        <select name="area" class="form-control">
                            @foreach($areas as $area)
                            @if($area->id == $empleado->area_id)
                                <option  value="{!!$area->id!!}" selected>{{$area->nombre}}</option>
                            @else
                                <option  value="{!!$area->id!!}">{{$area->nombre}}</option>         
                            @endif                                 
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-3">Descripción: *</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="descripcion" rows="5" id="descripcion">{{$empleado->descripcion}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-sm-3"></div>
                    <div class="col-sm-9">
                        <label class="checkbox-inline">
                        @if($empleado->boletin == 1)
                            {!!Form::checkbox('boletin', null,true,['class'=>'form-check-input'] )!!}Deseo recibir boletín informativo
                        @else
                            {!!Form::checkbox('boletin', null,false,['class'=>'form-check-input'] )!!}Deseo recibir boletín informativo
                        @endif
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">Roles: *</label>
                    <div class="col-sm-9">
                        @foreach($rols as $rol)
                        <div>
                            <label class="checkbox-inline">
                                <input class="form-check-input" name= "role[]" value="{!!$rol->id!!}" type="checkbox" {{$rol->check}}>{{$rol->nombre}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="form-group">
                <label class="control-label col-sm-3"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Guardar </button>
                    </div>
                </div>


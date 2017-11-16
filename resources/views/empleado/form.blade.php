<div class="form-group ">
                    {!!Form::label('Nombre completo: *',null,['class'=>'control-label col-sm-3'])!!}
                    <div class="col-sm-9">
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre completo del empleado','id'=>'nombre'])!!}
                    </div>
                </div>
                <div class="form-group ">
                    {!!Form::label('Correo electrónico: *',null,['class'=>'control-label col-sm-3'])!!}
                    <div class="col-sm-9">
                    {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Correo electrónico'])!!}
                    </div>
                </div>
                 <div class="form-group ">
                    {!!Form::label('Sexo: *',null,['class'=>'control-label col-sm-3'])!!}
                    <div class="col-sm-9">
                        <div>
                            {!!Form::radio('genero','M',true)!!}Masculino
                        </div>
                        <div>
                            {!!Form::radio('genero','F')!!}Femenino
                        </div>
                    </div>
                </div>
                <div class="form-group">
                {!!Form::label('Area*',null,['class'=>'control-label col-sm-3'])!!}
                     <div class="col-sm-9">
                        <select name="area" class="form-control">
                            @foreach($areas as $area)
                                <option name="area" value="{!!$area->id!!}">{{$area->nombre}}</option>              
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Descripción: *</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="descripcion" rows="5" id="descripcion" value="descripcion"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-sm-3"></div>
                    <div class="col-sm-9">
                        <label class="checkbox-inline">
                            {!!Form::checkbox('boletin', null,false,['class'=>'form-check-input'] )!!}Deseo recibir boletín informativo
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Roles: *</label>
                    <div class="col-sm-9">
                        @foreach($rols as $rol)
                        <div>
                            <label class="checkbox-inline">
                                <input class="form-check-input" name= "role[]" value="{!!$rol->id!!}" type="checkbox">{{$rol->nombre}}
                            </label>
                        <div>
                        @endforeach
                    </div>
                </div>
                <br>
                 <div class="form-group">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Guardar </button>
                    </div>
                </div>
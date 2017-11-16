<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\DB;
use App\Empleado;
use App\EmpleadoRol;
use Session;
use Redirect;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     try{
        $empleados = DB::table('empleados')->paginate(10);
        
        foreach($empleados as $empleado){
            $area = DB::table('areas')->where('id',''+$empleado->area_id)->first()->nombre;
            $empleado->area = $area;     
            if($empleado->sexo == "M"){
                $empleado->sexo ="Masculino";
            }else{
                $empleado->sexo ="Femenino";
            }
            if($empleado->boletin == 1){
                $empleado->boletin ="SI";
            }else{
                $empleado->boletin ="NO";
            }
        }       
        
        return view('empleado.index',['empleados'=>$empleados]);
     } catch(\Exception $e){
        Session::flash('message','No se pudo conectar a base de datos');
        return Redirect::to('/empleado');
     }
        
     
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
        $areas = DB::table('areas')->get();
        $rols = DB::table('rols')->get();
        return view('empleado.create',['areas'=>$areas],['rols'=>$rols]);
        }catch(\Exception $e){
            Session::flash('message','No se pudo conectar a base de datos');
            return Redirect::to('/empleado');
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        try{

        
            $boletin = 0;
            if($request->boletin == "on"){
                $boletin = 1;
            }
            $empleado = new Empleado;
            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->genero;
            $empleado->area_id = $request->area;
            $empleado->boletin = $boletin;
            $empleado->descripcion = $request->descripcion;
            $empleado->save();
            $user = DB::table('empleados')->orderBy('id','desc')->first();
            if(count($request->role)>0){
                foreach($request->role as $role){
                    $rolEmpleado = new EmpleadoRol;
                    $rolEmpleado->empleado_id = $empleado->id;
                    $rolEmpleado->rol_id = $role;
                    $rolEmpleado->save();    
                }
            }
        
            Session::flash('message','Usuario creado éxitosamente');
            return Redirect::to('/empleado');
        }catch(\Exception $e){
            Session::flash('message','No se pudo conectar a base de datos');
            return Redirect::to('/empleado');
         }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $empleado = Empleado::find($id);
            $areas = DB::table('areas')->get();
            $rols = DB::table('rols')->get();
            return view('empleado.update',['rols'=>$rols,'areas'=>$areas],['empleado'=>$empleado]);
        }catch(\Exception $e){
            Session::flash('message','No se pudo conectar a base de datos');
            return Redirect::to('/empleado');
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, $id)
    {   
        try{
            $empleado = Empleado::find($id);
            $boletin = 0;
            if($request->boletin == "on"){
                $boletin = 1;
            }
            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->genero;
            $empleado->area_id = $request->area;
            $empleado->boletin = $boletin;
            $empleado->descripcion = $request->descripcion;
            $empleado->save();          
            if(count($request->role)>0){
                $empleadoRols = EmpleadoRol::where('empleado_id','=',$empleado->id)->delete();
                foreach($request->role as $role){
                    $rolEmpleado = new EmpleadoRol;
                    $rolEmpleado->empleado_id = $empleado->id;
                    $rolEmpleado->rol_id = $role;
                    $rolEmpleado->save();    
                }
            }
            

            Session::flash('message','Usuario actualizado éxitosamente');
            return Redirect::to('/empleado');
        }catch(\Exception $e){
            Session::flash('message','No se pudo conectar a base de datos');
            return Redirect::to('/empleado');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $empleadoRols = EmpleadoRol::where('empleado_id','=',$id)->delete();
            Empleado::destroy($id);
            Session::flash('message','Usuario eliminado éxitosamente');
            return Redirect::to('/empleado');
        }catch(\Exception $e){
            return Redirect::to('/empleado');
         }
    }
}

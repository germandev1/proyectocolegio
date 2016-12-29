<?php

namespace App\Http\Controllers;

use App\Models\Gradoseccion;
use App\Models\Materia;
use DB;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Materiagrado;

class MateriasController extends Controller
{
    public function NuevaMateria(){
        return view('Materias.NuevaMateria');
    }
    public function InsertMateria(Requests\RequestNuevaMateria $request){
        $materia = new Materia();
        $materia->fill([
            'nombre'=>$request['nombreMateria'],
        ]);
        $materia->save();
        flash('Materia Guardada con Exito','success');
        return redirect()->back();
    }

    public function MostrarMaterias(){
        $materias = Materia::all();
        return view('Materias.MostrarMaterias',compact('materias'));
    }
    public function EliminarMateria($id){
        $materia = Materia::find($id);

        if($materia->materiagrados->count()>0){
            flash('Materia esta siendo impartida no se puede eliminar','danger');
            return redirect()->back();
        }else{
            $materia->delete();
            flash('Materia Eliminada con Exito','success');
            return redirect()->back();
        }

    }

    public function ImpartirMateria(Request $request){
        $materias = Materia::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $gradoSeccion = DB::table('gradoseccion')
            ->join('grados', 'grados.id', '=', 'gradoseccion.idGrado')
            ->join('seccion', 'seccion.id', '=', 'gradoseccion.idSeccion')
            ->select('gradoseccion.id', DB::raw('concat(grados.nombre, " ", seccion.Nombre ) as nombre'))
            ->whereNull('gradoseccion.deleted_at')->lists('nombre', 'id');

        return view('Materias.ImpartirMateria',compact('materias','gradoSeccion'));
    }

    public function InsertImpartirMateria(Request $request){

        $materiasExistentes = Materiagrado::where('idMateria',$request['materia'])->where('idGradoSeccion',$request['GradoSeccion'])->count();
        if($materiasExistentes==0){
            $materiaGrado = new Materiagrado();
            $materiaGrado->fill([
                'idGradoSeccion'=>$request['GradoSeccion'],
                'idMateria'=>$request['materia']
            ]);
            $materiaGrado->save();

            flash('Materia impartida exitosamente','success');
            return redirect()->back();
        }else{

            flash('Materia ya esta siendo impartida','danger');
            return redirect()->back();
        }


    }

    public function getGrados(Request $request){
//en Progreso
        try {


            $gradoSeccion = Materiagrado::where('idMateria', $request['id'])->get();

            if (count($gradoSeccion) > 0) {

                return response()->json($gradoSeccion, 200);

            } else {

                return response()->json(['error' => 'No se encontraron Grados que no reciban esta materia '], 450);
            }
        } catch (Exception $e) {

            return response()->json(['error' => 'Ocurrio un error en la consulta'], 450);
        }
    }


}

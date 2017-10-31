<?php

namespace App\Http\Controllers\Encuestas;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CuestionarioController extends Controller
{

    public function getPreguntasCuestionario($id_cuestionario)
    {
        $cuestionario = \DB::table('cuestionarios')->select(['id as id_cuestionario','titulo as titulo_cuestionario','descripcion as desc_cuestionario'])->where('delete', 'false')->find($id_cuestionario);

        $preguntas = \DB::table('preguntas')->where('id_cuestionario', $id_cuestionario)->where( 'delete', 'false')->select(['id as id_pregunta', 'pregunta','tipo', 'orden', 'orden as n', 'pregunta as q'])->orderBy('orden')->get();

        foreach ($preguntas as $key => $pregunta) {
            $id_preg = $pregunta->id_pregunta;
            $opciones = collect(\DB::table('opciones')->where('id_pregunta',$id_preg)->where('delete','false')->select(['id as id_opcion', 'descripcion as opcion', 'accion', 'referencia', 'descripcion as l'])->get());
            $pregunta->opciones = $opciones;
            foreach ($opciones as $opcion) {
                if(strtolower($opcion->accion) =='saltar')
                    $opcion->j = $opcion->referencia;
                if(strtolower($opcion->accion) == 'especifique')
                    $opcion->o = true;
            }
        }
        $cuestionario->preguntas = $preguntas;

        return response()->json($cuestionario);


    }

    public function guardarRespuesta(Request $req)
    {
        // return $req;
        $id = \DB::table('respuestas')->insertGetId([
            'id_pregunta'=>$req->id_pregunta,
            'id_usuario'=>$req->id_usuario,
            'delete'=>false,
            'id_opcion'=>$req->id_opcion,
            'respuesta_abierta'=>$req->respuesta_abierta,

        ]);
        return response()->json([
            'mensaje'=>'ok',
            'id'=>$id
        ]);
    }


}

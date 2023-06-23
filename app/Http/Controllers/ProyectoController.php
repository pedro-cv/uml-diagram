<?php

namespace App\Http\Controllers;

use App\Models\Participa;
use App\Models\Proyecto;
use App\Models\User;
use App\Models\User_diagrama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProyectoController extends Controller
{

    public function index()
    {

        $proyectos = Auth::user()->proyectos_part;
        return view('proyectos.index', compact('proyectos'));
    }

    public function usuarios(Proyecto $proyecto)
    {
        $usuarios = $proyecto->usuarios;
        $usuariosV = User::paginate(4);
        return view('proyectos.usuarios', compact('usuarios', 'proyecto', 'usuariosV'));
    }

    public function create()
    {
        return view('proyectos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'fecha_fin' => ['required']
        ]);

        try {
            $proyecto = new Proyecto;
            if ($request->hasFile('url')) {
                $extension = $request->url->extension();
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('proyectos', $request->url, $nombre);
                $path = 'proyectos/' . $nombre;
                $proyecto->url = $path;
            }
            $proyecto->nombre = $request->nombre;
            $proyecto->descripcion = $request->descripcion;
            $proyecto->fecha_fin = $request->fecha_fin;
            $proyecto->user_id = Auth::user()->id;
            $proyecto->save();
            DB::table('participas')->insert([
                'user_id' => $proyecto->user_id,
                'proyecto_id' => $proyecto->id
            ]);
            return redirect()->route('proyectos.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error' . $e->getMessage());
        }
    }

    public function favorito(Request $request)
    {
        $proyecto = Proyecto::findOrFail($request->input('id'));
        $proyecto->favorito = $proyecto->favorito == 0 ? 1 : 0;
        $proyecto->update();
        return response()->json(['mensaje' => 'Usuario desactivado...'], 200);
        /* return  redirect()->back()->with('message', 'Se reitro de favoritos '); */
    }

    public function terminado(Request $request)
    {
        $proyecto = Proyecto::findOrFail($request->input('id'));
        $proyecto->terminado = $proyecto->terminado == 0 ? 1 : 0;
        $proyecto->update();
        return response()->json(['mensaje' => 'Usuario desactivado...'], 200);
        /* return  redirect()->back()->with('message', 'Se reitro de favoritos '); */
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }


    public function update(Request $request, Proyecto $proyecto)
    {
        try {
            $proyecto->nombre = $request->nombre;
            $proyecto->descripcion = $request->descripcion;
            $proyecto->fecha_fin = $request->fecha_fin;

            if ($request->hasFile('url')) {
                if ($proyecto->url) {
                    Storage::disk('public')->delete($proyecto->url);
                }
                $extension = $request->url->extension();
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('proyectos', $request->url, $nombre);
                $path = 'proyectos/' . $nombre;
                $proyecto->url = $path;
            }
            $proyecto->update();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error' . $e->getMessage());
        }
        return redirect()->route('proyectos.index')->with('message', 'Se edito la inf del poryecto de manera correcta');
    }

    public function declinar(Proyecto $proyecto)
    {
        try {

            $diagramas = $proyecto->diagramas;
            $user = Auth::user();

            if ($diagramas) {
                foreach ($diagramas as $diagrama) {
                    if ($user->misDiagramas->contains($diagrama->id)) {
                        $relacionDiagrama = $user->user_diagramas()->where('diagrama_id', $diagrama->id)->first();
                        $relD = User_diagrama::find($relacionDiagrama->id);
                        $relD->delete();
                    }
                }
            }

            $relacion = Auth::user()->participa()->where('proyecto_id', $proyecto->id)->first();
            $participa = Participa::find($relacion->id);
            $participa->delete();
            return redirect()->back()->with('message', 'Se edito la inf del poryecto de manera correcta');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error' . $e->getMessage());
        }
    }

    public function banear(Request $request, Proyecto $proyecto)
    {
        try {

            $diagramas = $proyecto->diagramas;
            $user = User::find($request->user_id);

            if ($diagramas) {
                foreach ($diagramas as $diagrama) {
                    if ($user->misDiagramas->contains($diagrama->id)) {
                        $relacionDiagrama = $user->user_diagramas()->where('diagrama_id', $diagrama->id)->first();
                        $relD = User_diagrama::find($relacionDiagrama->id);
                        $relD->delete();
                    }
                }
            }

            $relacion = $user->participa()->where('proyecto_id', $proyecto->id)->first();
            $participa = Participa::find($relacion->id);
            $participa->delete();
            return redirect()->back()->with('message', 'Se edito la inf del poryecto de manera correcta');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
    }
}

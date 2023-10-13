<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index()
    {
        $cursos = Curso::orderBy('id', 'desc')->paginate();

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(StoreCurso $request)
    {
        // $curso = new Curso();

        //*? store curso extrae la información de validación 

        // $curso->name = $request->name;
        // $curso->description = $request->description;
        // $curso->categoria = $request->categoria;

        // $curso->save();
        //*? esto es para que se puedan mandar muchos cursos, y se va más limpio
        $curso = Curso::create($request->all());

        return redirect()->route('cursos.show', $curso);
    }


    public function show(Curso $curso)
    {
        // $curso = Curso::find($id);
        return view('cursos.show', compact('curso')); //*? esto es más limpio
    }
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|unique:cursos,slug,' . $curso->id,
            'description' => 'required',
            'categoria' => 'required',
        ]);

        $curso -> update($request->all());
        return redirect()->route('cursos.show', $curso);
    }

    public function destroy(Curso $curso){
        $curso -> delete();
        
        return redirect()->route('cursos.index');
    }
}

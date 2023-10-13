@extends('layouts.plantilla')
@section('title', 'Curso ' . $curso->name)
@section('content')

<h1>Bienvenido al curso: {{ $curso->name }} </h1>
<a href={{ route('cursos.index') }}>Volver a cursos</a>
<br>
<a href={{ route('cursos.edit', $curso) }}>Editar Curso</a>
<p>
    <strong>categoría</strong>
    {{ $curso->categoria }}
</p>
<p>
    {{ $curso->description }}
</p>
<form action="{{ route('cursos.destroy', $curso) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar Curso</button>
</form>
@endsection

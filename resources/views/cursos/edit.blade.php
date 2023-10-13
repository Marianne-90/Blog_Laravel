@extends('layouts.plantilla')
@section('title', 'Cursos Edit')
@section('content')

<h1>Editar Curso</h1>
<a href={{ route('cursos.index') }}>Volver a cursos</a>
<form action={{ route('cursos.update', $curso) }} method="POST">

    @csrf
    @method('put')
    <label>
        Nombre:
        <br>
        <input type="text" name="name" value={{ old('name', $curso-> name) }}>
    </label>
    @error('name')
        <br>
        <span>* {{ $message }} </span>
        <br>
    @enderror
    <br>
    <label>
        Slug:
        <br>
        <input type="text" name="slug" value={{ old('slug', $curso->slug) }}>
    </label>

    @error('slug')
        <br>
        <span>* {{ $message }} </span>
        <br>
    @enderror


    <label>
        <br>
        Descripción:
        <br>
        <textarea type="text" name="description"
            rows="5">{{ old('description',$curso->description) }}</textarea>
    </label>
    @error('description')
        <br>
        <span>* {{ $message }} </span>
        <br>
    @enderror
    <label>
        <br>
        Categoría:
        <br>
        <input type="text" name="categoria" value={{ old('categoria',$curso->categoria ) }}>
    </label>
    @error('categoria')
        <br>
        <span>* {{ $message }} </span>
        <br>
    @enderror
    <br>
    <button type="submit">Actualizar Curso</button>
</form>
@endsection

@extends('layouts.plantilla')
@section('title', 'contactanos')
@section('content')

<h1>Déjanos un mensaje</h1>
<form action="{{ route('contactanos.store') }}" method="POST">
    @csrf
    <label>
        Nombre:
        <br>
        <input type="text" name="name" value={{ old('name') }}>
    </label>
    @error('name')
        <br>
        <span>* {{ $message }} </span>
        <br>
    @enderror
    <br>
    <label>
        Correo:
        <br>
        <input type="text" name="correo" value={{ old('correo') }}>
    </label>
    @error('correo')
        <br>
        <span>* {{ $message }} </span>
        <br>
    @enderror
    <br>
    <label>
        Mensaje:
        <br>
        <textarea rows="4" name="mensaje">{{ old('mensaje') }}</textarea>
    </label>
    @error('mensaje')
        <br>
        <span>* {{ $message }} </span>
        <br>
    @enderror
    <br>

    <button type="submit">Enviar mensaje</button>
</form>
@if(session('info'))

    <script>
        alert("{{ session('info') }}")

    </script>

@endif
@endsection

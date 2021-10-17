@extends('plantilla')

@section('content')
<div class="row">
    <div class="col-md-7">
        <table class="table">
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Grupo</th>
            </tr>
            @foreach ($estud as $es)
                <tr>
                    <td>{{$es->id}}</td>
                    <td>{{$es->nombre}}</td>
                    <td>{{$es->apellidos}}</td>
                    <td>{{$es->email}}</td>
                    <td>{{$es->telefono}}</td>
                    <td>{{$es->grupo}}</td>
                    <td>
                        <a href="{{route('editarest', $es->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('eliminarest', $es->id)}}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @if (session('eliminarest'))
        <div class="alert alert-success mt-3">
            {{session('eliminarest')}}
        </div>
        @endif
        {{$estud->links()}}
    </div>
    <div class="col-md-5">
        <h3 class="text-center mb-4">Agregar Estudiante</h3>

        <form action="{{route('storeest')}}" method="POST" >
            @csrf
            <div class="form-group">
                <input type="text" class="form-control md-4" name="nombre" id="nombre" value="{{old('nombre')}}" placeholder="Nombre" required>
            </div>
            @error('nombre')
                <div class="alert alert-danger">
                    El nombre es requerido
                </div>
            @enderror

            <div class="form-group">
                <input type="text" class="form-control mt-3" name="apellidos" id="apellidos" value="{{old('apellidos')}}" placeholder="apellidos" required>
            </div>
            @error('apellidos')
            <div class="alert alert-danger">
                los apellidoses son requeridos
            </div>
            @enderror
            

            <div class="form-group">
                <input type="number" class="form-control mt-3" name="edad" id="edad" value="{{old('edad')}}"placeholder="edad" required>
            </div>

            @error('edad')
            <div class="alert alert-danger">
                El edad es requerido
            </div>
            @enderror

            <div class="form-group">
                <input type="text" class="form-control mt-3" name="email" id="email" value="{{old('email')}}" placeholder="email" required>
            </div>

            @error('email')
            <div class="alert alert-danger">
                El email es requerido
            </div>
            @enderror

            <div class="form-group">
                <input type="number" class="form-control mt-3" name="telefono" id="telefono" value="{{old('telefono')}}"placeholder="telefono" required>
            </div>

            
            @error('telefono')
            <div class="alert alert-danger">
                El telefono es requerido
            </div>
            @enderror

            <div class="form-group">
                <!-- <input type="text" class="form-control mt-3" name="grupo" id="grupo" value="{ {old('grupo')}}"placeholder="grupo" required> -->
                <select name="grupo" id="grupo" class="form-control mt-3">
                    <option value="">Selecciona el grupo</option>
                    @foreach ($grupo as $g)
                    <option value="{{$g->grupo}}">{{$g->grupo}}</option>
                    @endforeach
                    
                </select>
            </div>
            @error('grupo')
            <div class="alert alert-danger">
                El grupo es requerido
            </div>
            @enderror

            <button type="submit" class="btn btn-success btn-block mt-3">Agregar estudiante</button>
            <div class="mt-5">
                <a href="{{route('inicio')}}">Volver</a>
            </div>
            
        </form>

            @if (session('agregarest'))
                <div class="alert alert-success mt-3">
                    {{session('agregarest')}}
                </div>
            @endif
            

    </div>
</div>
@endsection
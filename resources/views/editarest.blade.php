@extends('plantilla')

@section('content')
    <h3 class="text-center mb-3 pt-3">Editar Estudiante {{$estuActualizar->nombre}}</h3>

    <form action="{{route('updateest', $estuActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" name="nombre" id="nombre" value="{{$estuActualizar->nombre}}" class="form-control mt-3">
        </div>

        <div class="form-group">
            <input type="text" name="apellidos" id="apellidos" value="{{$estuActualizar->apellidos}}" class="form-control mt-3">
        </div>

        <div class="form-group">
            <input type="number" name="edad" id="edad" value="{{$estuActualizar->edad}}" class="form-control mt-3">
        </div>

        <div class="form-group">
            <input type="text" name="email" id="email" value="{{$estuActualizar->email}}" class="form-control mt-3">
        </div>
        <div class="form-group">
            <input type="number" name="telefono" id="telefono" value="{{$estuActualizar->telefono}}" class="form-control mt-3">
        </div>

        <div class="form-group">
            <input type="text" name="grupo" id="grupo" value="{{$estuActualizar->grupo}}" class="form-control mt-3" readonly="readonly">
            <select name="grupo" id="grupo" class="form-control mt-3">
                <option value="">Selecciona otro grupo</option>
                @foreach ($grupo as $g)
                <option value="{{$g->grupo}}">{{$g->grupo}}</option>
                @endforeach
                
            </select>
        </div>

        <button type="submit" class="btn btn-warning btn-control mt-3">Editar estudiante</button>
        
    </form>
    <form action="{{route('viewestudiantes')}}">
        <button type="submit" class="btn btn-danger btn-control mt-3">Cancelar</button>
    </form>
    <div class="mt-3">
        <a href="{{route('viewestudiantes')}}" >Volver</a>
    </div>
    
    @if (session('updateest'))
        <div class="alert alert-success mt-3">
            {{session('updateest')}}
        </div>
    @endif

@endsection
@extends('plantilla')

@section('content')
    <h3 class="text-center mb-3 pt-3">Editar Grupo {{$grupoActualizar->grupo}}</h3>

    <form action="{{route('update', $grupoActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="number" name="semestre" id="semestre" value="{{$grupoActualizar->semestre}}" class="form-control mt-3">
        </div>

        <div class="form-group">
            <input type="text" name="turno" id="turno" value="{{$grupoActualizar->turno}}" class="form-control mt-3">
        </div>

        <div class="form-group">
            <input type="text" name="grupo" id="grupo" value="{{$grupoActualizar->grupo}}" class="form-control mt-3">
        </div>

        <button type="submit" class="btn btn-warning btn-control mt-3">Editat nota</button>
    </form>
    @if (session('update'))
        <div class="alert alert-success mt-3">
            {{session('update')}}
        </div>
    @endif

@endsection
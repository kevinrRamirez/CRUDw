@extends('plantilla')

@section('content')

    <div class="row">
        <div class="col-md-7">
            <table class="table">
                <tr>
                <th>ID</th>
                <th>Semestre</th>
                <th>Turno</th>
                <th>Grupo</th>
                </tr>
                @foreach ($grupos as $g)
                    <tr>
                        <td>{{$g->id}}</td>
                        <td>{{$g->semestre}}</td>
                        <td>{{$g->turno}}</td>
                        <td>{{$g->grupo}}</td>
                        <td>
                            <a href="{{route('editar', $g->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('eliminar', $g->id)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if (session('eliminar'))
            <div class="alert alert-success mt-3">
                {{session('eliminar')}}
            </div>
            @endif
            {{$grupos->links()}}
        </div>
        <div class="col-md-5">
            <h3 class="text-center mb-4">Agregar grupo</h3>

            <form action="{{route('store')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control md-4" name="semestre" id="semestre" value="{{old('semestre')}}" placeholder="Semestre" required>
                </div>

                @error('semestre')
                    <div class="alert alert-danger">
                        El semestres es requerido
                    </div>
                @enderror

                <div class="form-group">
                    <input type="text" class="form-control mt-3" name="turno" id="turno" value="{{old('turno')}}"placeholder="turno" required>
                </div>

                @error('turno')
                <div class="alert alert-danger">
                    El turno es requerido
                </div>
                @enderror

                <div class="form-group">
                    <input type="text" class="form-control mt-3" name="grupo" id="grupo" value="{{old('grupo')}}" placeholder="Grupo" required>
                </div>

                @error('grupo')
                <div class="alert alert-danger">
                    El grupo es requerido
                </div>
                @enderror

                <button type="submit" class="btn btn-success btn-block mt-3">Agregar grupo</button>
                <div class="mt-5">
                    <a href="{{route('viewestudiantes',$grupos)}}">ir a Estudiantes</a>
                </div>
                
            </form>

                @if (session('agregar'))
                    <div class="alert alert-success mt-3">
                        {{session('agregar')}}
                    </div>
                @endif
                

        </div>
    </div>

@endsection
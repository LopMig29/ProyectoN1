@extends('layouts.app')
@section('content')
    <div>
        <div class="buscar">
        <form class="form-inline my-2 my-lg-0 float-right">
            <input name="searchBy" class="form-control mr-sm-2" type="search" placeholder="Filtrar busqueda" aria-label="Search" value="{{ $searchBy }}">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
        </div>
        <div class="btnAgregar">
            <a href="{{url ('create/') }}" class="btn btn-outline-success my-2 my-sm-0" >
                <i class="fa fa-user-plus"></i>
            </a>
        </div>
    </div>
    <br>
    <div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col" colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="text-center">
                        <td>
                            {{$student->id}} 
                        </td>
                        <td>
                            {{$student->name}} 
                        </td>
                        <td> 
                            {{$student->lastName}} 
                        </td>
                            <td>
                                <form action="{{url ('/students/'.$student->id) }}">
                                    <button type="submit" class="btn btn-outline-info">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                        <td>
                            <form action="{{url ('/students/'.$student->id) }}" method="post">
                                @csrf
                                {{ method_field ('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Estas seguro que deseas eliminar?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $students->links() }}
@endsection
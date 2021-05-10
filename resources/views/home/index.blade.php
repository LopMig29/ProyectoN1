@extends('layouts.app')
@section('content')
    <div>
        <form class="form-inline my-2 my-lg-0 float-right">
            <input name="searchBy" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" value="{{ $searchBy }}">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
        <br>
        <a href="{{url ('create/') }}" class="btn btn-outline-success my-2 my-sm-0 float-left" >
            Agregar nuevo registro   
        </a>
    </div>
    <br>
        <div>
            <table class="table">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col" colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $test)
                        <tr class="text-center">
                            <td>
                                {{$test->id}} 
                            </td>
                            <td>
                                {{$test->name}} 
                            </td>
                            <td> 
                                {{$test->lastName}} 
                            </td>
                            <td>
                                <form action="{{url ('/students/'.$test->id) }}">
                                    <button type="submit" class="btn btn-outline-info">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{url ('/students/'.$test->id) }}" method="post">
                                    @csrf
                                    {{ method_field ('DELETE') }}
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Estas seguro que deseas eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $tests ->appends(['searchBy' => $searchBy]) -> links() }}
        </div>
@endsection
@extends('layouts.app')
@section('content')
    <form action="{{url('student/'.$student->id)}}" method="post">
        @csrf
        <div>
            {{method_field('PATCH')}}
            <h1 class="text-center">Editar Campos</h1>
            <br>
            <div>
                <div class="mx-auto" style="width: 500px;">
                    <div class="col">
                        <input type="text" name="name" placeholder="Nombre" id="name" value="{{$student->name}}" class="form-control form-control-lg"><br>
                    </div>
                    <div class="col">
                        <input type="text" name="lastName"  placeholder="Apellido" id="lastName" value="{{$student->lastName}}"class="form-control form-control-lg"><br>
                    </div>
                </div>
            </div>
            <div class="mx-auto" style="width: 400px;">
                <button class="btn btn-primary btn-lg btn-block">Editar</button>
            </div>
        </div>
    </form>
@endsection
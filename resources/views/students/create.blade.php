@extends('layouts.app')
@section('content')
    <form action="{{url ('students') }}" method="post">
        @csrf
        <div>
            <h1 class="text-center">Crear Campos</h1>
            <br>
            <div class="mx-auto" style="width: 500px;">
                <div class="col">
                    <input type="text" name="name" placeholder="Nombre" class="form-control form-control-lg" required>
                </div>
                <br>
                <div class="col">
                    <input type="text" name="lastName"  placeholder="Apellido" class="form-control form-control-lg" required>
                </div>
                <br>
            </div>
            <div class="mx-auto" style="width: 400px;">
                <button class="btn btn-primary btn-lg btn-block">Crear</button>
            </div>
        </div>
    </form>
@endsection
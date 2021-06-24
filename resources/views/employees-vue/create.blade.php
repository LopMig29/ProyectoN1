@extends('layouts.app')
@section('content')
<a href="/employees-vue">
    <button class="btn btn-danger">
        <i class="fas fa-arrow-circle-left"></i>
    </button>
</a>
<form action="{{url ('employees-vue') }}" method="post">
    @csrf
        <div>
            <h1 class="text-center">Crear Campos</h1>
            <br>
            <div class="mx-auto" style="width: 500px;">
                <div class="col">
                    <label for="name"><h5>Nombre</h5></label>
                    <input type="text" name="name" placeholder="Nombre" class="form-control form-control-lg" id="name" required>
                </div>
                <br>
                <div class="col">
                    <label for="lastName"><h5>Apellido</h5></label>
                    <input type="text" name="lastName"  placeholder="Apellido" class="form-control form-control-lg" id="lastName" required>
                </div>
                <br>
                <div class="col">
                    <label for="salary"><h5>Salario</h5></label>
                    <input type="text" name="salary"  placeholder="Salario" class="form-control form-control-lg" id="salary" required>
                </div>
                <br>
                <div class="col">
                    <label for="civilStatus"><h5>Estado Civil</h5></label>
                    <select name="civilStatus" id="civilStatus" class="form-control form-control-lg">
                        <option value="Casado">Casado</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Union libre">Union libre</option>
                    </select>
                </div>
                <br>
            </div>
            <div class="mx-auto" style="width: 400px;">
                <button class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus"></i> 
                    Agregar
                </button>
            </div>
        </div>
    </form>
@endsection
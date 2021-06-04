@extends('layouts.app')
@section('content')
    <form action="{{url('employees-vue/'.$employee->id)}}" method="post">
            @csrf
        <div>
            {{ method_field('PATCH') }}
            <h3 class="text-center">
                <b>Editar Empleado</b>
            </h3>
            <hr>
            <div class="container">
                <div class="row" style="width: 100;">
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label for="name"><h5>Nombre</h5></label>
                        <input type="text" name="name" placeholder="Nombre" id="name" value="{{$employee->name}}" class="form-control form-control-lg" required><br>
                    </div>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label for="lastName"><h5>Apellido</h5></label>
                        <input type="text" name="lastName"  placeholder="Apellido" id="lastName" value="{{$employee->lastName}}"class="form-control form-control-lg" required><br>
                    </div>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label for="salary"><h5>Salario</h5></label>
                        <input type="text" name="salary"  placeholder="salary" id="salary" value="{{$employee->salary}}"class="form-control form-control-lg" required><br>
                    </div>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label for="civilStatus"><h5>Estado Civil</h5></label>
                        <select name="civilStatus" id="civilStatus" class="form-control form-control-lg">
                            <option value="Casado">Casado</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Union libre">Union libre</option>
                        </select>
                    </div>
                    <br><br>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label><h5>AFP</h5></label>
                        <input type="text" value="{{number_format($employee->getAFPAttribute())}}"class="form-control form-control-lg" readonly><br>
                    </div>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label><h5>ARS</h5></label>
                        <input type="text" value="{{number_format($employee->getARSAttribute())}}"class="form-control form-control-lg" readonly><br>
                    </div>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label><h5>ISR</h5></label>
                        <input type="text" value="{{number_format($employee->getISRAttribute())}}"class="form-control form-control-lg" readonly><br>
                    </div>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <label><h5>Salario Neto</h5></label>
                        <input type="text" value="{{number_format($employee->getNetSalaryAttribute())}}"class="form-control form-control-lg" readonly><br>
                    </div>
                </div>
            </div>
            <div class="mx-auto d-flex" style="width: 600px;">
                <a href="/employees-vue" class="btn btn-danger btn-lg w-50 mr-2" style="text-decoration: none;">
                    Cancelar
                </a>

                <button class="btn btn-primary btn-lg w-50 ml-2">
                    Actualizar <i class="fas fa-upload"></i>
                </button>
            </div>
        </div>
    </form>
@endsection
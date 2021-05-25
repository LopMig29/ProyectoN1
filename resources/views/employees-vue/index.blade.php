@extends('layouts.app')
@section('content')
@verbatim
<div class="btnCrear">
    <td>
        <a href='employees/create' class="btn btn-success" >
            <i class="fa fa-user-plus"></i>
        </a>
    </td>
</div>
<table class="table table-hover">
    <thead class="thead-light">
        <tr class="text-center">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sueldo</th>
            <th>Estado Civil</th>
            <th>AFP</th>
            <th>ARS</th>
            <th>ISR</th>
            <th>Sueldo Neto</th>
            <th colspan="2">Opciones</th>
        </tr>
    </thead>
    <tbody id="employees-container">
        <tr v-for="employee in employees" class="text-center">
            <td>{{employee.id}}</td>
            <td>{{employee.name}}</td>
            <td>{{employee.lastName}}</td>
            <td>{{employee.sueldoBruto}}</td>
            <td>{{employee.estadoCivil}}</td>
            <td>{{extraerAFP(employee.sueldo)}}</td>
            <td>{{extraerARS(employee.sueldo)}}</td>
            <td>{{extraerISR(employee.sueldo)}}</td>
            <td>{{extraerSueldoNeto(employee.sueldo)}}</td>
            <td>
                <a :href="'/employees/'+employee.id" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Modal">
                    <i class="fas fa-user-edit"></i>
                </a>
            </td>
            <td> 
                <button class="btn btn-danger" v-on:click="confirmDestroy(employee.id)">
                    <i class="fas fa-user-minus"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>
@endverbatim
<link rel="stylesheet" href="css/employees.css">
<script src="js/employees.js" defer></script>
@endsection

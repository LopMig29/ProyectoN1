@extends('layouts.app')
@section('content')
<div class="btnCrear">
    <a href='employees-vue/create' class="btn btn-success" style="float: left">
        <i class="fa fa-user-plus"></i>
    </a>
</div>
<div class="buscar">
    <div>
        <form class="form-inline my-2 my-lg-0 float-right">
            <input name="searchBy" class="form-control mr-sm-2" type="search" placeholder="Filtrar busqueda" aria-label="Search" value="{{ $searchBy }}">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
@verbatim
<div id="employees-container">
    <br><br><br>
    <div class="btnOcultar">
        <button @click='buttom' class="btn" style="float: right"  v-bind:class="{'btn-danger': show, 'btn-secondary': !show}"> 
            <i class="fas fa-eye"></i>
        </button>
    </div>
    <div class = "w-100 text-center">
        <img src="https://media3.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif" v-show="!ready">
    </div>
    <table class="table table-hover table-bordered" v-show="ready" style="display:none">
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
                <th colspan="2" v-show="show">Opcion</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="employee in employees" class="text-center" v-on:click="edit($event,employee.id)">
                <td>{{employee.id}}</td>
                <td>{{employee.name}}</td>
                <td>{{employee.lastName}}</td>
                <td>${{formatNumber(employee.salary)}}</td>
                <td>{{employee.civilStatus}}</td>
                <td>${{formatNumber(employee.AFP)}}</td>
                <td>${{formatNumber(employee.ARS)}}</td>
                <td>${{formatNumber(employee.ISR)}}</td>
                <td>${{formatNumber(employee.net_salary)}}</td>
                <td class ="delete-td" v-show="show"> 
                    <button class="btn btn-danger" v-on:click="confirmDestroy(employee.id)">
                        <i class="fas fa-user-minus"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endverbatim
<link rel="stylesheet" href="css/employee.css">
<script src="js/employees.js" defer></script>
@endsection

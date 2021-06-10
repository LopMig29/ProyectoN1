@extends('layouts.app')
@section('content')
@verbatim
<div id="employees-container">
    <div class="btnCrear">
        <a href="employees-vue" class="btn btn-secondary">
            <i class="fas fa-redo"></i>
        </a>
        <a href='employees-vue/create' class="btn btn-success" style="float: left">
            <i class="fa fa-user-plus"></i>
        </a>
        <button @click='buttom' class="btn" v-bind:class="{'btn-danger': show, 'btn btn-dark': !show}">
            <i class="fas fa-eye"></i>
        </button>
        <div class="form-inline my-2 my-lg-0 float-right">
            <input class="form-control mr-sm-2" type="search" placeholder="Filtrar busqueda" v-model="searchBy" v-on:keyup.13="getEmployees(1)">
        </div>
    </div>
        <div class = "w-100 text-center">
            <img src="https://media1.tenor.com/images/556e9ff845b7dd0c62dcdbbb00babb4b/tenor.gif?itemid=5345658" v-show="!ready">
        </div>
        <br>
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
                <tr v-for="employee in employees.data" class="text-center" v-on:click="edit($event,employee.id)" :key="employees.id">
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
    <pagination :data="employees" @pagination-change-page="getEmployees"></pagination>
</div>
@endverbatim
<link rel="stylesheet" href="css/employee.css">
<script src="js/employees.js" defer></script>
@endsection
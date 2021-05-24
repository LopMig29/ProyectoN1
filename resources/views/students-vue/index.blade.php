@extends('layouts.app')
@section('content')
@verbatim  

<div class="btnCreate">
    <td>
        <a href='/create' class="btn btn-success" >
            <i class="fa fa-user-plus"></i>
        </a>
    </td>
</div>
<table class="table table-hover">
    <thead class="thead-light">
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col" colspan="2">Opciones</th>
        </tr>
    </thead>

    <tbody id="students-container">
        <tr v-for="student in students" class="text-center">
            <td>{{student.id}}</td>
            <td>{{student.name}}</td>
            <td>{{student.lastName}}</td>
            <td>
                <a :href="'/students/'+student.id" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Modal">
                    <i class="fas fa-user-edit"></i>
                </a>
            </td>
            <td>
                
                <button class="btn btn-danger" v-on:click="confirmDestroy(student.id)">
                    <i class="fas fa-user-minus"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>
@endverbatim
<link rel="stylesheet" href="css/students.css">
<script src="js/students.js" defer></script>
@endsection

@extends('layouts.plantillabase')
@section('content2')
<link rel="stylesheet" href={{ asset('usercss/user.css') }}>   <!-- PARA USAR 2 PLANTILLAS CSS-->
<link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css")}} integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <div class="title2">
        <h1>Listado de Usuarios</h1>
    </div>
    @if ($users->isNotEmpty())  <!--Si no esta vacio-->
    <div class="table">
        <table class="table table-dark table-striped" id="tablita">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form action="{{ route('deletes', $user->id) }}" method="POST">
                        {{csrf_field()}}
                        {{  method_field('DELETE')}}
                        <button type="submit"><ion-icon name="trash-outline"></ion-icon></button>
                    </form>
                </td>
              </tr>
                @endforeach
              <!--<tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>-->
            </tbody>
      </table>
    </div>
    @else
    <p>No hay usuarios registrados</p>
    @endif
    <!--Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!--
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
-->
@endsection
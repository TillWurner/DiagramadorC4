@include('layouts.plantillabase')
<link rel="stylesheet" href={{ asset('diagramcss/shdiagram.css') }}>   <!-- PARA USAR 2 PLANTILLAS CSS-->
<link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css")}} integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="title2">
    <h1>Shared Diagrams</h1>
    {{-- <button href= exampleModal >Crear Nuevo</button> --}}
    @include('diagrams.modalshare')
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear Diagrama</button> --}}
</div>

{{-- @php
$bandera = false; 
@endphp --}}
<?php  echo "<script>console.log({$inv})</script>" ?> {{-- PARA HACER UN CONSOLE LOG --}}
{{-- @foreach ($diagramas as $diagram)

    @if ($diagram->id_user == $idAuth)
        $bandera = true;
    @endif
@endforeach --}}
@if ($inv !== 0)  <!--Si no esta vacio-->   <!--Si existen diagramas del usuario-->
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Buscar Diagrama</button>
<div class="table">
    <table class="table table-dark table-striped" id="tablita">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Autor</th>
            <th scope="col">Codigo</th>
            <th scope="col">Acciones</th>
            {{-- <th scope="col">Fecha de creacion</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($diagramas as $diagram) 
            @if ($diagram->code == $inv)
            <tr>
              <th scope="row">{{$diagram->id}}</th>
              <td>{{$diagram->nom}}</td>
              <td>{{$diagram->desc}}</td>
              <td>{{$diagram->diagu->name}}</td>  {{-- Ocupo la relacion para sacar el atributo de otra tabla --}}
              <td>{{$diagram->code}}</td>
              <td>
                  <form action="{{ route('delete', $diagram->id) }}" method="POST">
                      {{csrf_field()}}
                      {{  method_field('DELETE')}}
                      <a href={{route('diag', $diagram->id)}} class="btn btn-link"><ion-icon name="trash-outline"></ion-icon></a>
                      <button type="submit" class="btn btn-link"><ion-icon name="trash-outline"></ion-icon></button>
                      {{-- <button type="submit"><ion-icon name="trash-outline"></ion-icon></button> --}} {{-- Boton bonito --}}
                  </form>
                  
              </td>
            </tr>
            @endif
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
<div class="card" style="width: 18rem;">
  <img src="{{ asset("diagramcss/img/oops.jpg") }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Unete a un diagrama!</h5>
    <p class="card-text">¡Pon el codigo de invitacion y unete a ellos!</p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Buscar Diagrama</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">My Diagram!</h1>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button> --}}
          </div>
          <form  class="container" method="POST" action="{{ route('diagram.share') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             {{--  <form> --}}
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Codigo:</label>
                  <input name="code"  type="text" class="form-control" id="recipient-name">
                </div>
              {{-- </form> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-info ">
                {{ __('Guardar') }}
            </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <p>No hay Diagramas, crea uno! </p> --}}
@endif
<!--Scripts-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

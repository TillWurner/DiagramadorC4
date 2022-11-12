@include('layouts.plantillabase')
<link rel="stylesheet" href={{ asset('diagramcss/mydiagram.css') }}>   <!-- PARA USAR 2 PLANTILLAS CSS-->
<link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css")}} integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="title2">
    <h1>My Diagrams</h1>
    {{-- <button href= exampleModal >Crear Nuevo</button> --}}
    @include('diagrams.modalagregar')
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear Diagrama</button> --}}
</div>
@if ($diagramas->isNotEmpty())  <!--Si no esta vacio-->
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear Diagrama</button>
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
<div class="card" style="width: 18rem;">
  <img src="{{ asset("diagramcss/img/oops.jpg") }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Ooops!</h5>
    <p class="card-text">¡No tienes ningún diagrama creado aun, prueba creando uno!</p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear Diagrama</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">My Diagram!</h1>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button> --}}
          </div>
          <form  class="container" method="POST" action="{{ route('diagram.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             {{--  <form> --}}
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input name="nombre"  type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Descripcion:</label>
                  <textarea name="descripcion" class="form-control" id="message-text"></textarea>
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
{{-- <body>
  <div class="container">
    <div class="card">
      <figure>
        <img src={{ asset("dlayouthcss/img/f1.jpg") }}>
      </figure>
      <div class="contenido">
        <h3>Contabilidad</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dignissimos aut quasi labore maiores explicabo eligendi alias sit soluta provident.</p>
        <a href="#">Leer Mas</a>
      </div>
    </div>
  </div>
</body> --}}
{{-- <p>No hay Diagramas, crea uno! </p> --}}
@endif
<!--Scripts-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

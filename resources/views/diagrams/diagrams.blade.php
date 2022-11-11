@include('layouts.plantillabase')
<link rel="stylesheet" href={{ asset('diagramcss/mydiagram.css') }}>   <!-- PARA USAR 2 PLANTILLAS CSS-->
<link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css")}} integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="title2">
    <h1>My Diagrams</h1>
</div>
@if ($diagramas->isNotEmpty())  <!--Si no esta vacio-->
<div class="table">
    <table class="table table-dark table-striped" id="tablita">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Codigo</th>
            <th scope="col">Fecha de creacion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($diagramas as $diagram)
          <tr>
            <th scope="row">{{$diagram->id}}</th>
            <td>{{$diagram->id_user}}</td>
            <td>{{$diagram->nom}}</td>
            <td>{{$diagram->desc}}</td>
            <td>{{$diagram->code}}</td>
            <td>
                <form action="{{ route('delete', $user->id) }}" method="POST">
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
<p>No hay Diagramas, crea uno! </p>
@endif
<!--Scripts-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

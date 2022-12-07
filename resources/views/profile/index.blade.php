@include('layouts.plantillabase')
<link rel="stylesheet" href={{ asset("profilecss/profile.css") }}>   <!-- PARA USAR 2 PLANTILLAS CSS-->
<link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css")}} integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="profile">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
           <!-- <div style="max-width: 130px">-->
                <img src="{{ asset('profilecss/img/vegeta.png') }}" class="img" alt="...">
           <!-- </div>-->
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Hola {{ Auth::user()->name }}, este es tu perfil ! </h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ Auth::user()->name }}</li>
                <li class="list-group-item">{{ Auth::user()->email }}</li>
                <li class="list-group-item">Estudiante</li>
              </ul>
              <p class="card-text"><small class="text-muted">(Pronto nuevas opciones!)</small></p>
            </div>
          </div>
        </div>
      </div>
</div>


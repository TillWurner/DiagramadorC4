<!--Links-Vinculacion-->
<link rel="stylesheet" href={{ asset('diagramcss/mydiagram.css') }}>   <!-- PARA USAR 2 PLANTILLAS CSS-->
<link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css")}} integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--//-->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear Diagrama</button> --}}
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
                <button id="cerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="guardar" type="submit" class="btn btn-info ">
                  {{ __('Guardar') }}
              </button>
              </div>
            </form>
          </div>
        </div>
      </div>
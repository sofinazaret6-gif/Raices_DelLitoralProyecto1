<x-layout>
      <x-slot:title>Registrarse</x-slot:title>

    <x-slot:barraP>
        <h4>Registro</h4>
    </x-slot:barraP>

<section class="vh-100">
 
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

             <form method="POST" action="{{ route('registrarse.guardar') }}">
              @csrf

                <div data-mdb-input-init class="form-outline mb-4">
                 <input type="text" name="nombre" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Nombre Completo</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
               <input type="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Correo Electronico</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Contraseña</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repetir Contraseña</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    Acepto los <a href="#!" class="text-body"><u>Terminos y Usos</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                    Registrarse!</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Ya tienes una cuenta? <a href="#!"
                    class="fw-bold text-body"><u>Iniciar Sesion</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

</x-layout>
<footer class="custom-footer text-center text-lg-start">
  <!-- Sección superior: redes sociales -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
   <!-- Texto visible solo en pantallas grandes -->
    <div class="me-5 d-none d-lg-block">
      <span>Conectate con nosotros en las Redes Sociales:</span>
    </div>
    <!-- Íconos de redes -->
    <div>
      <a href="https://facebook.com" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://instagram.com" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
  </section>
  <!-- Sección principal del footer -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <!-- Información de la empresa -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-leaf me-3"></i>Raices del Litoral
          </h6>
          <p>
            Creamos espacios verdes pensados para el clima correntino. 
            Te acompañamos con plantas seleccionadas y asesoramiento experto. 🌿
          </p>
        </div>
         <!-- Links a categorías de productos -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Productos</h6>
           <!-- Cada link lleva a una categoría distinta -->
          <p><a href="{{ url('/productos/interior') }}" class="text-reset">Plantas de Interior</a></p>
          <p><a href="{{ url('/productos/frutales') }}" class="text-reset">Plantas Frutales</a></p>
          <p><a href="{{ url('/productos/aromaticas') }}" class="text-reset">Plantas Aromáticas</a></p>
          <p><a href="{{ url('/productos/accesorios') }}" class="text-reset">Macetas y Accesorios</a></p>
          <p><a href="{{ url('/productos/florales') }}" class="text-reset">Plantas Florales</a></p>
        </div>
         <!-- Enlaces internos importantes -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Enlaces Útiles</h6>
          <p><a href="/terminos" class="text-reset">Términos y Usos</a></p>
          <p><a href="/contacto" class="text-reset">Contacto</a></p>
          <p><a href="/comercializacion" class="text-reset">Comercialización</a></p>
          <p><a href="/" class="text-reset">Principal</a></p>
        </div>
        <!-- Datos de contacto -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
          <p><i class="fas fa-home me-3"></i> Argentina, Corrientes Capital</p>
          <p><i class="fas fa-envelope me-3"></i> raicesdellitoral@gmail.com</p>
          <p><i class="fas fa-phone me-3"></i> + 54 3794 778248</p>
          <p><i class="fab fa-whatsapp me-3"></i> + 54 3794 123456</p>
        </div>
      </div>
    </div>
  </section>
 <!-- div agrupa tipo contenedor -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2026 Copyright:
    <a class="text-reset fw-bold" href="/">Raices del Litoral- Dorrego, Ferretti</a>
  </div>
</footer>
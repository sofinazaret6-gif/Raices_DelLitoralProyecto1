<x-layout>
    
    <x-slot:title>Catálogo</x-slot:title>

    <x-slot:barraP>
        <h4>EXPLORAR CATEGORÍAS</h4>
    </x-slot:barraP>
   <!-- Carrusel de imágenes (Bootstrap) -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/nuestro-catalogo.jpeg') }}" class="d-block w-100" alt="Foto catalogos" style="height: 350px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/areas-vivero.png') }}" class="d-block w-100" alt="Foto vivero" style="height: 350px; object-fit: cover;">
            </div>
        </div>
    </div>
   <!-- Notificación tipo "toast" (mensaje emergente) -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="miToast" class="toast" data-bs-autohide="false">
            <div class="toast-header">
                <img src="{{ asset('images/logoRaicesVSF.png') }}" class="rounded me-2" alt="logo" width="40">
                <strong class="me-auto">Asesoramiento</strong>
                <small>Ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                ¿No sabés qué comprar? Visitá el área de asesoramiento y te ayudamos a elegir lo mejor para vos.
            </div>
        </div>
    </div>
   <!-- Sección principal: categorías -->
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#1e3d2f;">Nuestras Categorías</h2>
            <p class="text-muted">Seleccioná una categoría para ver los productos disponibles</p>
        </div>

        <div class="row">
         <!-- Card de categoría (ejemplo: Frutales) -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="https://cdn.shopify.com/s/files/1/0059/8835/2052/files/Web_Fruit.jpg?v=1738860487" 
                             style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title fw-bold">Árboles Frutales</h5>
                        <p class="card-text text-muted">Variedades adaptadas al clima local para tu huerta.</p>
                        <a href="{{ url('/productos/frutales') }}" class="btn btn-success mt-auto rounded-pill">Explorar Frutales</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="https://i.pinimg.com/originals/7d/d0/8c/7dd08c889b235915b6064bc435eaabca.jpg" 
                             style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title fw-bold">Plantas Florales</h5>
                        <p class="card-text text-muted">Llená tu jardín de color con flores de estación.</p>
                        <a href="{{ url('/productos/florales') }}" class="btn btn-success mt-auto rounded-pill">Explorar Florales</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="https://graciasnaturaleza.com/wp-content/uploads/2022/11/plantas-de-interior-y-calatea-996x1024.jpg" 
                             style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title fw-bold">Plantas de Interior</h5>
                        <p class="card-text text-muted">Ideales para decorar y purificar tu hogar.</p>
                        <a href="{{ url('/productos/interior') }}" class="btn btn-success mt-auto rounded-pill">Explorar Interior</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="https://jardineriaideal.com/wp-content/uploads/2025/02/cultiva-hermosas-plantas-de-lavanda-en-macetas-o-contenedores.jpg" 
                             style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title fw-bold">Plantas Aromáticas</h5>
                        <p class="card-text text-muted">Aportan aroma y sabor a tus comidas.</p>
                        <a href="{{ url('/productos/aromaticas') }}" class="btn btn-success mt-auto rounded-pill">Explorar Aromáticas</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="https://crehana-blog.imgix.net/media/filer_public/f8/d2/f8d219f2-f1f8-43ce-b3ec-f013869fe349/tierra-macetas.jpg?auto=format&q=50" 
                             style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title fw-bold">Accesorios</h5>
                        <p class="card-text text-muted">Macetas, sustratos y herramientas de cuidado.</p>
                        <a href="{{ url('/productos/accesorios') }}" class="btn btn-success mt-auto rounded-pill">Ver Accesorios</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0" style="background-color: #f0fdf4;">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="{{ asset('images/asesoria.jpeg') }}" 
                             style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title fw-bold">Asesoramiento</h5>
                        <p class="card-text text-muted">Te ayudamos a elegir la planta ideal para vos.</p>
                        <a href="{{ url('/consultas') }}" class="btn btn-outline-success mt-auto rounded-pill">Consultar Ahora</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
   <!-- Script para mostrar el toast automáticamente -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.getElementById('miToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>

</x-layout>
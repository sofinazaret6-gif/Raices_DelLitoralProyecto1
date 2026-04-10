<x-layout>
    <x-slot:title>Catalogo</x-slot:title>

    <x-slot:barraP>
        <h4>EXPLORAR</h4>
    </x-slot:barraP>

    <!-- CAROUSEL -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="{{ asset('images/nuestro-catalogo.jpeg') }}" class="d-block w-100" alt="Foto catalogos">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/areas-vivero.png') }}" class="d-block w-100" alt="Foto vivero">
            </div>

        </div>
    </div>

    <!-- CARDS -->
    <div class="container mt-4">
        <div class="row">

            <!-- CARD 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://cdn.shopify.com/s/files/1/0059/8835/2052/files/Web_Fruit.jpg?v=1738860487" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Árboles Frutales</h5>
                        <p class="card-text">Cultivá tus propios frutos con variedades adaptadas al clima local. Ideales para huertas familiares y espacios verdes.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://i.pinimg.com/originals/7d/d0/8c/7dd08c889b235915b6064bc435eaabca.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Plantas Florales</h5>
                        <p class="card-text">Llená tu jardín de color y vida con flores de estación y ornamentales para interior y exterior.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://graciasnaturaleza.com/wp-content/uploads/2022/11/plantas-de-interior-y-calatea-996x1024.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Plantas de Interior</h5>
                        <p class="card-text">Ideales para decorar tu hogar, mejorar el ambiente y aportar frescura a espacios cerrados.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://jardineriaideal.com/wp-content/uploads/2025/02/cultiva-hermosas-plantas-de-lavanda-en-macetas-o-contenedores.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Plantas Aromáticas</h5>
                        <p class="card-text">Perfectas para cocina y hogar. Aportan aroma, sabor y también propiedades medicinales.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- CARD 5 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100"> 
                    <img src="https://crehana-blog.imgix.net/media/filer_public/f8/d2/f8d219f2-f1f8-43ce-b3ec-f013869fe349/tierra-macetas.jpg?auto=format&q=50" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Macetas y Accesorios</h5>
                        <p class="card-text">Todo lo que necesitás para tus plantas: macetas, sustratos y herramientas de jardinería.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- CARD 6 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/asesoria.jpeg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Asesoramiento</h5>
                        <p class="card-text">Te ayudamos a elegir y cuidar tus plantas con recomendaciones personalizadas.</p>
                        <a href="#" class="btn btn-primary">Consultar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-layout>
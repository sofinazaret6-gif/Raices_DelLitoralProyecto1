<x-layout>
    <x-slot:title>Carrito - Raíces del Litoral</x-slot:title>

    <x-slot:barraP>
        <h4>CARRITO DE COMPRAS</h4>
    </x-slot:barraP>

    <section class="py-5 d-flex align-items-center section-construccion">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-6 z-index-top">
                    <div class="card card-custom-carrito shadow-lg border-0">
                        <div class="card-body p-5 text-center text-lg-start">
                            
                            <span class="badge rounded-pill mb-3 badge-proximamente">
                                <i class="bi bi-seedling me-1"></i> Próximamente
                            </span>

                            <h1 class="display-5 fw-bold mb-3 titulo-verde">
                                Estamos <span class="texto-rama">cultivando</span> nuestro sistema de ventas.
                            </h1>
                            
                            <p class="lead text-muted mb-5">
                                Esta funcionalidad está en pleno crecimiento. Muy pronto podrás comprar tus plantas favoritas directamente desde aquí.
                            </p>

                            <div class="d-grid gap-3 d-sm-flex justify-content-center justify-content-lg-start">
                                <a href="{{ route('catalogo') }}" class="btn btn-success btn-lg px-5 rounded-pill shadow-sm btn-verde-vivero">
                                    <i class="bi bi-arrow-left me-2"></i>Volver al Catálogo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5 d-none d-lg-block text-center">
                    <i class="bi bi-cart-x icono-carrito-espera"></i>
                </div>
            </div>
        </div>
    </section>
</x-layout>
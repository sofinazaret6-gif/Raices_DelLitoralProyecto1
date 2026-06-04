<x-layout-admin>
    <x-slot:title>Control de Stock y Visibilidad</x-slot:title>

    <x-slot:barraP>
        <h4>Control de Inventario</h4>
    </x-slot:barraP>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>Gestión de Stock y Visibilidad</h2>
                <p class="text-muted mb-0">Controlá las existencias de tus plantas y cambiá la visibilidad de la tienda con un solo clic.</p>
            </div>
            
            <form action="{{ route('productos.ocultarTodo') }}" method="POST" class="m-0">
                @csrf
                @method('PATCH') <button type="submit" class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill" style="cursor: pointer; font-family: inherit; font-size: inherit;">
                    <i class="bi bi-eye-slash me-1"></i> Ocultar todo
                </button>
            </form>
            </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 100px;">Imagen</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Stock Actual</th>
                            <th class="text-center" style="width: 140px;">Visibilidad</th>
                            <th class="text-center" style="width: 140px;">Modificar Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                            <tr class="{{ !$producto->estado ? 'table-light opacity-75' : '' }}">
                                <td>
                                    @if(str_contains($producto->imagen, 'images/'))
                                        <img src="{{ asset($producto->imagen) }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: contain;">
                                    @else
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: contain;">
                                    @endif
                                </td>
                                <td class="fw-bold text-secondary">
                                    {{ $producto->nombre }}
                                    @if($producto->stock <= 5 && $producto->stock > 0)
                                        <span class="badge bg-warning text-dark ms-1" style="font-size: 0.7rem;">¡Poco Stock 🤏🏽!</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">
                                        {{ ucfirst($producto->categoria->descripcion ?? 'Sin categoría') }}
                                    </span>
                                </td>
                                <td>
                                    @if($producto->stock > 0)
                                        <span class="fw-semibold text-dark">{{ $producto->stock }} unidades</span>
                                    @else
                                        <span class="text-danger fw-bold"><i class="bi bi-exclamation-triangle-fill me-1"></i>Agotado</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('productos.toggleEstado', $producto->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        @if($producto->estado)
                                            <button type="submit" class="btn p-0 text-success" style="font-size: 1.3rem; border: none; background: none;" title="Visible en la tienda. Clic para Ocultar.">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn p-0 text-muted" style="font-size: 1.3rem; border: none; background: none;" title="Oculto de la tienda. Clic para Mostrar.">
                                                <i class="bi bi-eye-slash-fill text-danger"></i>
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td class="text-center">
                                    <button type="button" 
                                            class="btn p-0 text-success btn-actualizar-stock"
                                            style="font-size: 1.2rem; border: none; background: none;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalStock"
                                            data-id="{{ $producto->id }}"
                                            data-nombre="{{ $producto->nombre }}"
                                            data-stock="{{ $producto->stock }}"
                                            title="Cambiar cantidad de stock">
                                        <i class="bi bi-boxes"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-box-open d-block mb-2" style="font-size: 40px;"></i>
                                    No hay productos cargados en el sistema.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modales y Scripts permanecen igual --}}
    <div class="modal fade" id="modalStock" data-backdrop="false" data-bs-backdrop="false" tabindex="-1" aria-labelledby="modalStockLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-success text-white py-2">
                    <h5 class="modal-title fw-bold" id="modalStockLabel"><i class="bi bi-boxes me-2"></i>Ajustar Stock</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formActualizarStock" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body p-3 text-center">
                        <p class="mb-2 text-secondary fw-bold" id="stock_producto_nombre">Nombre del Producto</p>
                        <div class="mx-auto" style="max-width: 150px;">
                            <label class="form-label small text-muted mb-1">Cantidad disponible</label>
                            <input type="number" id="edit_stock_qty" name="stock" class="form-control text-center fw-bold fs-5 border-success" required min="0" placeholder="0">
                        </div>
                    </div>
                    <div class="modal-footer bg-light py-2 justify-content-center">
                        <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-success rounded-pill px-3">Guardar Cantidad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const botonesStock = document.querySelectorAll('.btn-actualizar-stock');
        const formStock = document.getElementById('formActualizarStock');
        const nombreProductoTxt = document.getElementById('stock_producto_nombre');
        const inputStockQty = document.getElementById('edit_stock_qty');

        botonesStock.forEach(boton => {
            boton.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const stock = this.getAttribute('data-stock');

                // Asigna la ruta dinámica que declaramos en web.php
                formStock.action = `/admin/productos/${id}/stock`;

                nombreProductoTxt.textContent = nombre;
                inputStockQty.value = stock;
            });
        });
    });
    </script>
</x-layout-admin>
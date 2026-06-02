<x-layout-admin>
    <x-slot:title>Panel de Control - Productos</x-slot:title>

    <x-slot:barraP>
        <h4>Gestión del Catálogo</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestión de Catálogo (Admin)</h2>
            <button type="button" class="btn btn-success rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                <i class="bi bi-plus-lg me-1"></i> Agregar Nuevo Producto
            </button>
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
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th class="text-center" style="width: 120px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                            <tr>
                                <td>
                                    @if(str_contains($producto->imagen, 'images/'))
                                        <img src="{{ asset($producto->imagen) }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: contain;">
                                    @else
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: contain;">
                                    @endif
                                </td>
                                <td class="fw-bold text-secondary">{{ $producto->nombre }}</td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">
                                        {{ ucfirst($producto->categoria->descripcion ?? 'Sin categoría') }}
                                    </span>
                                </td>
                                <td class="fw-semibold">${{ number_format($producto->precio, 0, ',', '.') }}</td>
                                <td>
                                    @if($producto->stock > 0)
                                        <span class="text-muted">{{ $producto->stock }} unidades</span>
                                    @else
                                        <span class="text-danger fw-bold">Sin Stock</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <!-- ✏️ BOTÓN EDITAR (SOLO EL ÍCONO DEL LÁPIZ) -->
                                        <button type="button" 
                                                class="btn p-0 text-success btn-editar-producto"
                                                style="font-size: 1.2rem; border: none; background: none;"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modalEditar"
                                                data-id="{{ $producto->id }}"
                                                data-nombre="{{ $producto->nombre }}"
                                                data-precio="{{ $producto->precio }}"
                                                data-stock="{{ $producto->stock }}"
                                                data-id-categoria="{{ $producto->id_categoria }}"
                                                data-descripcion="{{ $producto->descripcion }}"
                                                title="Editar producto">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- 🗑️ BOTÓN ELIMINAR (SOLO EL ÍCONO DEL TACHO) -->
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');" class="m-0 d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-danger" style="font-size: 1.2rem; border: none; background: none;" title="Eliminar producto">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-box-open d-block mb-2" style="font-size: 40px;"></i>
                                    No hay productos registrados en la base de datos.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🟢 MODAL AGREGAR PRODUCTO                  -->
    <!-- ========================================== -->
    <div class="modal fade" id="modalAgregar" data-backdrop="false" data-bs-backdrop="false" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-success text-white py-2">
                    <h5 class="modal-title fw-bold" id="modalAgregarLabel"><i class="bi bi-flower1 me-2"></i>Registrar Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold mb-1">Nombre de la planta / insumo</label>
                                    <input type="text" name="nombre" class="form-control" required placeholder="Ej: Limonero Cuatro Estaciones">
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold mb-1">Precio ($)</label>
                                        <input type="number" step="0.01" name="precio" class="form-control" required placeholder="0.00">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold mb-1">Stock Disponible</label>
                                        <input type="number" name="stock" class="form-control" required placeholder="0">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold mb-1">Categoría del Catálogo</label>
                                    <select name="id_categoria" class="form-select select-categoria" required>
                                        <option value="" disabled selected>Seleccione una categoría...</option>
                                        <option value="1">Frutales</option>
                                        <option value="2">Florales</option>
                                        <option value="3">Aromáticas</option>
                                        <option value="4">Interior</option>
                                        <option value="5">Accesorios</option>
                                        <option value="nueva" class="text-success fw-bold">➕ Nueva Categoría...</option>
                                    </select>
                                </div>
                                <div class="mb-3 div-nueva-categoria" style="display: none;">
                                    <label class="form-label text-success fw-semibold mb-1">Nombre de la Nueva Categoría</label>
                                    <input type="text" name="nueva_categoria" class="form-control border-success" placeholder="Ej: Cactus y Suculentas">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold mb-1">Descripción o Cuidados</label>
                                    <textarea name="descripcion" class="form-control" rows="4" placeholder="Ej: Requiere pleno sol..." style="resize: none;"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold mb-1">Fotografía del Producto</label>
                                    <input type="file" name="imagen" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light py-2">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success rounded-pill px-4">Guardar en Sistema</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🟢 MODAL EDITAR PRODUCTO (AHORA VERDE)     -->
    <!-- ========================================== -->
    <div class="modal fade" id="modalEditar" data-backdrop="false" data-bs-backdrop="false" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <!-- Cambiado de bg-warning a bg-success para unificar colores -->
                <div class="modal-header bg-success text-white py-2">
                    <h5 class="modal-title fw-bold" id="modalEditarLabel"><i class="bi bi-pencil-square me-2"></i>Editar Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditarProducto" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold mb-1">Nombre de la planta / insumo</label>
                                    <input type="text" id="edit_nombre" name="nombre" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold mb-1">Precio ($)</label>
                                        <input type="number" step="0.01" id="edit_precio" name="precio" class="form-control" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold mb-1">Stock Disponible</label>
                                        <input type="number" id="edit_stock" name="stock" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold mb-1">Categoría del Catálogo</label>
                                    <select id="edit_id_categoria" name="id_categoria" class="form-select select-categoria" required>
                                        <option value="1">Frutales</option>
                                        <option value="2">Florales</option>
                                        <option value="3">Aromáticas</option>
                                        <option value="4">Interior</option>
                                        <option value="5">Accesorios</option>
                                        <option value="nueva" class="text-success fw-bold">➕ Nueva Categoría...</option>
                                    </select>
                                </div>
                                <!-- Campo de nueva categoría (Estilo Verde) -->
                                <div class="mb-3 div-nueva-categoria" style="display: none;">
                                    <label class="form-label text-success fw-semibold mb-1">Nombre de la Nueva Categoría</label>
                                    <input type="text" name="nueva_categoria" class="form-control border-success" placeholder="Ej: Macetas Premium">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold mb-1">Descripción o Cuidados</label>
                                    <textarea id="edit_descripcion" name="descripcion" class="form-control" rows="4" style="resize: none;"></textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold mb-1">Fotografía del Producto (Opcional)</label>
                                    <input type="file" name="imagen" class="form-control" accept="image/*">
                                    <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Dejá este campo vacío si no querés cambiar la imagen actual.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Botón de guardado cambiado a Verde -->
                    <div class="modal-footer bg-light py-2">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success rounded-pill px-4">Actualizar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- ⚡ SCRIPT JAVASCRIPT                       -->
    <!-- ========================================== -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const botonesEditar = document.querySelectorAll('.btn-editar-producto');
        const formEditar = document.getElementById('formEditarProducto');

        botonesEditar.forEach(boton => {
            boton.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = this.getAttribute('data-precio');
                const stock = this.getAttribute('data-stock');
                const idCategoria = this.getAttribute('data-id-categoria');
                const descripcion = this.getAttribute('data-descripcion');

                formEditar.action = `/admin/productos/${id}`;

                document.getElementById('edit_nombre').value = nombre;
                document.getElementById('edit_precio').value = precio;
                document.getElementById('edit_stock').value = stock;
                document.getElementById('edit_id_categoria').value = idCategoria;
                document.getElementById('edit_descripcion').value = descripcion;

                document.querySelectorAll('.div-nueva-categoria').forEach(div => div.style.display = 'none');
            });
        });

        const selectsCategoria = document.querySelectorAll('.select-categoria');

        selectsCategoria.forEach(select => {
            select.addEventListener('change', function () {
                const modalBody = this.closest('.modal-body');
                const divNuevaCat = modalBody.querySelector('.div-nueva-categoria');
                const inputNuevaCat = divNuevaCat.querySelector('input');

                if (this.value === 'nueva') {
                    divNuevaCat.style.display = 'block';
                    inputNuevaCat.required = true;
                    inputNuevaCat.focus();
                } else {
                    divNuevaCat.style.display = 'none';
                    inputNuevaCat.required = false;
                    inputNuevaCat.value = '';
                }
            });
        });
    });
    </script>
</x-layout-admin>
@include('includes.header')

<div class="my-5 mx-2">

    <div class="row my-5">
    <center>
        <div class="col-10 col-md-9 text-center">
            <h1>Productos</h1>
        </div>
        <div class="col-2 col-md-3">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Adicionar Producto</button>
        </div>
        </center>
    </div>

    <div class="row">
        @if ($inventarios->count() == 0)
            <h2>Sin productos registrados</h2>
        @else
            @foreach ($inventarios as $inventario)
                <div class="pb-4 col-4 col-md-4">
                    <div class="card w-100 h-100" style="width: 18rem;">
                        <img src="{{ asset($inventario->url_imagen) }}" class="card-img-top" alt="..."
                            style="height: 262px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $inventario->nombre }}</h5>
                            <p class="card-text">{{ $inventario->despcripcion }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <i data-feather="circle"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Crear Producto</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('insertarProductos') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nombreProducto" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombreProducto"
                                @error('nombreProducto') is-invalid @enderror" name="nombreProducto"
                                value="{{ old('nombreProducto') }}" required autocomplete="nombreProducto" autofocus>
                            @error('nombreProducto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="descripcion" rows="3" @error('descripcion') is-invalid @enderror"
                                name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus></textarea>

                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Imagen del producto</label>
                            <input class="form-control" accept=".png, .jpg, .jpeg" type="file" id="formFile"
                                @error('formFile') is-invalid @enderror" name="formFile" value="{{ old('formFile') }}"
                                required autocomplete="formFile" autofocus>

                            @error('formFile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" id="cantidad" class="form-control"
                                @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}"
                                required autocomplete="cantidad" autofocus>
                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="precio_unitario" class="form-label">Precio Unitario</label>
                            <input type="number" id="precio_unitario" class="form-control"
                                @error('precio_unitario') is-invalid @enderror" name="precio_unitario"
                                value="{{ old('precio_unitario') }}" required autocomplete="precio_unitario" autofocus>
                            @error('precio_unitario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')

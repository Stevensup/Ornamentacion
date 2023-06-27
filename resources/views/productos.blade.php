@include('includes.header')

<div class="container my-5">

    <div class="my-5">
        <h1>Productos</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card w-100" style="width: 18rem;">
                <img src="{{ asset('images/Instalacion.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card w-100" style="width: 18rem;">
                <img src="{{ asset('images/IconInsta.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')

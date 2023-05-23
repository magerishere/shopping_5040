<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <img src="{{\Illuminate\Support\Facades\Vite::image('logo.png')}}" alt="Logo">
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="#" class="nav-link text-white">
                            <i class="bi bi-house mx-auto mb-1"></i>
                            Home
                        </a>
                    </li>
                    @auth()
                        <li>
                            <a href="{{route('admin.products.index')}}" class="nav-link text-white">
                                <i class="bi bi-box mx-auto mb-1"></i>
                                Products
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

</header>

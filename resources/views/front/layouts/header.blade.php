<header class="py-3 mb-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <div class="row">
            <div class="col">
                <a href="{{route('home')}}"
                   class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none">
                    <img src="{{\Illuminate\Support\Facades\Vite::image('logo.png')}}" alt="Logo">
                </a>
            </div>
            <div class="col">
                <a href="{{route('cart.index')}}"
                   class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none">
                    <h4><i class="bi bi-cart"></i></h4>
                    @if(isset($cartItemsCountWithQty) && $cartItemsCountWithQty)
                        <span class="alert alert-primary">{{$cartItemsCountWithQty}}</span>
                    @endif
                </a>
            </div>
            @auth
                <div class="col">
                    <a href="{{route('admin.dashboard.show')}}"
                       class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none">
                        <h4><i class="bi bi-person-badge"></i></h4>
                    </a>
                </div>
            @endauth

        </div>

        <div class="d-flex align-items-center">
            <form class="w-100 me-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

        </div>
    </div>
</header>

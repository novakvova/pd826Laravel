@extends('base')

@section('main')
    <div class="row">

        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

        <div class="col-sm-12">
            <h1 class="display-3">Продукти</h1>

            <div>
                <a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">Додати продукт</a>
            </div>

            <div class="row">
                @foreach ($products as $product)

                    <div class="card col-md-4 col-sm-6 p-2" style="width: 18rem;">
                        <img class="card-img-top mt-2" style="border-radius: 10px" 
                        src="{{'images/420_'.$product->productImages[0]->name}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->price }}</p>
                            <a href="{{"/products/".$product->id}}" class="btn btn-primary">More info</a>
                        </div>
                    </div>



                @endforeach
            </div>
        <div>
    </div>
          
@endsection

@section('scripts')
 

@endsection

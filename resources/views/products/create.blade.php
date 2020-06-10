@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Створити продукт</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form id="create" method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Назва товара:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>

                    @include("view.stack-photo")

                    <div class="form-group">
                        <label for="email">Опис:</label>
                        <textarea class="form-control" name="description" id ="edit" rows="10" cols="45" ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Додати товар</button>
                </form>
            </div>
        </div>
    </div>

    @include("view.cropper-modal");

@endsection

@section('scripts')

    @include("products.create-js")

    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>

    <script>
        tinymce.init({
            selector: 'textarea#edit',
            plugins: 'image'
        });
        // $(function () {
        //     new FroalaEditor('#edit');
        // });
    </script>


@endsection

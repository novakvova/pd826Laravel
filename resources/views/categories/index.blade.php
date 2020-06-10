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
            <h1 class="display-3">Категорії</h1>

            <div>
                <a style="margin: 19px;" href="{{ route('categories.create')}}" class="btn btn-primary">Додати категорію</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <img src="{{ asset('images/'.$category->image) }}" alt="Фото категорії" width="100">

                        </td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Редагувати</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection

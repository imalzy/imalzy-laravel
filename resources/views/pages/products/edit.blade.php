@extends('layouts.app')

@section('title', 'Product Create')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Product</h2>



                <div class="card">
                    <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $products->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" currency="IDR" placeholder="Rp"
                                    class="form-control @error('price')
                                is-invalid
                            @enderror"
                                    name="price" value="{{ $products->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number"
                                    class="form-control @error('stock')
                                is-invalid
                            @enderror"
                                    name="stock" value="{{ $products->stock }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value=""> -- Select One --</option>
                                    @foreach ($categories as $items)
                                        <option value="{{ $items->id }}"
                                            {{ $products->category_id == $items->id ? 'selected' : '' }}>
                                            {{ $items->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Photo Product</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image"
                                        @error('image') is-invalid @enderror>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Deskrispi</label>
                                <textarea type="text"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"
                                    name="description">{{ $products->description }}"</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch mr-3">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                                        {{ $products['status'] ? ' checked="checked"' : '' }}>
                                    <label class="custom-control-label" for="status">Status</label>
                                </div>

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_favourite" name="is_favourite"
                                        {{ $products['is_favourite'] ? ' checked="checked"' : '' }}>
                                    <label class="custom-control-label" for="favourit">Favorit</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">

        <h1>Add Product</h1>

    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="error-box">

            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    {{-- Product Form --}}
    <div class="form-card">

        <form action="{{ route('admin.products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-grid">

                {{-- Product Name --}}
                <div class="form-group">
                    <label>Product Name</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Enter product name">
                </div>


                {{-- SKU --}}
                <div class="form-group">
                    <label>SKU</label>

                    <input type="text"
                           name="sku"
                           value="{{ old('sku') }}"
                           placeholder="Enter SKU">
                </div>


                {{-- Category --}}
                <div class="form-group">
                    <label>Category</label>

                    <input type="text"
                           name="category"
                           value="{{ old('category') }}"
                           placeholder="Enter category">
                </div>


                {{-- Brand --}}
                <div class="form-group">
                    <label>Brand</label>

                    <input type="text"
                           name="brand"
                           value="{{ old('brand') }}"
                           placeholder="Enter brand">
                </div>


                {{-- Price --}}
                <div class="form-group">
                    <label>Price</label>

                    <input type="number"
                           step="0.01"
                           name="price"
                           value="{{ old('price') }}"
                           placeholder="Enter price">
                </div>


                {{-- Currency --}}
                <div class="form-group">
                    <label>Currency</label>

                    <input type="text"
                           name="currency"
                           value="{{ old('currency', 'SAR') }}"
                           placeholder="SAR">
                </div>


                {{-- Stock --}}
                <div class="form-group">
                    <label>Stock</label>

                    <input type="number"
                           name="stock"
                           value="{{ old('stock') }}"
                           placeholder="Enter stock quantity">
                </div>


                {{-- Rating --}}
                <div class="form-group">
                    <label>Rating</label>

                    <input type="number"
                           step="0.1"
                           min="0"
                           max="5"
                           name="rating"
                           value="{{ old('rating') }}"
                           placeholder="0 - 5">
                </div>


                {{-- Reviews --}}
                <div class="form-group">
                    <label>Reviews</label>

                    <input type="number"
                           min="0"
                           name="reviews"
                           value="{{ old('reviews', 0) }}"
                           placeholder="Number of reviews">
                </div>


                {{-- Featured --}}
                <div class="form-group">
                    <label>Featured Product</label>

                    <select name="is_featured">

                        <option value="0"
                            {{ old('is_featured', 0) == 0 ? 'selected' : '' }}>
                            No
                        </option>

                        <option value="1"
                            {{ old('is_featured') == 1 ? 'selected' : '' }}>
                            Yes
                        </option>

                    </select>
                </div>


                {{-- Product Image --}}
                <div class="form-group">

                    <label>Product Image</label>

                    <input type="file"
                           name="image"
                           accept="image/*">

                    <small>
                        Upload JPG, JPEG, PNG or WEBP image.
                    </small>

                </div>


                {{-- Description --}}
                <div class="form-group full-width">

                    <label>Description</label>

                    <textarea name="description"
                              rows="5"
                              placeholder="Enter product description">{{ old('description') }}</textarea>

                </div>

            </div>


            {{-- Form Buttons --}}
            <div class="form-actions">

                <button type="submit" class="save-btn">
                    Save Product
                </button>

                <a href="{{ route('admin.products.index') }}"
                   class="cancel-btn">
                    Cancel
                </a>

            </div>

        </form>

    </div>


    {{-- Page CSS --}}
    <style>

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
        }

        .back-btn {
            background: #343a40;
            color: white;
            padding: 9px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .back-btn:hover {
            background: #212529;
        }

        .error-box {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .error-box ul {
            margin-top: 8px;
            padding-left: 20px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #007bff;
        }

        .form-group textarea {
            resize: vertical;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .form-group small {
            margin-top: 7px;
            color: #777;
            font-size: 12px;
        }

        .form-actions {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }

        .save-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .save-btn:hover {
            background: #0056b3;
        }

        .cancel-btn {
            background: #6c757d;
            color: white;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .cancel-btn:hover {
            background: #545b62;
        }

        @media (max-width: 768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .form-card {
                padding: 20px;
            }

        }

    </style>

@endsection
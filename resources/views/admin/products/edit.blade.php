@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')

    <div class="page-header">

        <h1>Edit Product</h1>

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


    <div class="form-card">

        <form action="{{ route('admin.products.update', $product->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="form-grid">

                {{-- Product Name --}}
                <div class="form-group">

                    <label>Product Name</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $product->name) }}"
                           placeholder="Enter product name">

                </div>


                {{-- SKU --}}
                <div class="form-group">

                    <label>SKU</label>

                    <input type="text"
                           name="sku"
                           value="{{ old('sku', $product->sku) }}"
                           placeholder="Enter SKU">

                </div>


                {{-- Category --}}
                <div class="form-group">

                    <label>Category</label>

                    <input type="text"
                           name="category"
                           value="{{ old('category', $product->category) }}"
                           placeholder="Enter category">

                </div>


                {{-- Brand --}}
                <div class="form-group">

                    <label>Brand</label>

                    <input type="text"
                           name="brand"
                           value="{{ old('brand', $product->brand) }}"
                           placeholder="Enter brand">

                </div>


                {{-- Price --}}
                <div class="form-group">

                    <label>Price</label>

                    <input type="number"
                           step="0.01"
                           name="price"
                           value="{{ old('price', $product->price) }}"
                           placeholder="Enter price">

                </div>


                {{-- Currency --}}
                <div class="form-group">

                    <label>Currency</label>

                    <input type="text"
                           name="currency"
                           value="{{ old('currency', $product->currency) }}"
                           placeholder="SAR">

                </div>


                {{-- Stock --}}
                <div class="form-group">

                    <label>Stock</label>

                    <input type="number"
                           name="stock"
                           value="{{ old('stock', $product->stock) }}"
                           placeholder="Enter stock">

                </div>


                {{-- Rating --}}
                <div class="form-group">

                    <label>Rating</label>

                    <input type="number"
                           step="0.1"
                           min="0"
                           max="5"
                           name="rating"
                           value="{{ old('rating', $product->rating) }}"
                           placeholder="0 - 5">

                </div>


                {{-- Reviews --}}
                <div class="form-group">

                    <label>Reviews</label>

                    <input type="number"
                           min="0"
                           name="reviews"
                           value="{{ old('reviews', $product->reviews) }}"
                           placeholder="Number of reviews">

                </div>


                {{-- Featured --}}
                <div class="form-group">

                    <label>Featured Product</label>

                    <select name="is_featured">

                        <option value="0"
                            {{ old('is_featured', $product->is_featured) == 0 ? 'selected' : '' }}>
                            No
                        </option>

                        <option value="1"
                            {{ old('is_featured', $product->is_featured) == 1 ? 'selected' : '' }}>
                            Yes
                        </option>

                    </select>

                </div>


                {{-- Description --}}
                <div class="form-group full-width">

                    <label>Description</label>

                    <textarea name="description"
                              rows="5"
                              placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>

                </div>


                {{-- Current Image --}}
                <div class="form-group">

                    <label>Current Image</label>

                    <div class="current-image">

                        @if($product->image)

                            <img src="{{ asset($product->image) }}"
                                 alt="{{ $product->name }}">

                        @else

                            <p>No Image</p>

                        @endif

                    </div>

                </div>


                {{-- New Image --}}
                <div class="form-group">

                    <label>Change Image</label>

                    <input type="file"
                           name="image"
                           accept="image/*">

                    <small>
                        Select a new image if you want to replace the current image.
                    </small>

                </div>

            </div>


            {{-- Buttons --}}
            <div class="form-actions">

                <button type="submit" class="update-btn">
                    Update Product
                </button>

                <a href="{{ route('admin.products.index') }}"
                   class="cancel-btn">
                    Cancel
                </a>

            </div>


        </form>

    </div>


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


        /* Error Box */

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


        /* Form Card */

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }


        /* Form Grid */

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


        /* Inputs */

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


        /* Current Image */

        .current-image {
            height: 180px;
            border: 1px solid #ddd;
            border-radius: 6px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f8f9fa;
        }

        .current-image img {
            max-width: 160px;
            max-height: 160px;
            object-fit: contain;
        }


        .form-group small {
            margin-top: 7px;
            color: #777;
            font-size: 12px;
        }


        /* Buttons */

        .form-actions {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }

        .update-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .update-btn:hover {
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


        /* Mobile */

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
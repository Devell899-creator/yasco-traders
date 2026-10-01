@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')

    <div class="page-header">

        <h1>Edit Category</h1>

    </div>


    <div class="form-card">

        <form action="{{ route('admin.categories.update', $category->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            {{-- Name --}}
            <div class="form-group">

                <label for="name">
                    Category Name
                </label>

                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $category->name) }}">

                @error('name')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>

            {{-- Description --}}
            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea id="description"
                          name="description"
                          rows="5">{{ old('description', $category->description) }}</textarea>

                @error('description')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- Current Image --}}
            @if($category->image)

                <div class="current-image">

                    <label>Current Image</label>

                    <br>

                    <img src="{{ asset($category->image) }}"
                         alt="{{ $category->name }}">

                </div>

            @endif


            {{-- New Image --}}
            <div class="form-group">

                <label for="image">
                    Change Image
                </label>

                <input type="file"
                       id="image"
                       name="image">

                <small class="help-text">
                    Leave empty if you don't want to change the image.
                </small>

                @error('image')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- Status --}}
            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select id="status" name="status">

                    <option value="1"
                        {{ old('status', $category->status) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status', $category->status) == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>


            {{-- Sort Order --}}
            <div class="form-group">

                <label for="sort_order">
                    Sort Order
                </label>

                <input type="number"
                       id="sort_order"
                       name="sort_order"
                       min="0"
                       value="{{ old('sort_order', $category->sort_order) }}">

                @error('sort_order')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- Buttons --}}
            <div class="form-actions">

                <a href="{{ route('admin.categories.index') }}"
                   class="cancel-btn">
                    Cancel
                </a>

                <button type="submit"
                        class="save-btn">
                    Update Category
                </button>

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
            background: #6c757d;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
        }

        .form-card {
            background: white;
            max-width: 800px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label,
        .current-image label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .form-group textarea {
            resize: vertical;
        }

        .current-image {
            margin-bottom: 20px;
        }

        .current-image img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border: 1px solid #eee;
            border-radius: 6px;
            padding: 5px;
        }

        .help-text {
            display: block;
            margin-top: 6px;
            color: #777;
            font-size: 12px;
        }

        .error {
            display: block;
            margin-top: 6px;
            color: #dc3545;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .cancel-btn,
        .save-btn {
            padding: 10px 18px;
            border-radius: 6px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .cancel-btn {
            background: #6c757d;
            color: white;
        }

        .save-btn {
            background: #007bff;
            color: white;
        }

        .save-btn:hover {
            background: #0056b3;
        }

        @media (max-width: 768px) {

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .cancel-btn,
            .save-btn {
                text-align: center;
            }

        }

    </style>

@endsection
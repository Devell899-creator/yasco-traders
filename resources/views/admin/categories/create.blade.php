@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')

    <div class="page-header">

        <h1>Add Category</h1>

    </div>


    <div class="form-card">

        <form action="{{ route('admin.categories.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf


            {{-- Name --}}
            <div class="form-group">

                <label for="name">
                    Category Name
                </label>

                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Enter category name">

                @error('name')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            {{-- Description --}}
            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea id="description"
                          name="description"
                          rows="5"
                          placeholder="Enter category description">{{ old('description') }}</textarea>

                @error('description')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Image --}}
            <div class="form-group">

                <label for="image">
                    Category Image
                </label>

                <input type="file"
                       id="image"
                       name="image">

                <small class="help-text">
                    JPG, JPEG, PNG or WEBP. Maximum 2MB.
                </small>

                @error('image')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Status --}}
            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select id="status" name="status">

                    <option value="1"
                        {{ old('status', 1) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status') === '0' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

                @error('status')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Sort Order --}}
            <div class="form-group">

                <label for="sort_order">
                    Sort Order
                </label>

                <input type="number"
                       id="sort_order"
                       name="sort_order"
                       value="{{ old('sort_order', 0) }}"
                       min="0"
                       placeholder="0">

                <small class="help-text">
                    Smaller numbers appear first.
                </small>

                @error('sort_order')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Buttons --}}
            <div class="form-actions">

                <a href="{{ route('admin.categories.index') }}" class="cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="save-btn">
                    Save Category
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
            font-size: 14px;
        }

        .back-btn:hover {
            background: #5a6268;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
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

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #007bff;
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
            font-size: 14px;
            text-decoration: none;
            border: none;
            cursor: pointer;
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

            .page-header {
                align-items: flex-start;
                gap: 15px;
            }

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
@extends('admin.layouts.app')

@section('title', 'Edit Website Content')

@section('content')

    <div style="padding: 20px;">

        <h1 style="color: black; margin-bottom: 25px;">
            Edit Website Content
        </h1>

        <div style="
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            max-width: 800px;
        ">

            <form method="POST" action="{{ route('admin.website-content.update', $content->id) }}">

                @csrf
                @method('PUT')

                {{-- Page --}}
                <div style="margin-bottom: 18px;">
                    <label>Page</label>

                    <input type="text" name="page" value="{{ old('page', $content->page) }}" required style="
                               width: 100%;
                               padding: 10px;
                               margin-top: 6px;
                               border: 1px solid #ccc;
                               border-radius: 5px;
                           ">
                </div>

                {{-- Section --}}
                <div style="margin-bottom: 18px;">
                    <label>Section</label>

                    <input type="text" name="section" value="{{ old('section', $content->section) }}" required style="
                               width: 100%;
                               padding: 10px;
                               margin-top: 6px;
                               border: 1px solid #ccc;
                               border-radius: 5px;
                           ">
                </div>

                {{-- Key --}}
                <div style="margin-bottom: 18px;">
                    <label>Key</label>

                    <input type="text" name="key" value="{{ old('key', $content->key) }}" required style="
                               width: 100%;
                               padding: 10px;
                               margin-top: 6px;
                               border: 1px solid #ccc;
                               border-radius: 5px;
                           ">
                </div>

                {{-- Value --}}
                <div style="margin-bottom: 18px;">
                    <label>Content / Value</label>

                    <textarea name="value" rows="5" style="
                                  width: 100%;
                                  padding: 10px;
                                  margin-top: 6px;
                                  border: 1px solid #ccc;
                                  border-radius: 5px;
                              ">{{ old('value', $content->value) }}</textarea>
                </div>

                {{-- Type --}}
                <div style="margin-bottom: 25px;">
                    <label>Type</label>

                    <select name="type" required style="
                                width: 100%;
                                padding: 10px;
                                margin-top: 6px;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                            ">

                        <option value="text" {{ $content->type == 'text' ? 'selected' : '' }}>
                            Text
                        </option>

                        <option value="textarea" {{ $content->type == 'textarea' ? 'selected' : '' }}>
                            Textarea
                        </option>

                        <option value="image" {{ $content->type == 'image' ? 'selected' : '' }}>
                            Image
                        </option>

                    </select>
                </div>

                <button type="submit" style="
                            background: #28a745;
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            cursor: pointer;
                        ">
                    Update Content
                </button>

                <a href="{{ route('admin.website-content.index') }}" style="
                       margin-left: 10px;
                       background: #6c757d;
                       color: white;
                       padding: 10px 20px;
                       border-radius: 5px;
                       text-decoration: none;
                   ">
                    Cancel
                </a>

            </form>

        </div>

    </div>

@endsection
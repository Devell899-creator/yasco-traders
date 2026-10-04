@extends('admin.layouts.app')

@section('title', 'Add Website Content')

@section('content')

    <div style="padding: 20px;">

        <h1 style="color: black; margin-bottom: 25px;">
            Add Website Content
        </h1>

        <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            max-width: 800px;
        ">

            <form method="POST" action="{{ route('admin.website-content.store') }}">

                @csrf

                {{-- Page --}}
                <div style="margin-bottom: 18px;">
                    <label>Page</label>

                    <input type="text" name="page" value="{{ old('page') }}" placeholder="Example: home" required style="
                               width: 100%;
                               padding: 10px;
                               margin-top: 6px;
                               border: 1px solid #ccc;
                               border-radius: 5px;
                           ">

                    @error('page')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>


                {{-- Section --}}
                <div style="margin-bottom: 18px;">
                    <label>Section</label>

                    <input type="text" name="section" value="{{ old('section') }}" placeholder="Example: hero" required
                        style="
                               width: 100%;
                               padding: 10px;
                               margin-top: 6px;
                               border: 1px solid #ccc;
                               border-radius: 5px;
                           ">

                    @error('section')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>


                {{-- Key --}}
                <div style="margin-bottom: 18px;">
                    <label>Key</label>

                    <input type="text" name="key" value="{{ old('key') }}" placeholder="Example: heading" required style="
                               width: 100%;
                               padding: 10px;
                               margin-top: 6px;
                               border: 1px solid #ccc;
                               border-radius: 5px;
                           ">

                    @error('key')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>


                {{-- Value --}}
                <div style="margin-bottom: 18px;">
                    <label>Content / Value</label>

                    <textarea name="value" rows="5" placeholder="Enter website content..." style="
                                  width: 100%;
                                  padding: 10px;
                                  margin-top: 6px;
                                  border: 1px solid #ccc;
                                  border-radius: 5px;
                              ">{{ old('value') }}</textarea>

                    @error('value')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
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

                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="image">Image</option>

                    </select>

                    @error('type')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>


                {{-- Buttons --}}
                <button type="submit" style="
                            background: #28a745;
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            cursor: pointer;
                        ">
                    Save Content
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
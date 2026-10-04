@extends('admin.layouts.app')

@section('title', 'Website Content')

@section('content')

    <div style="padding: 20px;">

        <div style="
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        ">
            <h1 style="color: black; margin: 0;">
                Website Content
            </h1>

            <a href="{{ route('admin.website-content.create') }}" style="
                   background: #007bff;
                   color: white;
                   padding: 10px 18px;
                   text-decoration: none;
                   border-radius: 5px;
               ">
                Add Content
            </a>
        </div>


        <div style="
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow-x: auto;
        ">

            <table style="
                width: 100%;
                border-collapse: collapse;
            ">

                <thead>
                    <tr style="background: #f4f4f4;">

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            ID
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Page
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Section
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Key
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Value
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Type
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Action
                        </th>

                    </tr>
                </thead>


                <tbody>

                    @forelse($contents as $content)

                        <tr>

                            <td style="padding: 12px; border: 1px solid #ddd;">
                                {{ $content->id }}
                            </td>

                            <td style="padding: 12px; border: 1px solid #ddd;">
                                {{ $content->page }}
                            </td>

                            <td style="padding: 12px; border: 1px solid #ddd;">
                                {{ $content->section }}
                            </td>

                            <td style="padding: 12px; border: 1px solid #ddd;">
                                {{ $content->key }}
                            </td>

                            <td style="
                                    padding: 12px;
                                    border: 1px solid #ddd;
                                    max-width: 350px;
                                ">
                                {{ $content->value }}
                            </td>

                            <td style="padding: 12px; border: 1px solid #ddd;">
                                {{ $content->type }}
                            </td>

                            <td style="
                                    padding: 12px;
                                    border: 1px solid #ddd;
                                    white-space: nowrap;
                                ">

                                <a href="{{ route('admin.website-content.edit', $content->id) }}" style="
                                           background: #28a745;
                                           color: white;
                                           padding: 7px 12px;
                                           text-decoration: none;
                                           border-radius: 4px;
                                       ">
                                    Edit
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" style="
                                        padding: 25px;
                                        text-align: center;
                                        color: #777;
                                    ">
                                No website content found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
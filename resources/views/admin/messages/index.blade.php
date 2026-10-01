@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')

    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    ">

        <h1 style="font-size: 32px; font-weight: 700;">
            Messages
        </h1>

        <a href="{{ route('admin.messages.create') }}"
           style="
               background: #007bff;
               color: white;
               padding: 10px 18px;
               border-radius: 6px;
               text-decoration: none;
           ">
            Add Message
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div style="
            background: #d4edda;
            color: #155724;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        ">
            {{ session('success') }}
        </div>

    @endif


    <div style="
        background: white;
        padding: 20px;
        border-radius: 8px;
        overflow-x: auto;
    ">

        <table style="
            width: 100%;
            border-collapse: collapse;
        ">

            <thead>

                <tr style="background: #f8f9fa;">

                    <th style="padding: 12px; text-align: left;">
                        ID
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Name
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Email
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Phone
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Subject
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Message
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Status
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($messages as $message)

                    <tr style="border-top: 1px solid #eee;">

                        {{-- ID --}}
                        <td style="padding: 12px;">
                            {{ $message->id }}
                        </td>


                        {{-- Name --}}
                        <td style="padding: 12px;">
                            {{ $message->name }}
                        </td>


                        {{-- Email --}}
                        <td style="padding: 12px;">
                            {{ $message->email }}
                        </td>


                        {{-- Phone --}}
                        <td style="padding: 12px;">
                            {{ $message->phone ?? 'N/A' }}
                        </td>


                        {{-- Subject --}}
                        <td style="padding: 12px;">
                            {{ $message->subject ?? 'No Subject' }}
                        </td>


                        {{-- Message --}}
                        <td style="
                            padding: 12px;
                            max-width: 300px;
                        ">
                            {{ \Illuminate\Support\Str::limit($message->message, 50) }}
                        </td>


                        {{-- Status --}}
                        <td style="padding: 12px;">

                            @if($message->is_read)

                                <span style="
                                    background: #d4edda;
                                    color: #155724;
                                    padding: 5px 10px;
                                    border-radius: 5px;
                                ">
                                    Read
                                </span>

                            @else

                                <span style="
                                    background: #f8d7da;
                                    color: #721c24;
                                    padding: 5px 10px;
                                    border-radius: 5px;
                                ">
                                    Unread
                                </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td style="padding: 12px;">

                            <div style="
                                display: flex;
                                gap: 8px;
                                align-items: center;
                            ">


                                {{-- View --}}
                                <a href="{{ route('admin.messages.show', $message->id) }}"
                                   style="
                                       background: #17a2b8;
                                       color: white;
                                       padding: 7px 12px;
                                       border-radius: 5px;
                                       text-decoration: none;
                                   ">
                                    View
                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('admin.messages.edit', $message->id) }}"
                                   style="
                                       background: #007bff;
                                       color: white;
                                       padding: 7px 12px;
                                       border-radius: 5px;
                                       text-decoration: none;
                                   ">
                                    Edit
                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.messages.destroy', $message->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this message?')"
                                        style="
                                            background: #dc3545;
                                            color: white;
                                            border: none;
                                            padding: 7px 12px;
                                            border-radius: 5px;
                                            cursor: pointer;
                                        "
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td
                            colspan="8"
                            style="
                                padding: 25px;
                                text-align: center;
                                color: #777;
                            "
                        >
                            No messages found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- Pagination --}}
        <div style="margin-top: 20px;">

            {{ $messages->links() }}

        </div>

    </div>

@endsection
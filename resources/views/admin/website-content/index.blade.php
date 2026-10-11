@extends('admin.layouts.app')

@section('title', 'Website Content')

@section('content')

    <style>
        .wc-page {
            padding: 10px 0 30px;
            color: #e5e7eb;
        }

        .wc-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .wc-title {
            margin: 0 0 7px;
            color: #f8fafc;
            font-size: 27px;
            font-weight: 700;
        }

        .wc-subtitle {
            margin: 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .wc-add-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 17px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s;
        }

        .wc-add-btn:hover {
            background: #4338ca;
            color: #fff;
            text-decoration: none;
        }

        .wc-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .wc-stat-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px;
            background: #172337;
            border: 1px solid #2b3a50;
            border-radius: 12px;
        }

        .wc-stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            flex-shrink: 0;
            border-radius: 10px;
            background: rgba(99, 102, 241, 0.15);
            color: #a5b4fc;
            font-size: 18px;
        }

        .wc-stat-label {
            display: block;
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .wc-stat-value {
            color: #f8fafc;
            font-size: 21px;
            font-weight: 800;
        }

        .wc-card {
            background: #172337;
            border: 1px solid #2b3a50;
            border-radius: 13px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .wc-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 20px 22px;
            background: #1d2b41;
            border-bottom: 1px solid #2b3a50;
        }

        .wc-card-header h3 {
            margin: 0 0 5px;
            color: #f8fafc;
            font-size: 17px;
            font-weight: 700;
        }

        .wc-card-header p {
            margin: 0;
            color: #94a3b8;
            font-size: 12px;
        }

        .wc-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .wc-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        .wc-table thead th {
            padding: 15px 16px;
            background: #111c2e;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            text-align: left;
            border-bottom: 1px solid #2b3a50;
            white-space: nowrap;
        }

        .wc-table tbody td {
            padding: 15px 16px;
            color: #dbe4f0;
            font-size: 13px;
            border-bottom: 1px solid #29384d;
            vertical-align: middle;
        }

        .wc-table tbody tr:last-child td {
            border-bottom: none;
        }

        .wc-table tbody tr:hover {
            background: rgba(99, 102, 241, 0.05);
        }

        .wc-id {
            color: #94a3b8;
            font-weight: 700;
        }

        .wc-page-badge {
            display: inline-block;
            padding: 5px 9px;
            color: #a5b4fc;
            background: rgba(99, 102, 241, 0.13);
            border: 1px solid rgba(129, 140, 248, 0.2);
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
        }

        .wc-section {
            color: #cbd5e1;
        }

        .wc-key {
            color: #67e8f9;
            font-family: monospace;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .wc-value {
            max-width: 300px;
            color: #cbd5e1;
            overflow-wrap: anywhere;
            white-space: pre-line;
            line-height: 1.6;
        }

        .wc-type-badge {
            display: inline-block;
            padding: 5px 9px;
            background: #263449;
            color: #cbd5e1;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        .wc-edit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 8px 12px;
            background: rgba(34, 197, 94, 0.12);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.25);
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }

        .wc-edit-btn:hover {
            background: rgba(34, 197, 94, 0.22);
            color: #bbf7d0;
            text-decoration: none;
        }

        .wc-empty {
            padding: 55px 20px !important;
            text-align: center;
        }

        .wc-empty-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            margin-bottom: 15px;
            background: #263449;
            color: #94a3b8;
            border-radius: 16px;
            font-size: 23px;
        }

        .wc-empty h4 {
            margin: 0 0 7px;
            color: #f1f5f9;
            font-size: 16px;
        }

        .wc-empty p {
            margin: 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .wc-footer {
            padding: 16px 20px;
            background: #1d2b41;
            border-top: 1px solid #2b3a50;
            color: #94a3b8;
            font-size: 12px;
        }

        @media (max-width: 767px) {
            .wc-stats {
                grid-template-columns: 1fr;
            }

            .wc-title {
                font-size: 23px;
            }

            .wc-add-btn {
                width: 100%;
            }

            .wc-card-header {
                padding: 17px;
            }
        }
    </style>

    <div class="wc-page">

        {{-- Page Header --}}
        <div class="wc-header">
            <div>
                <h1 class="wc-title">Website Content</h1>
                <p class="wc-subtitle">
                    Manage the text and content displayed across your website.
                </p>
            </div>

            <a href="{{ route('admin.website-content.create') }}" class="wc-add-btn">
                <i class="fas fa-plus"></i>
                Add Content
            </a>
        </div>

        {{-- Summary Cards --}}
        <div class="wc-stats">

            <div class="wc-stat-card">
                <div class="wc-stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div>
                    <span class="wc-stat-label">Total Content Entries</span>
                    <div class="wc-stat-value">{{ $contents->count() }}</div>
                </div>
            </div>

            <div class="wc-stat-card">
                <div class="wc-stat-icon" style="color: #67e8f9; background: rgba(6, 182, 212, 0.12);">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div>
                    <span class="wc-stat-label">Pages Represented</span>
                    <div class="wc-stat-value">
                        {{ $contents->pluck('page')->unique()->count() }}
                    </div>
                </div>
            </div>

            <div class="wc-stat-card">
                <div class="wc-stat-icon" style="color: #86efac; background: rgba(34, 197, 94, 0.12);">
                    <i class="fas fa-th-large"></i>
                </div>
                <div>
                    <span class="wc-stat-label">Sections Represented</span>
                    <div class="wc-stat-value">
                        {{ $contents->pluck('section')->unique()->count() }}
                    </div>
                </div>
            </div>

        </div>

        {{-- Content Table --}}
        <div class="wc-card">

            <div class="wc-card-header">
                <div>
                    <h3>
                        <i class="fas fa-list-alt" style="color: #818cf8; margin-right: 8px;"></i>
                        All Content Entries
                    </h3>
                    <p>View and edit your website content records.</p>
                </div>
            </div>

            <div class="wc-table-wrap">

                <table class="wc-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Page</th>
                            <th>Section</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($contents as $content)

                            <tr>
                                <td class="wc-id">
                                    #{{ $content->id }}
                                </td>

                                <td>
                                    <span class="wc-page-badge">
                                        {{ $content->page }}
                                    </span>
                                </td>

                                <td class="wc-section">
                                    {{ $content->section }}
                                </td>

                                <td>
                                    <span class="wc-key">
                                        {{ $content->key }}
                                    </span>
                                </td>

                                <td>
                                    <div class="wc-value" title="{{ $content->value }}">
                                        {{ $content->value }}
                                    </div>
                                </td>

                                <td>
                                    <span class="wc-type-badge">
                                        {{ $content->type }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('admin.website-content.edit', $content->id) }}" class="wc-edit-btn">
                                        <i class="fas fa-pen"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="wc-empty">
                                    <div class="wc-empty-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>

                                    <h4>No Website Content Found</h4>

                                    <p>Add your first content entry to manage website text here.</p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="wc-footer">
                Showing {{ $contents->count() }} content entries
            </div>

        </div>

    </div>

@endsection
<?php

namespace App\Http\Controllers;

use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class WebsiteContentController extends Controller
{
    public function index()
    {
        $contents = WebsiteContent::orderBy('page')
            ->orderBy('section')
            ->get();

        return view('admin.website-content.index', compact('contents'));
    }

    public function create(){
        return view('admin.website-content.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value' => 'nullable|string',
            'type' => 'required|string|max:50',
        ]);

        WebsiteContent::create($validated);

        return redirect()->route('admin.website-content.index')->with('success', 'Website content added successfully.');
    }

    public function edit(WebsiteContent $websiteContent){
        return view('admin.website-content.edit', [
           'content' => $websiteContent
        ]);
    }

    public function update(Request $request, WebsiteContent $websiteContent){
        $validated = $request->validate([
           'page' => 'required|string|max:255',
           'section' => 'required|string|max:255',
           'key' => 'required|string|max:255',
           'value' => 'nullable|string',
           'type' => 'required|string|max:50',
        ]);

       $websiteContent->update($validated);

       return redirect()->route('admin.website-content.index')->with('success', 'Website content updated successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    // Store the uploaded document in the database
    public function store(Request $request)
    {
        // Validate the file input
        $validated = $request->validate([
            'document' => ['required', 'file', 'mimes:pdf,jpg,png', 'max:10240'],
            'documentId' => ['required', 'string', 'unique:documents,documentId'],
            'name' => ['required', 'string', 'max:255'],
            'document_type' => ['required', 'string', 'max:255'],
            'expiry_date' => ['nullable', 'date'],
            'additional_info' => ['nullable', 'string'],
        ]);

        // Handle the file upload
        $file = $request->file('document');
        $fileName = 'document-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('UserUploads/Documents'), $fileName);
        $path = 'UserUploads/Documents/' . $fileName;

        // Get file extension and ensure it's 3 characters max
        $fileType = strtolower($file->getClientOriginalExtension());
        if ($fileType === 'jpeg') {
            $fileType = 'jpg';
        }

        // Create document record
        $document = Document::create([
            'documentId' => $validated['documentId'],
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'file_path' => $fileName,
            'file_type' => $fileType,
            'added_at' => now(),
            'document_type' => $validated['document_type'],
            'expiry_date' => $validated['expiry_date'],
            'additional_info' => $validated['additional_info'],
        ]);

        // Redirect back with success message and document ID
        return redirect()->route('user.documents')
            ->with([
                'success' => 'Document uploaded successfully!',
                'document_id' => $document->id
            ]);
    }


    // Display all documents
    public function index()
    {
        // Fetch all documents from the database
        $user_id = Auth::id();
        $documents = Document::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        return view('user.documents', compact('documents'));
    }

    // Show details of a specific document
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('user.documents-view', compact('document'));
    }
    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'document_type' => ['required', 'string', 'max:255'],
            'expiry_date' => ['nullable', 'date'],
            'additional_info' => ['nullable', 'string'],
            'document' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:10240'],
            'documentId' => ['required', 'string', 'unique:documents,documentId,' . $document->id],
        ]);

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = 'document-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('UserUploads/Documents'), $fileName);
            $path = 'UserUploads/Documents/' . $fileName;
            $fileType = strtolower($file->getClientOriginalExtension());
            if ($fileType === 'jpeg') {
                $fileType = 'jpg';
            }
        }

        $document->update([
            'name' => $validated['name'],
            'document_type' => $validated['document_type'],
            'expiry_date' => $validated['expiry_date'],
            'additional_info' => $validated['additional_info'],
            'file_path' => $path,
            'file_type' => $fileType,
            'added_at' => now(),
            'documentId' => $validated['documentId'],
        ]);
        return redirect()->route('user.documents')->with('success', 'Document updated successfully!');
    }
    
    // Delete a document
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        return redirect()->route('user.documents')->with('success', 'Document deleted successfully!');
    }
}

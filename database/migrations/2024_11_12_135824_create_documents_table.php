<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->integer('user_id'); // Reference to the user who uploaded the document
            $table->string('documentId')->unique();  // Document ID, used as the unique document number
            $table->string('name');  // Name of the document (e.g., "Passport", "Credit Card")
            $table->string('file_path');  // Path to the stored file
            $table->enum('file_type', ['pdf', 'docx', 'xlsx', 'jpg', 'png']);  // File type (e.g., PDF, DOCX, etc.)
            $table->string('document_type'); // Type of document (e.g., "credit_card", "debit_card", "passport", etc.)
            $table->date('expiry_date')->nullable();  // Expiry date for documents like passport, credit card, etc.
            $table->text('additional_info')->nullable(); // Any extra information (e.g., issuing country, bank name)
            $table->timestamp('added_at')->useCurrent();  // Timestamp for when the document was added
            $table->timestamps();  // Created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};

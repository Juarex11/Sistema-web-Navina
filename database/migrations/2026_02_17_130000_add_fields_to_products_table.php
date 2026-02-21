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
        Schema::table('products', function (Blueprint $table) {
            $table->string('name');
            $table->text('description')->nullable()->after('name');
            $table->text('benefits')->nullable()->after('description');
            $table->boolean('status')->default(true)->after('benefits');
            $table->decimal('price',10,2)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn([
                'name',
                'description',
                'benefits',
                'status',
                'price'
            ]);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Bazadagi barcha jadval nomlarini olamiz
        $tables = DB::connection()->getSchemaBuilder()->getTableListing();

        foreach ($tables as $table) {
            // Agar jadvalda 'result' degan ustun bo'lsa
            if (Schema::hasColumn($table, 'result')) {
                Schema::table($table, function (Blueprint $table) {
                    // Uni string turiga o'zgartiramiz
                    $table->string('result')->nullable()->change();
                });
            }
        }
    }

    public function down(): void
    {
        // Orqaga qaytarish qiyinroq, lekin kerak bo'lsa qo'lda yoziladi
    }
};

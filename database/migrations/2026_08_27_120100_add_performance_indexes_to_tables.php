<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->index('publish_date', 'magazines_publish_date_index');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->index(
                ['is_published', 'published_at'],
                'articles_publication_status_date_index'
            );
        });
    }

    public function down(): void
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->dropIndex('magazines_publish_date_index');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex('articles_publication_status_date_index');
        });
    }
};

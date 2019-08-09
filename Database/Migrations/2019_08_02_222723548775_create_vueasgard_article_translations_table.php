<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVueasgardArticleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vueasgard__article_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('article_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['article_id', 'locale']);
            $table->foreign('article_id')->references('id')->on('vueasgard__articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vueasgard__article_translations', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
        });
        Schema::dropIfExists('vueasgard__article_translations');
    }
}

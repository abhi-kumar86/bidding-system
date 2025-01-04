<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('product_id')
                ->unique() // One-to-one relationship with products
                ->constrained('products')
                ->onDelete('cascade'); // Delete auction details if product is deleted
            $table->timestamp('start_time'); // Auction start time
            $table->timestamp('end_time')->nullable(); // Auction end time, allows NULL
            $table->decimal('current_price', 10, 2)->default(0); // Default starting price is 0
            $table->decimal('bid_increment', 10, 2); // Minimum bid increment
            $table->foreignId('winning_bid_id')
                ->nullable() // Can be null if no winning bid exists
                ->constrained('bids')
                ->onDelete('set null'); // Set to null if winning bid is deleted
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction_details'); // Drop the table on rollback
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Backfill existing single-value strings as one-element JSON arrays
        // while the column is still a string. Writing valid JSON text now lets
        // the subsequent ->change() to JSON type accept the data on MySQL.
        DB::table('registrations')
            ->whereNotNull('attending_reason')
            ->orderBy('id')
            ->each(function ($row): void {
                $current = (string) $row->attending_reason;

                if (str_starts_with(ltrim($current), '[')) {
                    return;
                }

                DB::table('registrations')
                    ->where('id', $row->id)
                    ->update(['attending_reason' => json_encode([$current])]);
            });

        Schema::table('registrations', function (Blueprint $table): void {
            $table->json('attending_reason')->change();
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table): void {
            $table->string('attending_reason')->change();
        });

        DB::table('registrations')
            ->whereNotNull('attending_reason')
            ->orderBy('id')
            ->each(function ($row): void {
                $decoded = json_decode((string) $row->attending_reason, true);

                if (is_array($decoded) && isset($decoded[0])) {
                    DB::table('registrations')
                        ->where('id', $row->id)
                        ->update(['attending_reason' => $decoded[0]]);
                }
            });
    }
};

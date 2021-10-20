<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laragrad\Support\Userstamps;
use Laragrad\Largent\Models\Entry;

class CreateLargentEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('largent_entries', function (Blueprint $table) {

            $entityKeyType = Config::get('laragrad.largent.entity_ketype', 'int');

            $table->id('id');

            $table->smallInteger('sys_type_code')->default(Entry::ENTRY_SYS_TYPE_NORMAL);
            $table->smallInteger('type_code');
            $table->date('entry_date');
            $table->date('accounting_date');
            $table->bigInteger('operation_id');

            // debit part of entry
            $table->string('db_account_code', 20);
            $table->string('db_entity_type', 50);

            $table->uuid('db_entity_id');
            $table->decimal('db_sum', 15, 2);
            $table->string('db_currency_code', 3);

            // credit part of entry
            $table->string('cr_account_code', 20);
            $table->string('cr_entity_type', 50);
            $table->uuid('cr_entity_id');
            $table->decimal('cr_sum', 15, 2);
            $table->string('cr_currency_code', 3);

            $table->bigInteger('compensation_id')->nullable();
            $table->smallInteger('compensation_kind_code')->nullable();
            $table->jsonb('details')->nullable();

            // timestamps
            $table->timestamps(6);
            $table->softDeletes('deleted_at', 6);

            // userstamps
            Userstamps::addUserstampsColumns($table, true);

            // Indexes
            $table->index('type_code', 'largent_entries_idx_type_code');
            $table->index('operation_id', 'largent_entries_idx_operation_id');
            $table->index('entry_date', 'largent_entries_idx_entry_date');
            $table->index('accounting_date', 'largent_entries_idx_accounting_id');
            $table->index('db_entity_id', 'largent_entries_idx_db_entity');
            $table->index('cr_entity_id', 'largent_entries_idx_cr_entity');

            // Foreign keys
            $table->foreign('operation_id', 'largent_entires_fk_operation_id')
                ->on('largent_operations')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('largent_entries');
    }
}

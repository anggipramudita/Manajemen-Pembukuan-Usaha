<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Companies
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('currency')->default('Rp');
            $table->decimal('tax_rate', 5, 2)->default(0);
            $table->timestamps();
        });

        // 2. Categories
        Schema::create('income_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('expense_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 3. Transactions (Incomes & Expenses)
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('income_categories')->onDelete('cascade');
            $table->date('date');
            $table->decimal('nominal', 15, 2);
            $table->text('note')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });

        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('expense_categories')->onDelete('cascade');
            $table->string('supplier')->nullable();
            $table->date('date');
            $table->decimal('nominal', 15, 2);
            $table->text('note')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });

        // 4. Debts & Receivables
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->string('creditor_name');
            $table->decimal('nominal', 15, 2);
            $table->date('due_date');
            $table->enum('status', ['Unpaid', 'Paid'])->default('Unpaid');
            $table->timestamps();
        });

        Schema::create('receivables', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->decimal('nominal', 15, 2);
            $table->date('date');
            $table->date('due_date');
            $table->enum('status', ['Unpaid', 'Paid'])->default('Unpaid');
            $table->timestamps();
        });

        // 5. Cash
        Schema::create('cash', function (Blueprint $table) {
            $table->id();
            $table->decimal('initial_balance', 15, 2)->default(0);
            $table->decimal('incoming', 15, 2)->default(0);
            $table->decimal('outgoing', 15, 2)->default(0);
            $table->decimal('final_balance', 15, 2)->default(0);
            $table->date('date');
            $table->timestamps();
        });

        // 6. Banks & Transactions
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('account_number');
            $table->decimal('balance', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade');
            $table->enum('type', ['IN', 'OUT']);
            $table->decimal('nominal', 15, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_transactions');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('cash');
        Schema::dropIfExists('receivables');
        Schema::dropIfExists('debts');
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('incomes');
        Schema::dropIfExists('expense_categories');
        Schema::dropIfExists('income_categories');
        Schema::dropIfExists('companies');
    }
};

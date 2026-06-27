<?php

$dir = __DIR__;

$models = [
    'Company' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass Company extends Model\n{\n    protected \$guarded = [];\n}\n",
    'IncomeCategory' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass IncomeCategory extends Model\n{\n    protected \$guarded = [];\n    public function incomes() { return \$this->hasMany(Income::class, 'category_id'); }\n}\n",
    'ExpenseCategory' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass ExpenseCategory extends Model\n{\n    protected \$guarded = [];\n    public function expenses() { return \$this->hasMany(Expense::class, 'category_id'); }\n}\n",
    'Income' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass Income extends Model\n{\n    protected \$guarded = [];\n    public function category() { return \$this->belongsTo(IncomeCategory::class, 'category_id'); }\n    public function user() { return \$this->belongsTo(User::class); }\n}\n",
    'Expense' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass Expense extends Model\n{\n    protected \$guarded = [];\n    public function category() { return \$this->belongsTo(ExpenseCategory::class, 'category_id'); }\n    public function user() { return \$this->belongsTo(User::class); }\n}\n",
    'Debt' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass Debt extends Model\n{\n    protected \$guarded = [];\n}\n",
    'Receivable' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass Receivable extends Model\n{\n    protected \$guarded = [];\n}\n",
    'Cash' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass Cash extends Model\n{\n    protected \$table = 'cash';\n    protected \$guarded = [];\n}\n",
    'Bank' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass Bank extends Model\n{\n    protected \$guarded = [];\n    public function transactions() { return \$this->hasMany(BankTransaction::class); }\n}\n",
    'BankTransaction' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass BankTransaction extends Model\n{\n    protected \$guarded = [];\n    public function bank() { return \$this->belongsTo(Bank::class); }\n}\n",
    'User' => "<?php\n\nnamespace App\\Models;\n\nuse Illuminate\\Foundation\\Auth\\User as Authenticatable;\nuse Illuminate\\Notifications\\Notifiable;\nuse Spatie\\Permission\\Traits\\HasRoles;\n\nclass User extends Authenticatable\n{\n    use Notifiable, HasRoles;\n    protected \$guarded = [];\n    protected \$hidden = ['password', 'remember_token'];\n}\n"
];

foreach($models as $name => $content) {
    file_put_contents($dir . "/app/Models/{$name}.php", $content);
}

// Seeder
$seeder = "<?php\n\nnamespace Database\\Seeders;\n\nuse Illuminate\\Database\\Seeder;\nuse App\\Models\\User;\nuse App\\Models\\IncomeCategory;\nuse App\\Models\\ExpenseCategory;\nuse App\\Models\\Company;\nuse Spatie\\Permission\\Models\\Role;\nuse Illuminate\\Support\\Facades\\Hash;\n\nclass DatabaseSeeder extends Seeder\n{\n    public function run(): void\n    {\n        \$ownerRole = Role::create(['name' => 'Owner']);\n        \$adminRole = Role::create(['name' => 'Admin']);\n        \$staffRole = Role::create(['name' => 'Staff']);\n\n        \$owner = User::create(['name' => 'Owner UMKM', 'email' => 'owner@example.com', 'password' => Hash::make('password')]);\n        \$owner->assignRole(\$ownerRole);\n\n        \$admin = User::create(['name' => 'Admin Usaha', 'email' => 'admin@example.com', 'password' => Hash::make('password')]);\n        \$admin->assignRole(\$adminRole);\n\n        \$staff = User::create(['name' => 'Staff Biasa', 'email' => 'staff@example.com', 'password' => Hash::make('password')]);\n        \$staff->assignRole(\$staffRole);\n\n        Company::create(['name' => 'Usaha Maju Bersama', 'address' => 'Jl. Merdeka No. 10', 'phone' => '08123456789']);\n\n        \$inc_cats = ['Penjualan', 'Jasa', 'Pendapatan Lain'];\n        foreach(\$inc_cats as \$c) IncomeCategory::create(['name' => \$c]);\n\n        \$exp_cats = ['Belanja Barang', 'Gaji', 'Listrik', 'Air', 'Internet', 'Transportasi', 'Operasional', 'Pajak', 'Lainnya'];\n        foreach(\$exp_cats as \$c) ExpenseCategory::create(['name' => \$c]);\n    }\n}\n";
file_put_contents($dir . "/database/seeders/DatabaseSeeder.php", $seeder);

echo "Models and Seeder created successfully.";

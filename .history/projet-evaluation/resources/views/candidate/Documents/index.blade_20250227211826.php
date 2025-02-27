$table->uuid('id')->primary();
$table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
$table->enum('type', ['identity', 'certificate', 'other']);
$table->string('file_path');
$table->string('original_name');
$table->enum('status', ['pending', 'validated', 'rejected'])->default('pending');
$table->text('admin_comment')->nullable();
$table->timestamps();

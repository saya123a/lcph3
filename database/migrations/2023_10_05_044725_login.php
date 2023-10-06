use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique(); // Unique username
            $table->string('password');
            $table->string('email')->unique(); // Unique email for password reset
            $table->string('token')->nullable(); // Nullable for password reset tokens
            $table->timestamp('token_created_at')->nullable(); // Timestamp for token creation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('login');
    }
}

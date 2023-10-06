namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loginpage extends Model
{
    use HasFactory;

    protected $table = 'login';

    protected $fillable = [
        'username',
        'password',
        'email', // Add the 'email' column for password reset
        'token', // Add the 'token' column for password reset
        'token_created_at', // Add the 'token_created_at' column for password reset
    ];
}

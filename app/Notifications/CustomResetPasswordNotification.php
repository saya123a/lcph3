// Import the required classes at the top of the file
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
->action('Reset Password', url(config('app.url').route('password.reset', $this->token, false)))
->line('If you did not request a password reset, no further action is required.');
}
}

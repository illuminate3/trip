<?php


namespace App\Services;


use App\Notification;

class NotificationService
{

    public function make($data)
    {
        $notification = [
            'message' => $data->message,
            'expires_on' => $data->expires_on,
            'user_id' => $data->forUser,
            'expires' => true,
            // Specify the type when inserting
            // 1 for expiring notification
            // 2 For normal notification
            // 3 Self Destructing Notification
            'type' => 1
        ];

        return Notification::create($notification);
    }

    public function get($userId, $skip = 0)
    {
        return Notification::where('user_id', $userId)->orderBy('created_at')->get()->take(10)->skip($skip);
    }

    public function destroy($id)
    {
        return Notification::destroy($id);
    }

    public function sendUserNotification($message, $userId, $type)
    {
        $pusher = Illuminate\Support\Facades\App::make('pusher');
        return $pusher->trigger('notification', 'get-user-notification', array('text' => $message, 'userId' => $userId, 'type' => $type));
    }
}

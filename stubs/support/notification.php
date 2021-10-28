<?php

if (! function_exists('notificationDrivers')) {
    /**
     * Get Default Notification Drivers.
     */
    function notificationDrivers()
    {
        return config('notification.default');
    }
}

if (! function_exists('notificationEnabled')) {
    /**
     * Get Notification Enable Status.
     */
    function notificationEnabled()
    {
        return config('notification.enabled');
    }
}

if (! function_exists('simpleNotify')) {
    function simpleNotify(App\Models\User $user, $subject, $message, $url = null)
    {
        $user->notify(
            new \App\Notifications\DefaultNotification($subject, $message, $url)
        );
    }
}

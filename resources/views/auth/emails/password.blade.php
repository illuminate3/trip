
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Booking | Neptrip</title>
    <link rel="stylesheet" href="{{ asset('neptrip/css/foundation-emails.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/stylesheets/screen.css') }}">
    <style>

    </style>

    <style>

    </style>
</head>

<body class="email">
<!-- <style> -->
<table class="body" data-made-with-foundation="">
    <tr>
        <td class="float-center" align="center" valign="top">
            <h3>You requested a password change</h3>
            Click here to reset your password: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
        </td>
    </tr>
</table>
</body>

</html>
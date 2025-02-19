<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fghs</title>
</head>
<body>


    <form action="{{ route('submit.form') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <button type="submit">Submit</button>
    </form>


</body>
</html>

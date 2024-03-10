<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Facebook OTP Test</title>
</head>


<body>

    <div class="form">
    <h1>Test Task: Sign In with Facebook and Obtain OTP (PHP)</h1>
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg">
        <x-session-messages />  
        <a href="{{ url('/auth/facebook') }}" class="button-link">Sign In With Facebook</a>
    </div>
</body>

</html>
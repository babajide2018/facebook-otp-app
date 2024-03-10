@if (session('user_details'))
    <div>
        <p>User Details: {{ session('user_details')['name'] }} ({{ session('user_details')['email'] }})</p>
        
        @if (session('otp') && session('otp_expiry'))
            <p>OTP: {{ session('otp') }}</p>
            <p>Expires at: {{ session('otp_expiry')->format('Y-m-d H:i:s') }}</p>

            @if (now()->gt(session('otp_expiry')))
                <p style="color: red;">OTP has expired. Please sign in again.</p>
                <?php session()->flush(); ?>
            @endif
        @endif
    </div>
@endif

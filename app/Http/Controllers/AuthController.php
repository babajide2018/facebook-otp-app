<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //


    public function redirectToFacebook()
    {

        return Socialite::driver('facebook')->redirect();
    }


    public function handleFacebookCallback()
    {
        try {
            // Retrieve user details and access token
            $user = Socialite::driver('facebook')->user();
            

            // Check if the user details are available
            if ($user && !empty($user->getName()) && !empty($user->getEmail())) {
                // Access user details like name, email, etc.
                $name = $user->getName();
                $email = $user->getEmail();

                // Generate and store OTP with a limited time (e.g., 30 seconds)
                $otp = $this->generateOTP();
                $otpExpiry = now()->addSeconds(30); // Adjust the expiry time as needed

                // Store user details, OTP, and expiry time in the session or your database
                session(['user_details' => compact('name', 'email')]);
                session(['otp' => $otp, 'otp_expiry' => $otpExpiry]);

                // Redirect to the home view
                return redirect('/')->with('success', 'Successfully signed in with Facebook.');
            } else {
                return redirect('/')->with('error', 'Failed to retrieve valid user details from Facebook.');
            }
        } catch (\Exception $e) {
            // Handle exceptions
            return redirect('/')->with('error', 'Error during Facebook authentication: ' . $e->getMessage());
        }
    }
    // Function to generate a simple OTP
    private function generateOTP()
    {
        return rand(100000, 999999); // You can use a more secure method for OTP generation
    }
}

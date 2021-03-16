<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

use Auth;
use Socialite;

class SocialiteController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/close';

    public function redirectToProvider($provider)
    {
        if (!in_array($provider, $this->getAcceptedProviders())) {
            return redirect($this->redirectTo);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $driver = Socialite::driver($provider);

        if (config('services.' . $provider . '.fields')) {
            $driver->fields(config('services.' . $provider . '.fields'));
        }

        $userData = $driver->user();

        $user = $this->findOrCreateUser($userData, $provider);
        Auth::guard('api')->login($user, true);
        return redirect($this->redirectTo . '/' . Auth::guard('api')->refresh());
    }

    public function close($token)
    {
        return view('close', ["token" => $token]);
    }

    public function findOrCreateUser($userData, $provider)
    {
        $authUser = User::where('provider_id', $userData->id)->first();

        if ($authUser) {
            return $authUser;
        }

        $gender = $this->getGenderFromUserData($userData, $provider);
        $email = $this->getEmailFromUserData($userData, $provider);
        $avatar = $this->getAvatarFromUserData($userData, $provider);

        return User::create([
            'name' => $userData->name,
            'email' => $email,
            'gender' => $gender,
            'avatar' => $avatar,
            'provider' => User::$providers[$provider],
            'provider_id' => $userData->id
        ]);
    }

    public function getAcceptedProviders()
    {
        return [
            'facebook',
            'vkontakte',
            'odnoklassniki'
        ];
    }

    private function getGenderFromUserData($userData, $provider)
    {
        if ($provider == 'facebook' && isset($userData->user['gender'])) {
            $gender = $userData->user['gender'];

            if ($gender == 'male') return User::GENDER_MALE;
            if ($gender == 'female') return User::GENDER_FEMALE;
        } else if ($provider == 'vkontakte' && isset($userData->user['sex'])) {
            $gender = $userData->user['sex'];

            if ($gender == 2) return User::GENDER_MALE;
            if ($gender == 1) return User::GENDER_FEMALE;
        } else if ($provider == 'odnoklassniki' && isset($userData->user['gender'])) {
            $gender = $userData->user['gender'];

            if ($gender == 'male') return User::GENDER_MALE;
            if ($gender == 'female') return User::GENDER_FEMALE;
        }

        return User::GENDER_DEFAULT;
    }

    private function getEmailFromUserData($userData, $provider)
    {
        if ($provider == 'vkontakte') {
            return (isset($userData->accessTokenResponseBody['email'])) ? $userData->accessTokenResponseBody['email'] : null;
        } else {
            return $userData->email;
        }
    }

    private function getAvatarFromUserData($userData, $provider)
    {
        if ($provider == 'facebook') {
            return $userData->avatar_original;
        } else {
            return $userData->avatar;
        }
    }
}

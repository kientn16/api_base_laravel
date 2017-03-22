<?php
namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Interfaces\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\Exception;

class DbUserRepository extends DbRepository implements UserRepository
{
    /**
     *  @param User $model
     *
     */
    function __construct(User $model)
    {
        $this->model = $model;
    }


    function login($params = array()) {
        $email = $params['email'];
        $password = $params['password'];
        $user = User::where('email', $email)->where('password', md5($password))->first();
        if (!empty($user)) {
            $token_expired_at = Carbon::now()->addDay(14);
            $user->auth_token_expired_at = $token_expired_at;
            $user->save();
            return $user;
        } else {
            return null;
        }
    }

    function sign_up($params = array()) {
        $email = $params['email'];
        $password = $params['password'];
        $name = $params['name'];
        $token = Hash::make($email.md5($password).strtotime(time()));
        $token_expired_at = Carbon::now()->addDay(14);
        $user = User::Create(['email' => $email, 'password' => $password, 'name' => $name, 'auth_token' => $token, 'auth_token_expired_at' => $token_expired_at]);

        return $user;
    }
}

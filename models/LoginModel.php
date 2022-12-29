<?php

namespace Robi\App\models;

use App\RobiMvc\Core\Application;
use App\RobiMvc\Core\Model;
use Robi\App\models\User;

class LoginModel extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules():array
    {
        return[
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'User email',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email', 'User does not exist with this email');
            return false;
        }
        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'Psaaword are not correct');
            return false;
        }

        return Application::$app->login($user);
    }
}
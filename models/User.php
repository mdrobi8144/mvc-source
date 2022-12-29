<?php

namespace Robi\App\models;
use App\RobiMvc\Core\DbModel;
use App\RobiMvc\Core\UserModel;

class User extends UserModel
{
    public const STATUS_INACTIVE = 2;
    public string $id = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $confirm_password = '';
    public int $status = self::STATUS_INACTIVE;

    public static function tableName(): string
    {
        return 'users';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function create()
    {
        $this->id = $this->getID();
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return $this->save();
    }

    public function rules():array
    {
        return[
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>8], [self::RULE_MAX, 'max'=>24]],
            'confirm_password' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match'=>'password']],
        ];
    }
    
    public function attributes(): array
    {
        return ['id', 'first_name', 'last_name', 'email', 'password', 'status'];
    }

    public function labels(): array
    {
        return[
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'confirm_password' => 'Confirm password',
        ];
    }

    public function getID(){
		$data =  $this::all();
		if(!empty($data)){
			if($data->id != null){
				$id = $data->id + 1;
			}
		}else{
			$id = 1;
		}
		return $id;
	}

    public function getDisplayName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
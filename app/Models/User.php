<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /** 
     * USER ATTRIBUTES 
     * $this->attributes['id'] - int - contains the user primary key (id) 
     * $this->attributes['name'] - string - contains the user name 
     * $this->attributes['email'] - string - contains the user email 
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date 
     * $this->attributes['password'] - string - contains the user password 
     * $this->attributes['remember_token'] - string - contains the user password 
     * $this->attributes['role'] - string - contains the user role (client or admin) 
     * $this->attributes['balance'] - int - contains the user balance 
     * $this->attributes['created_at'] - timestamp - contains the user creation date 
     * $this->attributes['update_at'] - timestamp - contains the user update date 
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
    
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    
    public function getName()
    {
        return $this->attributes['name'];
    }
    
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    
    public function getEmail()
    {
        return $this->attributes['email'];
    }
    
    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }
    
    public function getPassword()
    {
        return $this->attributes['password'];
    }
    
    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }
    
    public function getRole()
    {
        return $this->attributes['role'];
    }
    
    public function setRole($role)
    {
        $this->attributes['role'] = $role;
    }
    
    public function getBalance()
    {
        return $this->attributes['balance'];
    }
    
    public function setBalance($balance)
    {
        $this->attributes['balance'] = $balance;
    }
    
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}

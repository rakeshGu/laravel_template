<?php
namespace Tests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait AdminLogin{

    public $user;

    public function setUpUser(){
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 2
        ]);
        
        $response = $this->post(route('admin.authenticate'), [
            "email" => $user->email,
            "password" => 'password'
        ]);
        
        $response = $this->followRedirects($response);
        $this->assertAuthenticatedAs($user);
    }
}
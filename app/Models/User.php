<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company',
        'name',
        'email',
        'password',
        'role',
        'need_notification',
        'notification_email',
        'company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function is_admin(){

        if (Auth::check()) {
  
            $user = Auth::user();
  
            if ($user->role == 'A' || $user->role == 'SA') {
    
                return true;
    
            }
  
            return false;
  
        }
  
        return false;
    }

    public function check_expired(){

        if (Auth::check()) {
  
            $user = Auth::user();
            if ($user->role == 'SA') {
                return true;
            }
            
            if ($user->role == 'A') {
                $now = time();
                $date_diff = $now - strtotime($user->created_at);
                $days = round($date_diff / (60 * 60 * 24));
                if ($days <= 30) {
                    return true;
                }
    
            }
  
            return false;
  
        }
  
        return false;
    }
}

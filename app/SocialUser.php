<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class SocialUser extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::create);
    }
    
    public static function findOrCreate($fbuser)
    {
        $fbu = self::where('provider_user_id',$fbuser->id)->get()->first();

        if (!$fbu)
        {
            $user = User::create([
                'email'=>$fbuser->email,
                'password'=>'facebook',
                'name'=>$fbuser->name,
            ]);
            $fbu = SocialUser::create([
                'user_id' => $user->id,
                'provider'=> 'facebook',
                'provider_user_id' => $fbuser->id
            ]);
        }

        return $fbu;
    }
}

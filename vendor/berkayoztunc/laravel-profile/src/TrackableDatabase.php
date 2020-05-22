<?php

namespace Berkayoztunc\LaravelProfile;
use Berkayoztunc\LaravelProfile\Model\RecordCreated;
use Berkayoztunc\LaravelProfile\Model\UserActivitys;

trait TrackableDatabase {

    public function activitys()
    {
        return $this->morphMany(UserActivitys::class,'trackable');
    }
    public function userActivitys(){

        return $this->hasMany(UserActivitys::class,'user_id','id')->where('user_id','!=','0');
    }

    public function user(){
        $user = config()->get('profile.user_class');
        return $this->hasOne($user,'id','user_id');
    }

}
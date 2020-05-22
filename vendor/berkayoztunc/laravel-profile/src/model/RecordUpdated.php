<?php
/**
 * Created by PhpStorm.
 * User: berkayoztunnc
 * Date: 16/06/2017
 * Time: 15:35
 */

namespace Berkayoztunc\LaravelProfile\Model;
use Illuminate\Http\Request;

class RecordUpdated
{
    public function __construct($model)
    {
        $request = Request::capture();
        $user = \Auth::guard(config()->get('profile.gurad'))->user();
        $name = $model->tracingName;
        if($user){
            $model->activitys()->create(['record_name' => $name,'ip'=>$request->ip(),'action'=>'deleted','user_id'=>$user->id]);
        }else{
            $model->activitys()->create(['record_name' => $name,'ip'=>$request->ip(),'action'=>'deleted','user_id'=>0]);
        }
    }
}
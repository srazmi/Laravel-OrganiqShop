<?php

namespace Berkayoztunc\LaravelProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LaravelProfileController extends Controller
{
    protected $user;

    public function __construct()
    {
        $user = config()->get('profile.user_class');
        $this->user = new $user();
    }

    private function userGetter()
    {
        return $this->user->find(Auth::guard(config()->get('profile.guard'))->user()->id);
    }

    public function profile()
    {
        $user = $this->userGetter();
        return view('profile::profile.index', compact('user'));
    }

    public function information()
    {
        $user = $this->userGetter();
        return view('profile::profile.information', compact('user'));
    }

    public function activity()
    {
        $user = $this->userGetter();
        $activitys = $user->userActivitys;
        return view('profile::profile.activity', compact('user','activitys'));
    }

    public function setProfile(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255',
            ]);
        $this->userGetter()->update([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }

    public function setAbout(Request $request)
    {
        $this->validate($request,
            [
                'about' => 'required',
            ]);
        $this->userGetter()->update([
            'about' => $request->about,
        ]);
        return redirect()->back();
    }

    public function setPassword(Request $request)
    {
        $this->validate($request,
            [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
        $this->userGetter()->update([
            'password' => Hash::make($request->password),
        ]);
    }

    public function setEmail(Request $request)
    {
        $user = $user = $this->userGetter();
        if ($user->email != $request->email) {
            $this->validate($request,
                [
                    'email' => 'required|unique:users,email|email',
                ]);
            $user->update([
                'email' => $request->email,
            ]);
        }
        return redirect()->back();
    }
    
}

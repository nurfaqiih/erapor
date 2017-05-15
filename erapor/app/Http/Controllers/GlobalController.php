<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ValidationRequest;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

/**
 * Class GlobalController
 *
 * @package App\Http\Controllers
 */
class GlobalController extends Controller {

    protected $user;
    /**
     *
     */
    public function __construct(User $user, Guard $auth)
    {
        $this->auth= $auth;
        $this->middleware('auth');
        $this->user = $user->with(['teacher', 'student']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function profiles($id)
    {
        $user = $this->user->find($id);

        return view('partials.profile.layout', compact('user'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function settings($id)
    {
        $user = $this->user->find($id);

        return view('user.profiles.setting', compact('user'));
    }

    public function settingsUpdate($id, Request $request)
    {
        $user = $this->user->find($id);
        $this->validate($request, [
            '_token'   => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        if (! Hash::check($request->get('old_password') , $user->password)) {
            flash()->error('Password anda tidak benar.');
            return redirect()->back();
        }        
        $user->update([
            'password' => bcrypt($request->get('password'))
        ]);
        flash()->success('Berhasil Mengubah Password');

        return redirect()->route('account.profiles', $id);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function validation()
    {
        $user = User::find(\Auth::user()->id);

        return view('validation', compact('user'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id, ValidationRequest $validation)
    {
        $file = \Input::file('thumbnail');
        $name = time() . '-' . \Auth::user()->username . '.' . $file->getClientOriginalExtension();
        $file->move(public_path() . '/profiles/', $name);

        $user = User::find($id)->update([
            'name'      => $validation->input('name'),
            'email'     => $validation->input('email'),
            'password'  => bcrypt($validation->input('password')),
            'thumbnail' => '/profiles/' . $name // save into users table as image path
        ]);
        $role = User::find($id)->role;
        if ($role == 4)
        {
            User::find($id)->teacher()->update([
                'name'        => $validation->input('name'),
                'birth'       => $validation->input('birth'),
                'birth_place' => $validation->input('birth_place'),
                'gender'      => $validation->input('gender'),
            ]);
        } elseif ($role == 5)
        {
            User::find($id)->student()->update($request->except([
                'email' , 'password', 'password_confirmation', 'g-recaptcha-response', 'thumbnail', '_method', '_token'
            ]));        
        }

        flash()->success('Validasi Account Anda Berhasil');

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;
use Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
           'except' => ['show', 'create', 'store', 'index', 'confirmEmail']
        ]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {

        //dd(gettype($users));
        // dd(gettype(compact('users')));
       // dd($users);
         //dd(compact('users'));
        //经过看解释以及打印调试可以总结这么几点
        /*
         * 1、laravel的隐性路由模型绑定
         *     laravel会自动解析定义在控制器方法中的Eloquent模型类型声明。由于show()方法传参时声明了类型——Eloquent模型User,
         *      对应的变量名$users会匹配路由片段中的{users},这样，Laravel会自动注入与请求URI中传入的ID对应的用户模型实例。
         * 2、打印得出：
         *    $users是一个对象，是有URI中传入ID的用户模型实例对象的,其内有这个id对应的所有值。
         *    compact('users')则是一个数组，是把变量名作为键名，变量内容作为值的也就是上面说的这个对象。
         * 3、文档中写到view的第二个参数是关联数组
         * */
        //return view('users.show', compact('user'));

        $statuses = $user->statuses()
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        return view('users.show', compact('user', 'statuses'));

    }

    public function store(Request $request)
    {

       // dd($request);
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
        ]);

        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已经发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }

    public function edit(User $user)
    {

        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);


        $this->authorize('update', $user);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        //$this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }

    public function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'aufree@yousails.com';
        $name = 'Aufree';
        $to = $user->email;
        $subject = "感谢注册lara55应用！ 请确认你的邮件。";

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }



    public function followings(User $user)
    {
        $users = $user->followings()->paginate(30);
        $title = '关注的人';
        return view('users.show_follow', compact('users', 'title'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $title = '粉丝';
        return view('users.show_follow', compact('users', 'title'));
    }

}
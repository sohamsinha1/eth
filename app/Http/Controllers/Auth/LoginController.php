<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // 

    protected $table = 'user_table';
    protected $table_login = 'login_table';
    public function index()
    {
        return view('auth.login');
    }
    public function processlogin(Request $request)
    {
        $this->validate($request, [
                    'email'   => 'required|email',
                    'password' => 'required'
                ]);        
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->intended('/profile');
                }
                else
                {
                    return view('auth.login');
                }
        
    }
    
    
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
    public function users_list()
    {
        $users = DB::table('user_table')->paginate(4);
        return view('auth.users',['users' => $users]);
    }
    public function company_list()
    {
        $company = DB::table('login_table')->paginate(4);
        return view('auth.company',['company' => $company]);
    }
    public function company_user($id)
    {
        // $com = DB::select("SELECT login_table.id AS c_id, login_table.company_name AS c_name, user_table.full_name AS f_name, user_table.id AS u_id, login_table.address AS c_address FROM ".$this->table." AS USER, ".$this->table_login." AS COM WHERE COM.user_id IN (SELECT user_table.company_id FROM user_table WHERE user_table.id = ".$id);
        // return view('auth.companyuser',['coms' => $com]);

        $com = DB::table('user_table')->select('*')->where('company_id',$id)->paginate(4);
        return view('auth.companyuser',['coms' => $com]);
        // if($com) {
            
        // }
        // else{
        //     return redirect('/company_list')->with('message','No user in this company');
        // }
        
    }
//     public function gnm_list()
//     {
//         $users = DB::table('nurse_aaya_profile')->paginate(4);
//         return view('auth.nurse',['nurses' => $users]);
//     }
//     public function pat_del($id)
//     {
//         // $users=DB::table('book_appointment')->where('user_id', '=', $id)->delete();
//         // return redirect('/pat_list');
// try{
//     $user=DB::table('book_appointment')->where('user_id', $id)->update(['is_deleted' => '1',]);
//     return redirect('/pat_list')->with('message','Success!');
// }catch(\Illuminate\Database\QueryException $ex)
// {
//     return redirect('/pat_list')->with('message','Success!');
// }
        
// }
//     public function doc_del($id)
//     {
//         // $users=DB::table('book_appointment')->where('user_id', '=', $id)->delete();
//         // return redirect('/pat_list');

//         try{
//             $user=DB::table('doctors_profile')->where('id', $id)->update(['is_deleted' => '1',]);
//         return redirect('/doc_list')->with('message','Success!');

//         }catch(\Illuminate\Database\QueryException $ex)
//         {
//             return redirect('/doc_list')->with('message','Fail!');
//         }
        
//     }
//     public function nur_del($id)
//     {
//         try{
//             $user=DB::table('nurse_aaya_profile')->where('id', $id)->update(['is_deleted' => '1',]);
//         return redirect('/gnm_list')->with('message','Success!');
//         }catch(\Illuminate\Database\QueryException $ex)
//         {
//             return redirect('/gnm_list')->with('message','Fail!');
//         }
        
//     }
//     public function doc_appr(Request $request)
//     {
//         // $users=DB::table('book_appointment')->where('user_id', '=', $id)->delete();
//         // return redirect('/pat_list');

//         try{
//                 $id=(int)$request->input('id');
//                 $full_path = $request->input('path');
//             $doc=DB::table('doctor_verification')->where('doc_id',$id)->first();
//             if(!empty($doc))
//             {
//                 return redirect('/doc_list')->with('status','Already approved!');  
//             }
//             else{
//                 $user=DB::table('doctors_profile')->where('id', $id)->update(['is_approved' => '1',]);
//                 DB::insert('insert into doctor_verification (doc_id,path) values (?,?)', [$id,$full_path]);
//                 return redirect('/doc_list')->with('status','Approved!');
//             }
            

        

//         }catch(\Illuminate\Database\QueryException $ex)
//         {
//             return redirect('/doc_list')->with('status','Fail to approve!');
//         }
        
//     }
//     public function image_view()
//     {
        
//         // $path = Storage::files('app\public\img');
//         // $path = Storage::disk('public');
//         $path = File::files(public_path('img'));
        
//         // $path = File::files('\img');

//         $doctors = DB::table('doctors_profile')->paginate(4);        
//         return view('auth.doctor',compact('path','doctors'));         
//     }

    
}

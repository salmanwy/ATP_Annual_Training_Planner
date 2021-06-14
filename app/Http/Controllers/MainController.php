<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requirement;
use App\Models\Assignment;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
	public function login(){
		return view('login');
	}

	public function logout(){
		if(session()->has('LoggedUser')){
			session()->pull('LoggedUser');
			return redirect('/login');
		}
		
	}

	public function check(Request $request){

		$request->validate([

			'email' => 'required|email',
			'password' => 'required|min:5|max:12'

		]);

		$userInfo = User::where('email','=',$request->email)->first();

		if(!$userInfo){
			return back()->with('fail','We couldn\'t recognize your email!');
		}

		else {
			if(Hash::check($request->password,$userInfo->password)){

				$request->session()->put('LoggedUser',$userInfo->id);
				if($userInfo->type == 'admin') {
					return redirect('admin/dashboard');
				}
				elseif($userInfo->type='user') {
					return redirect('user/dashboard');
				}
			}
			else {
				return back()->with('fail','Incorrect Password');
			}

		}

		return $request ->input();
	}

	public function register(){
		return view('register');
	}



	public function save(Request $request){

		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:5|max:12|confirmed'

		]);

		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;

		if($request->email == "admin@atp.com"){
			$user->type = "admin";
		}
		else{
			$user->type = "user";
		}

		$user->password = Hash::make($request->password);
		$save = $user->save();

		if($save) {
			return back()->with('success','You have been registered!');
		}
		else {
			return back()->with('fail','Something went wrong, try again Later!');
		}

	}

	public function userDashboard(){
		$data = ['LoggedUserInfo' => User::where('id','=',session('LoggedUser'))->first()];

		return view('user.dashboard',$data);
	}

	public function adminDashboard(){
		$data = ['LoggedUserInfo' => User::where('id','=',session('LoggedUser'))->first()];

		return view('admin.dashboard',$data);
	}

	public function adminAccountEdit(){
		$data = ['LoggedUserInfo' => User::where('id','=',session('LoggedUser'))->first()];

		return view('admin.account.edit',$data);
	}
	public function userAccountEdit(){
		$data = ['LoggedUserInfo' => User::where('id','=',session('LoggedUser'))->first()];

		return view('user.account.edit',$data);
	}

	//save-profile-admin-panel-first

	public function update(Request $request){

			
				  $request->validate([
				     
				      'sainik_id' => 'required',
				      'joining_date' => 'required',
				      'coy_name' =>'required',
				      'trade' => 'required',
				      'rank'  => 'required',
				      'phone' => 'required|min:11|max:11',
				      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

				      
				    ]);

				  		$imageName = time().'.'.$request->image->extension();  
     
        				$request->image->move(public_path('images'), $imageName);


				  	$tags_data = [
						    'sainik_id' => $request->sainik_id,
						    'joining_date' => $request->joining_date,
						    'coy_name' =>$request->coy_name,
				      		'trade' => $request->trade,
				      		'rank'  => $request->rank,
				      		'phone' => $request->phone,
				      		'image' => $imageName,

				    ];
            		

				    $save = User::where('id','=',session('LoggedUser'))->update($tags_data);

				    if($save) {
				      return back()->with('success','profile updated');
				    }
				    else {
				      return back()->with('fail','Something went wrong, try again Later!');
				    }

	}


	public function updateUser(Request $request){


				
				  $request->validate([

				      'name' => 'required',
				      'sainik_id' => 'required',
				      'joining_date' => 'required',
				      'coy_name' =>'required',
				      'trade' => 'required',
				      'rank'  => 'required',
				      'phone' => 'required|min:11|max:11',
				      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

				      
				    ]);

				  	if($request->image) {
				  		$imageName = time().'.'.$request->image->extension();  
     
        				$request->image->move(public_path('images'), $imageName);
        			}
        			else {

        				$imageName = "default.png";
        				
        				$request->image->move(public_path('images'), $imageName);
        			}

				  	$tags_data = [
				  			'name' => $request->name,
						    'sainik_id' => $request->sainik_id,
						    'joining_date' => $request->joining_date,
						    'coy_name' =>$request->coy_name,
				      		'trade' => $request->trade,
				      		'rank'  => $request->rank,
				      		'phone' => $request->phone,
				      		'image' => $imageName,

				    ];
            		

				    $save = User::where('id','=',session('LoggedUser'))->update($tags_data);

				    if($save) {
				      return back()->with('success','profile updated');
				    }
				    else {
				      return back()->with('fail','Something went wrong, try again Later!');
				    }

	}

	//requirement

	public function indexRequirement(){

		return view('admin.requirement');
	}



	public function saveRequirement(Request $request){
			
				  $request->validate([  
				      'c1a' => 'required', 
				      'c1b' => 'required', 
				      'c1c' => 'required',
				      'c2a' => 'required',
				      'c2b' => 'required',
				      'c2c' => 'required',
				      'c3a' => 'required',  
				      'c3b' => 'required',
				      'c3c' => 'required',
				    ]);

	

				    $requirement1 =	new Requirement;
				    $requirement1->coy = 'a';
				    $requirement1->cycle = '1';
				    $requirement1->assignment = $request->c1a;
				    $save1 = $requirement1->save();

				    if($save1) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }




				    $requirement2 =	new Requirement;
				    $requirement2->coy = 'a';
				    $requirement2->cycle = '2';
				    $requirement2->assignment = $request->c2a;
				    $save2 = $requirement2->save();
				     if($save2) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }


				
				    $requirement3 =	new Requirement;
				    $requirement3->coy = 'a';
				    $requirement3->cycle = '3';
				    $requirement3->assignment = $request->c3a;
				    $save3 = $requirement3->save();

				     if($save3) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }
 


				    $requirement4 =	new Requirement;
				    $requirement4->coy = 'b';
				    $requirement4->cycle = '1';
				    $requirement4->assignment = $request->c1b;
				    $save4= $requirement4->save();

				     if($save4) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }

					
					$requirement5 =	new Requirement;
				    $requirement5->coy = 'b';
				    $requirement5->cycle = '2';
				    $requirement5->assignment = $request->c2b;
				    $save5= $requirement5->save();

				     if($save5) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }

				
					$requirement6 =	new Requirement;
				    $requirement6->coy = 'b';
				    $requirement6->cycle = '3';
				    $requirement6->assignment = $request->c3b;
				    $save6= $requirement6->save();

				  
				    if($save6) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }
   


					$requirement7 =	new Requirement;
				    $requirement7->coy = 'c';
				    $requirement7->cycle = '1';
				    $requirement7->assignment = $request->c1c;
				    $save7= $requirement7->save();

				    if($save7) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }
   
						    
					
					$requirement8 =	new Requirement;
				    $requirement8->coy = 'c';
				    $requirement8->cycle = '2';
				    $requirement8->assignment = $request->c2c;
				    $save8= $requirement8->save();

				    if($save8) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }
   

					
					$requirement9 =	new Requirement;
				    $requirement9->coy = 'c';
				    $requirement9->cycle = '3';
				    $requirement9->assignment = $request->c3c;
				    $save9= $requirement9->save();


				    if($save9) {
				      $flag = 1;
				    }
				    else {
				      $flag = 0;
				    }

				    if($flag) {
				      return redirect('/admin/dashboard');

				    }
				    else {
				      return back()->with('fail','Something went wrong, try again Later!');
				    }

	}
	//all-users
	public function allUsers(){
		return view('admin.all-users');
	}

	//mighty-generate-function

	
	public function generate(){

		//cycle-1
		$usersA = User::where('type','=','user')->get();

		$requirement1A = Requirement::where('coy','=','a')->where('cycle','=','1')->latest()
			->first();
		$requirement2A = Requirement::where('coy','=','a')->where('cycle','=','2')->latest()
			->first();
		$requirement3A = Requirement::where('coy','=','a')->where('cycle','=','3')->latest()
			->first();

		$requirement1B = Requirement::where('coy','=','b')->where('cycle','=','1')->latest()
			->first();
		$requirement2B = Requirement::where('coy','=','b')->where('cycle','=','2')->latest()
			->first();
		$requirement3B = Requirement::where('coy','=','b')->where('cycle','=','3')->latest()
			->first();

		$requirement1C = Requirement::where('coy','=','c')->where('cycle','=','1')->latest()
			->first();
		$requirement2C = Requirement::where('coy','=','c')->where('cycle','=','2')->latest()
			->first();
		$requirement3C = Requirement::where('coy','=','c')->where('cycle','=','3')->latest()
			->first();

		foreach($usersA as $uA) {

			if($uA->coy_name ='A'){	
				$newUAssign = new Assignment;
				$newUAssign->sainik_id = $uA->sainik_id;
				$newUAssign->c1 = $requirement1A->assignment;
				$newUAssign->c2 = $requirement2A->assignment;
				$newUAssign->c3 = $requirement3A->assignment;
				$newUAssign->save();
			}
			elseif($uA->coy_name ='B'){	
				$newUAssign = new Assignment;
				$newUAssign->sainik_id = $uA->sainik_id;
				$newUAssign->c1 = $requirement1B->assignment;
				$newUAssign->c2 = $requirement2B->assignment;
				$newUAssign->c3 = $requirement3B->assignment;
				$newUAssign->save();
			}
			elseif($uA->coy_name ='C'){	
				$newUAssign = new Assignment;
				$newUAssign->sainik_id = $uA->sainik_id;
				$newUAssign->c1 = $requirement1C->assignment;
				$newUAssign->c2 = $requirement2C->assignment;
				$newUAssign->c3 = $requirement3C->assignment;
				$newUAssign->save();
			}
			else {

			}
		}
		/*			
		$users1B = User::where('type','=','user')->
					->where('coy','=','B')
					->get();
		$users1C = User::where('type','=','user')->
					->where('coy','=','C')
					->get();
		*/

		return redirect('/login');
	}



	

	  
}

<?php
	namespace App\Http\Controllers\Home;
	use App\Http\Controllers\Controller;
    use DB;
    use Illuminate\Http\Request;
    use App\Model\User;
    use Psy\Util\Json;
    use Illuminate\Http\Response;
    class HomeController extends Controller
{
	public function index(){
//		return view('welcome');
//        $all=User::all();
//        dd($all->toArray());
//        foreach ($all as $flight) {
//            echo $flight->name;
//        }
        return 313123123;
//        dd(User::paginate(2,['*'],'page',1)->toArray());
//        return Response()->json(['status'=>200,'name'=>'LaravelAcademy','passwd'=>'LaravelAcademy.org']);
	}
	public function rename(Request $request){


        $User= new User;
        $User->name = $request->id;
        $User->save();
    }
}

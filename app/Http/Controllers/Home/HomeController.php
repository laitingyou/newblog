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
        dd(User::paginate(10,['*'],'page',2)->toArray());
//        return Response()->json(['status'=>200,'name'=>'LaravelAcademy','passwd'=>'LaravelAcademy.org']);
	}
	public function rename(Request $request){


        $User= new User;
        $User->name = $request->id;
        $User->save();
    }
}

<?php
	namespace App\Http\Controllers\Home;
	use App\Http\Controllers\Controller;
    use DB;
    use Illuminate\Http\Request;
    use App\Model\User;
    use Psy\Util\Json;

    class HomeController extends Controller
{
	public function index(){
//		return view('welcome');
//        $all=User::all();
//        dd($all->toArray());
//        foreach ($all as $flight) {
//            echo $flight->name;
//        }
//        return 1231;
	}
	public function rename(Request $request){


        $User= new User;
        $User->name = $request->id;
        $User->save();
    }
}

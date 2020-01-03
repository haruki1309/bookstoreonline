<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use DB;


class RoleController extends Controller{
	
	public static function getPermission($menuid,$userid){

		$role = Admin::find($userid)->role_id;
		$query = 'SELECT * FROM menu_role where menu_role.menu_id = ? and menu_role.role_id = ?';
		$result = DB::select($query, [$menuid,$userid]);
		return $result;
	}

	public function index(Request $request){
		$all = Role::all();
		return view('admin\role\index', compact('all'));
	}

	public function getEdit(Request $request){
		$id = $request->id;
		$role = Role::find($id);
		// $all = $role->Menu;
 		$query =  'select * from menu '.
                  'LEFT JOIN menu_role ON menu.id = menu_role.menu_id '.
                  'AND menu_role.role_id =  ?';
        $all = DB::select($query,[$id]);
		return view('admin\role\edit',compact('all','role'));
	}

	public function postEdit(Request $request){
		DB::transaction(function () use ($request) {
			$all = $request->all();
			$id = $request->id;
			// dd($all);
			$query = 'Delete from menu_role where menu_role.role_id = ? ';
			DB::delete($query, [$id]);
			$query = 'INSERT INTO `menu_role` VALUES (? , ? ,? ,? , ? , ? , ?)'; 
			$can_read= 0;
			$can_create = 0;
			$can_edit = 0;
			$can_delete = 0;
			$menu = "-1";
			foreach ($request->all() as $key => $value) {
				$pair = explode('_', $key,2);
				if(is_numeric($pair[1])){
					if($menu == "-1"){
						$menu = $pair[1];
					}else
					if($menu!=$pair[1]){
						DB::insert($query, [$menu,$id , $can_read, $can_edit,$can_delete,0,$can_create]);
						$menu = $pair[1];
						$can_read= 0;
						$can_create = 0;
						$can_edit = 0;
						$can_delete = 0;
					}
					switch ($pair[0]) {
						case 'canread':
							$can_read = 1;
							break;
						case 'cancreate':
							$can_create = 1;
							break;
						case 'canedit':
							$can_edit = 1;
							break;
						case 'candelete':
							$can_delete = 1;
							break;	
					}
					
				}
			}
			DB::insert($query, [$menu,$id , $can_read, $can_edit,$can_delete,0,$can_create]);
		},5);	
	 return redirect('admin/role')->with('message', 'Chỉnh sửa thành công');

	}	
}




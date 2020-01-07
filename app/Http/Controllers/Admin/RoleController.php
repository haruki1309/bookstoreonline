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
		$query = 'SELECT * FROM menu_role where menu_role.menu_id = ? and menu_role.role_id = ? ORDER BY menu_id ';
		$result = DB::select($query, [$menuid,$userid]);
		return $result;
	}

	public function index(Request $request){
		$can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
		if($request->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
		$all = Role::all();
		return view('admin\role\index', compact('all','can_edit','can_delete'));
	}

	public function getEdit(Request $request){
		$can_edit = 1;
        $can_delete = 1;
		$id = $request->id;
		$role = Role::find($id);
		// $all = $role->Menu;
 		$query =  'select * from menu '.
                  'LEFT JOIN menu_role ON menu.id = menu_role.menu_id '.
                  'AND menu_role.role_id =  ?';
        $all = DB::select($query,[$id]);
		return view('admin\role\edit',compact('all','role','can_edit','can_delete'));
	}

	public function postEdit(Request $request){
		DB::transaction(function () use ($request) {
			$all = $request->all();
			$id = $request->id;
			$name = $request->name_;
			$query ='UPDATE `role` SET `name`= ?  WHERE id = ?';
			DB::update($query, [$name,$id]);
			$query = 'DELETE from menu_role where menu_role.role_id = ? ';
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
					if($menu == '-1'){
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
			if($menu!=-1)
			DB::insert($query, [$menu,$id , $can_read, $can_edit,$can_delete,0,$can_create]);
		},5);	
	 return redirect('admin/role')->with('message', 'Chỉnh sửa thành công');

	}	
	public function postCreate(Request $request){
		$role = new Role;
		$role->name = $request->name;
		$role->save();
     return redirect('admin/role')->with('message', 'Thêm thành công');
	
	}

	public function getDelete(Request $request, $id){
		DB::transaction(function () use ($request) {
		   $query = 'DELETE FROM `menu_role` WHERE role_id = ?';
		   DB::delete($query, [$request->id]);
		   $query = 'DELETE FROM `role` WHERE id= ? ';
		   DB::delete($query,[$request->id]);
		},5);
	 return redirect('admin/role')->with('message', 'Chỉnh sửa thành công');

	}
}




<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Menu;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;
class Permission 
{
    public function handle($request, Closure $next)
    {
    	$path = $request->path();
        if(count(explode('/', $path,2))==1){
            return $next($request);
        }
    	$menu_name = explode('/', $path,2)[1];
    	$menu = Menu::where('name','=',$menu_name)->first();
    	$perArr =["0","0","0","0","0"];
    	if($menu!=null){
    		$menu_id = $menu->id;
    		$user_id = "1";
    		$per =  RoleController::getPermission($menu_id,$user_id);
            if(empty($per)){
                $perArr = [0,0,0,0,0];
            }else
    		  $perArr = [$per[0]->can_read,$per[0]->can_edit,$per[0]->can_delete,$per[0]->can_approve,$per[0]->can_create];
    	}
    	$request->request->add(['can_read' => $perArr[0]]); 
    	$request->request->add(['can_edit' => $perArr[1]]);    	
    	$request->request->add(['can_delete' => $perArr[2]]); 
    	$request->request->add(['can_approve' => $perArr[3]]); 
    	$request->request->add(['can_create' => $perArr[4]]); 
        return $next($request);
    }
}

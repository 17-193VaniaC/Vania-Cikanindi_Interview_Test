<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Exception;
use App\Models\User;


class UserController extends Controller
{
     //
    public function getUserList(){
        try{
            $users = User::orderBy('name', 'ASC')->get();
            return response()->json($users);
        }
        catch(Exception $e){
            Log::error($e);
        }
    }

    public function getUserDetails(Request $request){
        try{
            $users = User::findOrFail($request->get('userId'));
            return response()->json($users);
        }
        catch(Exception $e){
            Log::error($e);
        }
    }

    public function updateUserData(Request $request)
    {
        try
        {
            $userId     = $request->get('userId');
            $userName   = $request->get('userName');
            $userEmail  = $request->get('userEmail');
            $userFungsional = $request->get('userFungsional');
            $userStruktural = $request->get('userStruktural');
            
            User::where('id', $userId)->update([
                'name'   =>  $userName,
                'email' =>  $userEmail,
                'fungsional' => $userFungsional,
                'struktural' => $userStruktural,
            ]);

            return response()->json([
                'name'   =>  $userName,
                'email' =>  $userEmail,
                'fungsional' => $userFungsional,
                'struktural' => $userStruktural,
            ]);
        
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }
 
    public function deleteUser(User $user)
    {
        try
        {
            $user->delete(); 
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }


}

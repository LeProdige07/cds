<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    use HasFactory;

    public function visiteurs_online(){
        $temps_session = 30;
        $temps_actuel = date('U');
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $req_ip_exist = Online::all()->where('user_ip',$user_ip);
        $ip_exist = count($req_ip_exist);

        if($ip_exist == 0){
            $online_add = new Online();
            $online_add->time = $temps_actuel;
            $online_add->user_ip = $user_ip;
            $online_add->save();
        } else {
            $online_edit = Online::where('user_ip', $user_ip)->first();
            $online_edit->time = $temps_actuel;
        }

        $session_delete_time = $temps_actuel - $temps_session;

        $online_delete = Online::where('time', '<',$session_delete_time)->delete();

        $show_users_online = Online::all();

        $users_online_nbr = count($show_users_online);

        return $users_online_nbr;
    }
}

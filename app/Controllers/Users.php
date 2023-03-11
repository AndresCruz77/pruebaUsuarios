<?php

namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\Controller;

class Users extends BaseController
{
    protected $helpers = ['url', 'form', 'text'];

    public function index()
    {        
        return view('user/home');          
    }

    //busqueda de usuarios
    public function searchUsers()
    {
        ///post data        
        $users = array();
        $ngrafica = array();
        $ugrafica = array();
        $data = $this->request->getPost();            
        /// get users api 
        $ch = curl_init();   
        curl_setopt($ch, CURLOPT_URL, getenv('url_searchUsers').$data['InputUser']); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
        $data = curl_exec($ch); 
        curl_close($ch);         
        $data = json_decode($data,true);        
        for($i=0; $i<10; $i++){
            $users['items'][$i] = $data["items"][$i];
            $ugrafica[$i] = $data["items"][$i]['login'];
            $url = $data["items"][$i]['followers_url'];
            $ngrafica[$i] = self::countFollowers($url); 
        }
        $users['numero'] = $ngrafica;
        $users['users'] = $ugrafica;                
        return json_encode($users,JSON_UNESCAPED_UNICODE);    
    }

    //consulta datos de usuario
    public function searchUserData(){
        ///post data        
        $data = $this->request->getPost();          
        ///get data user        
        $ch = curl_init();   
        curl_setopt($ch, CURLOPT_URL, getenv('url_dataUser').$data['login']); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
        $data = curl_exec($ch); 
        curl_close($ch);                         
        return $data;  
        
        
    }

    //contador de seguidores
    private function countFollowers($url){
        $ch = curl_init();   
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
        $data = curl_exec($ch); 
        curl_close($ch);                 
        return $data = count(json_decode($data,true));                  
    }

    
}

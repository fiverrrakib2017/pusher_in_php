<?php
include ('./vendor/autoload.php');

class AppPusher{
    public $app_id, $app_key, $app_secret,$app_cluster,$pusher;
    public function __construct()
    {
        $this->app_id="1761069";
        $this->app_key="a1db0e59c650abfd58b8";
        $this->app_secret="996722b6b19375dff051";
        $this->app_cluster="mt1";
        $this->pusher=new Pusher\Pusher($this->app_key,$this->app_secret,$this->app_id,['cluster' => $this->app_cluster]);
    }
    public function trigger($channel,$event,$data){
        $this->pusher->trigger($channel,$event,$data);
    }
}

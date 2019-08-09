<?php

namespace Modules\Vueasgard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;


class PublicController extends BasePublicController
{
   

    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        
        if($id==1){
            $tpl = 'vueasgard::frontend.index';
            $ttpl='vueasgard.index';
        }

        if($id==2){
            $tpl = 'vueasgard::frontend.vue-basic';
            $ttpl='vueasgard.vue-basic';
        }

        if($id==3){
            $tpl = 'vueasgard::frontend.vue-vuex';
            $ttpl='vueasgard.vue-vuex';
        }
        

        if(view()->exists($ttpl)) $tpl = $ttpl;

        return view($tpl);
       
    }

    
}

<?php

namespace Gcmaz\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MyAjaxController extends Controller
{
    public function updateDataAction(){
      $request = $this->get(request);
      
      $data1 = $request->query->get('data1');
      $data1 = $request->query->get('data1');
      
      //handle data
      
      //prepare the response, e.g.
      $response = array("code" => 100, "success" => true);
      //you can return result as JSON
      return new Response(json_encode($response)); 
    }
}

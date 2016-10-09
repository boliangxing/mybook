<?php

namespace App\Http\Controllers\Ad;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
  public function login()
  {

    return redirect('ad/index');
  }

  public function toLogin()
  {

    return view('ad.login');
  }

  public function toCategory()
    {

      return view('ad.Category');
    }


     public function toIndex()
      {

        return view('ad.index');
      }


}

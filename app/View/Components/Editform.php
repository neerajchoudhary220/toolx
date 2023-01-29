<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Editform extends Component
{
   public $action_name,$action_path;
    public function __construct($action_name=null,$action_path=null)
    {
        $this->action_name=$action_name;
        $this->action_path=$action_path;
    }

    public function render()
    {
        return view('components.editform');
    }
}

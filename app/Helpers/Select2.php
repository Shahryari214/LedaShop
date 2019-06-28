<?php

namespace App\Helpers;


namespace App\Helpers;


class Select2
{
    public $result = '<option value="" selected>هیچ کدام</option>';

    public function renderNested($nodes)
    {
        $this->traverse($nodes, 1);
        return $this->result;
    }

    public function traverse($nodes, $level = 1)
    {
        foreach ($nodes as $node) {
            $this->result .= '<option value="'.$node->id.'"';
            $this->result .=  'class="level'. $level . '">' . " $node->title" . '</option>';
            $this->traverse($node->children, $level+1);
        }
    }
}
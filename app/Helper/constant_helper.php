<?php

 function flashMessage($type,$msg)
{
    \Session::flash($type,$msg);
}

?>
<?php
function ChickEmpty($value){
    if(empty($value))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function validEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else
    {
        return false;
    }
}

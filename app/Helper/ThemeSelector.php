<?php

function getLocaleByLang()
{
    $currentUrl = url()->current();
    $current = explode('/', $currentUrl);

    if(sizeof($current) > 3)
    {
        return $current[3];
    }else{
        return 'en';
    }

}

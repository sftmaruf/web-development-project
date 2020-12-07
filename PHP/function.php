<?php
    function isEmpty($uName, $uEmail, $uPassword, $uConfirmPassword){
        $result = '';
       
        if(empty($uName) || empty($uEmail) || empty($uPassword) || empty($uConfirmPassword)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function isPasswordMatched($uPassword, $uConfirmPassword){
        $result = '';

        if($uPassword === $uConfirmPassword){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Config extends CI_Config
{
    function __construct()
    {
        parent::__construct();

        $current_language = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'English_EN';

        switch($current_language)
        {
            case 'French_FR':
                $this->set_item('language', 'french');
                break;
            case 'German_DE':
                $this->set_item('language', 'german');
                break;
            case 'Italian_IT':
                $this->set_item('language', 'italian');
                break;
            case 'Swedish_SW':
                $this->set_item('language', 'swedish');
                break;
            default:
                $this->set_item('language', 'english');
                break;
        }
    }
}
?>

<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/news/News.php");

class newsController{


    function __construct(){

        switch ($_REQUEST['action']) {
            case 'delete':
                $this->delete($_REQUEST['id']);
                break;
            case 'addNews':
                $aNews = [
                    'Header' => $_REQUEST['Header'],
                    'Announce' => $_REQUEST['Announce'],
                    'Main_Text' => $_REQUEST['Main_Text'],
                    'Tags' => $_REQUEST['Tags']
                ];
                $this->create($aNews);
                break;
            case 'find':
                if (   ($_REQUEST['id'] > 0) || (  ($_REQUEST['id'] > 0) && (strlen($_REQUEST['q']) >= 0)  )   ) {
                    $this->render($_REQUEST['id']);
                }else{
                    $this->render($_REQUEST['q']);
                }
                break;

        }

    }
    function create($ArNews){

        $object = new News();
        $object->addNews($ArNews);

    }

    function delete($id){

        $object = new News();
        $object->deleteNews($id);
    }

    function render($id){

        $object = new News();
        $resultFind = $object->extractNews($id);
        require_once($_SERVER["DOCUMENT_ROOT"]."/news/NewsTemplate.php");


    }

}
<?php

namespace HelloApp\Masters;

use DI\ContainerBuilder;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Units\DebugUnits;
use iumioFramework\Units\FileListenerUnits;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class DefaultMaster
 * @package HelloApp\Masters
 */

class DefaultMaster extends MasterCore
{

    public function __construct(PHPMailer $mailer)
    {
    }

    /**
     * Go to index page
     * @param string $hi Element to show
     */
    public function indexActivity(string $hi):Renderer
    {
        return ($this->render("index2", array("sent" => $hi)));
    }



    public function indexNextActivity(PHPMailer $mailer):Renderer
    {
        return ($this->render("e"));
    }



    /**
     * show hello
     */
    public function showIndexActivity():Renderer
    {

        $builder = new ContainerBuilder();
       // $builder->...
        $container = $builder->build();
        $s = $container->get("DefaultMaster");
exit(1);

       $f =  new DebugUnits();
       $f->execute();

       //new Response();

       return ((new Renderer())->textRenderer("<strong>text</strong>"));
          // exit();
       //$f->getLogs();

       /* $u = new FileListenerUnits();
        $u->readByLineAssert();*/
        //exit(1);
        //echo FEnv::get("app.master");
        //exit();
        //return (new Renderer())->textRenderer("dazd");
        //$this->get("service")->get("mailer");
        //$a = array ("hello" => array("world", "dezde", "dezde"), "val" =>  array("world", "dezde", "dezde"), "mak"  =>  array("world", "dezde", "dezde"), "test1" =>  array("world", "dezde", "dezde") , "TEST2" =>  array("world", "dezde", "dezde"));
        $s = array (
            array("edde" => "dd", "deded"=> "dd", "aaaa"=> "dd"),
            array("feferf"=> "dd", "dzedzde"=> "dd", "zdezd"=> "dd"),
            array("feref"=> "dd", "deefd"=> "dd", "yeah" => "AAA")
        );
        //$s = array ("hello", "world", "val" ,  "test", "mak"  , "dede", "test1" , "fdef" , "TEST2" , "dede");
        $a = array(
            array(
                "Titre" => "Mike",
                "Desc" => "YEah",
                "Data" => 1
            ),
            array(
                "Titre" => "Mike2",
                "Desc" => "WERE",
                "Data" => 2
            ),
            array(
                "Titre" => "Mike3",
                "Desc" => "WAS",
                "Data" => 3
            ),
            array(
                "Titre" => "BZF",
                "Desc" => "mangé où ?'",
                "Data" => 4
            ),
        );
        //$a = new Renderer();
        //return ($a->registerCustomRenderer('\HelloApp\Masters\DefaultMaster::helloRenderer', $s));
        //return ($this->render("index"));
        //return ((new Renderer())->textRenderer("testt"));
        return ((new Renderer())->xmlRenderer($s, "lel"));
    }

    public function helloRenderer(array $args)
    {
        echo implode(",", $args);
     //echo "LEL";
    }
}

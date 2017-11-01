<?php


namespace DocApp\Master\Utilities;
use iumioFramework\Exception\Server\Server404;
use PHPMailer;

/**
 * Class Tools
 * @package WebsiteApp\Master\Utilities
 * @author RAFINA DANY <danyrafina@gmail.com>
 */
class Tools
{

    private static $edition = array("SE" => "Standard Edition", "API" => "API Edition",
        "SU" => "Security Edition", "PE" => "Performance Edition");

    private static $edition_slogan = array("SE" => "The complete edition.", "API" => "Designed for your API",
        "SU" => "Security is a priority", "PE" => "Build the high performance web app");

    private static $edition_availabily = array("SE" => 1, "API" => 0,
        "SU" => 0, "PE" => 0);

    private static $edition_features = array(
        "SE" => array(
            "Contains full features",
            "iumio Manager is available for your development",
            "Smarty Engine Template for your views",
            "Default libs available like Bootstrap, jQuery, ...",
            "Active development"
        ),
        "API" => array("Not available"),
        "SU" => array("Not available"),
        "PE" => array("Not available"));

    /** Get full edition name
     * @param string $edition Short Edition name
     * @return string Full edition name
     * @throws Server404 If edition does not exist
     */
    static public function getEdition(string $edition):string
    {
        if (!isset(self::$edition[$edition]))
            throw new Server404(new \ArrayObject(array("explain" => "Edition does not exist" )));
        return (self::$edition[$edition]);
    }

    /** Get edition slogan
     * @param string $edition Short Edition name
     * @return string The edition slogan
     * @throws Server404 If edition does not exist
     */
    static public function getEditionSlogan(string $edition):string
    {
        if (!isset(self::$edition_slogan[$edition]))
            throw new Server404(new \ArrayObject(array("explain" => "Edition does not exist" )));
        return (self::$edition_slogan[$edition]);
    }

    /** Check if edition is available
     * @param string $edition Short Edition name
     * @return int The edition availability
     * @throws Server404 If edition does not exist
     */
    static public function getEditionAvailability(string $edition):int
    {
        if (!isset(self::$edition_availabily[$edition]))
            throw new Server404(new \ArrayObject(array("explain" => "Edition does not exist" )));
        return (self::$edition_availabily[$edition]);
    }

    /** Get edition features
     * @param string $edition Short Edition name
     * @return array The edition features
     * @throws Server404 If edition does not exist
     */
    static public function getEditionFeatures(string $edition):array
    {
        if (!isset(self::$edition_features[$edition]))
            throw new Server404(new \ArrayObject(array("explain" => "Edition does not exist" )));
        return (self::$edition_features[$edition]);
    }

    /** Get edition URL to download
     * @param string $edition Short Edition name
     * @return array The edition URL
     * @throws Server404 If edition does not exist
     */
    static public function getLastVersionAvailable(string $edition):array
    {
        if (!isset(self::$edition_features[$edition]))
            throw new Server404(new \ArrayObject(array("explain" => "Edition does not exist" )));
        $directory = scandir("./downloader");
        $v = 0.0;
        foreach ($directory as $one)
        {
            if ($one > $v) $v =  $one;
        }
        $package = array("zip" => "", "tar.gz" => "", "version" => "",
            "version_stage" => "", "version_published_date" => "");
        $files = scandir("./downloader/".$v);
        foreach ($files as $one)
        {
            if ($one == ".." || $one == ".") continue;
            if (strpos($one, ".zip") != false) $package['zip'] = "/downloader/$v/$one";
            if (strpos($one, ".tar.gz") != false) $package['tar.gz'] = "/downloader/$v/$one";
            if (strpos($one, "alpha") != false) $package['version_stage'] = "ALPHA";
            if (strpos($one, "beta") != false) $package['version_stage'] = "BETA";
            if (strpos($one, "rc") != false) $package['version_stage'] = "RELEASE CANDIDATE";
            if (strpos($one, "final") != false) $package['version_stage'] = "FINAL";
            $ex = explode('-', $one);
            $ex = explode('.', $ex[2]);
            $date = new \DateTime($ex[0]);
            $package['version_published_date'] = $date->format("Y-m-d");

        }
        $package['version'] = $v;
        return ($package);
    }


    /** Send a email from form contact
     * @param string $name User name message
     * @param string $email User email message
     * @param string $subject User subject message
     * @param string $message User message
     * @return int Great sending
     */
    public static function sendEmailContact(string $name, string $email, string $subject, string $message):int
    {
        $messageF = "Hi, a user send you a message <br> <br>";
        $messageF .= "Name : ".$name." <br> Email : ".$email. "<br> Subject : ".$subject." <br> <br>".$message;
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'auth.smtp.1and1.fr';
        $mail->SMTPAuth = true;
        $mail->Username = 'danyrafina@compared.fr';
        $mail->Password = 'eLTASOFT2025';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('danyrafina@gmail.com', 'iumio Administrator');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $messageF;
        $mail->AltBody = $messageF;
        $mail->send();

        print_r($mail->ErrorInfo);

        return (1);
    }

    final public static function testplugin(array $params)
    {
        return ("YEAH");
    }
}
<?php

namespace DocApp\Masters;

use DocApp\Master\Utilities\Tools;
use iumioFramework\Masters\MasterCore;

/**
 * Class DefaultMaster
 * @package DocApp\Master
 */

class DefaultMaster extends MasterCore
{


    /** show index view
     */
    public function indexActivity()
    {
        return ($this->render("index"));
    }

    /** show download view
     * @param string $edition Edition name
     */
    public function downloadActivity(string $edition)
    {
        return ($this->render("download", array(
            "edition" => Tools::getEdition($edition),
            "edition_explain" => array(),
            "short_edition" => $edition,
            "edition_slogan" => Tools::getEditionSlogan($edition),
            "edition_features" => Tools::getEditionFeatures($edition),
            "edition_availability" => Tools::getEditionAvailability($edition),
            "edition_url" => Tools::getLastVersionAvailable($edition))));
    }

    /** show contact view
     */
    public function contactActivity()
    {
        return ($this->render("contact"));
    }

    /** submit contact form
     */
    public function submitContactFormActivity()
    {
        $request = $this->get('request');
        $name = $request->get("name");
        $email = $request->get("email");
        $subject = $request->get("subject");
        $message = $request->get("message");
        Tools::sendEmailContact($name, $email, $subject, $message);
        return ($this->render("contact_validation"));
    }


    public function installActivity()
    {
        return ($this->render("install"));
    }

}
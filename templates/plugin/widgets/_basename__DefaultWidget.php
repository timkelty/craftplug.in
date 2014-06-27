<?php

namespace Craft;

class _basename__DefaultWidget extends BaseWidget
{

    public function getName()
    {
        return Craft::t('_basename_');
    }


    public function getSettingsHtml()
    {
        return craft()->templates->render('_lowername_/_widgets/settings', array(
           'settings' => $this->getSettings()
        ));
    }

    public function getBodyHtml()
    {
        $plugin = craft()->plugins->getPlugin('_lowername_');

        $variables = array(
            'settings' => $plugin->getSettings(),
        );

        $settings = $this->getSettings();

        $html = craft()->templates->render('_lowername_/_widgets/default', $variables);

        $charset = craft()->templates->getTwig()->getCharset();

        return new \Twig_Markup($html, $charset);
    }
    
}
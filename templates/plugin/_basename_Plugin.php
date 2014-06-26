<?php
namespace Craft;

class _basename_Plugin extends BasePlugin
{

    public function getName()
    {
        return '_basename_ for '.craft()->getSiteName();
    }

    public function getVersion()
    {
        return '_version_';
    }

    public function getDeveloper()
    {
        return '_developer_';
    }

    public function getDeveloperUrl()
    {
        return '_url_';
    }
    
}

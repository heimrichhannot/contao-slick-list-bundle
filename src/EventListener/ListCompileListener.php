<?php

namespace HeimrichHannot\SlickListBundle\EventListener;

use Contao\System;
use HeimrichHannot\ListBundle\Event\ListCompileEvent;

class ListCompileListener
{
    public function onListCompileRender(ListCompileEvent $event)
    {
        $module = $event->getModule();
        $listConfig = $event->getListConfig();

        if ($listConfig->addSlick && null !== ($objConfig = System::getContainer()->get('huh.slick.model.config')->findByPk($listConfig->slickConfig))) {
            $cssID = $module->cssID;
            $cssID[1] = $cssID[1].($cssID[1] ? ' ' : '').System::getContainer()->get('huh.slick.config')->getCssClassFromModel($objConfig);
            $module->cssID = $cssID;
        }
    }
}
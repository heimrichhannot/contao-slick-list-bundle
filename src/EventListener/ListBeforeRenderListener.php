<?php

namespace HeimrichHannot\SlickListBundle\EventListener;

use Contao\System;
use HeimrichHannot\ListBundle\Event\ListBeforeRenderEvent;

class ListBeforeRenderListener
{
    public function onListBeforeRender(ListBeforeRenderEvent $event)
    {
        $templateData = $event->getTemplateData();
        $listConfig = $event->getListConfig();

        if ($listConfig->addSlick && null !== ($objConfig = System::getContainer()->get('huh.slick.model.config')->findByPk($listConfig->slickConfig))) {
            $dataAttributes = $templateData['dataAttributes'] ?: '';
            $dataAttributes .= System::getContainer()->get('huh.slick.config')->getAttributesFromModel($objConfig);
            $templateData['dataAttributes'] = $dataAttributes;
            $templateData['itemsClass'] = 'slick-container';

            $event->setTemplateData($templateData);
        }
    }
}
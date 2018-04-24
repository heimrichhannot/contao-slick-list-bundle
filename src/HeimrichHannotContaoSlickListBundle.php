<?php

/*
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\SlickListBundle;

use HeimrichHannot\SlickListBundle\DependencyInjection\SlickListExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotContaoSlickListBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new SlickListExtension();
    }
}

<?php
/**
 * This file is part of the eZ PlatformUI package.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\PlatformUIBundle\Tests\Matcher\ContentBased;

use EzSystems\PlatformUIBundle\Http\PjaxRequestMatcher;
use EzSystems\PlatformUIBundle\Matcher\ContentBased\Pjax;
use Symfony\Component\HttpFoundation\Request;

class PjaxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \EzSystems\PlatformUIBundle\Matcher\ContentBased\Pjax
     */
    private $matcher;

    protected function setUp()
    {
        $this->matcher = new Pjax();
    }

    public function testMatch()
    {
        $viewMock = $this->getMockBuilder('eZ\Publish\Core\MVC\Symfony\View\View')->getMock();
        $requestStackMock = $this->getMockBuilder('Symfony\Component\HttpFoundation\RequestStack')->getMock();

        $this->matcher->setRequestStack($requestStackMock);
        $this->matcher->setPjaxRequestMatcher(new PjaxRequestMatcher());

        $pjaxRequest = new Request();
        $pjaxRequest->headers->set('x-pjax', 'true');

        $requestStackMock
            ->method('getMasterRequest')
            ->willReturnOnConsecutiveCalls(
                new Request(),
                $pjaxRequest
            );

        $this->assertFalse($this->matcher->match($viewMock));
        $this->assertTrue($this->matcher->match($viewMock));
    }
}

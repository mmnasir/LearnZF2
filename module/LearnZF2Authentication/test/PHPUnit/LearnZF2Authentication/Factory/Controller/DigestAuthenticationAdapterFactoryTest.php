<?php

/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace LearnZF2AuthenticationTest\Factory;

use PHPUnit_Framework_TestCase;
use LearnZF2Authentication\Factory\DigestAuthenticationAdapterFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use test\Bootstrap;

class DigestAuthenticationAdapterFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var BasicAuthenticationAdapterFactory */
    protected $digestFactory;

    /** @var ControllerManager */
    protected $digestServiceLocator;

    /** @var ServiceManager */
    protected $digestServiceManager;

    public function setUp()
    {
        /** @var ServiceLocatorInterface $digestServiceLocator */
        $this->digestServiceLocator = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');

        /** @var ServiceManager $digestServiceManager */
        $this->digestServiceManager = Bootstrap::getServiceManager();

        /** @var DigestAuthenticationAdapterFactory $digestFactory */
        $this->digestFactory = new DigestAuthenticationAdapterFactory($this->digestServiceManager->get('Config'));
    }

    public function testCreateDigestService()
    {
        $digest = $this->digestFactory->createService($this->digestServiceLocator);
        $this->assertInstanceOf('Zend\Authentication\Adapter\Http', $digest);
    }
}

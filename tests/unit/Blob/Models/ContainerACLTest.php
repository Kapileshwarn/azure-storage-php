<?php

/**
 * LICENSE: The MIT License (the "License")
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * https://github.com/azure/azure-storage-php/LICENSE
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Tests\Unit\Blob\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */
namespace MicrosoftAzure\Storage\Tests\unit\Blob\Models;

use MicrosoftAzure\Storage\Blob\Models\ContainerAcl;
use MicrosoftAzure\Storage\Tests\Framework\TestResources;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\Utilities;
use MicrosoftAzure\Storage\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class ContainerACL
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Tests\Unit\Blob\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */
class ContainerACLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::create
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getPublicAccess
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::addSignedIdentifier
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::fromXml
     */
    public function testCreateEmpty()
    {
        // Setup
        $sample = array();
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::create
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getPublicAccess
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::addSignedIdentifier
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::fromXml
     */
    public function testCreateOneEntry()
    {
        // Setup
        $sample = TestResources::getContainerAclOneEntrySample();
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(1, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::create
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getPublicAccess
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::addSignedIdentifier
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::fromXml
     */
    public function testCreateMultipleEntries()
    {
        // Setup
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(2, $acl->getSignedIdentifiers());
        
        return $acl;
    }

    /**
     * @covers MicrosoftAzure\Storage\Common\Internal\ACLBase::setPublicAccess
     * @covers MicrosoftAzure\Storage\Common\Internal\ACLBase::getPublicAccess
     */
    public function testSetPublicAccess()
    {
        // Setup
        $expected = 'container';
        $acl = new ContainerAcl();
        $acl->setPublicAccess($expected);
        
        // Test
        $acl->setPublicAccess($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getPublicAccess());
    }
}

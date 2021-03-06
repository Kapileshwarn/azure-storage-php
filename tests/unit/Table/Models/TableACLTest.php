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
 * @package   MicrosoftAzure\Storage\Tests\Unit\Table\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2017 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */
namespace MicrosoftAzure\Storage\Tests\unit\Table\Models;

use MicrosoftAzure\Storage\Table\Models\TableACL;
use MicrosoftAzure\Storage\Tests\Framework\TestResources;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\Utilities;
use MicrosoftAzure\Storage\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class TableACL
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Tests\Unit\Table\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2017 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */
class TableACLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::create
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::addSignedIdentifier
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::fromXml
     */
    public function testCreateEmpty()
    {
        // Setup
        $sample = array();
        
        // Test
        $acl = TableACL::create($sample);
        
        // Assert
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::create
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::addSignedIdentifier
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::fromXml
     */
    public function testCreateOneEntry()
    {
        // Setup
        $sample = TestResources::getTableACLOneEntrySample();
        
        // Test
        $acl = TableACL::create($sample['SignedIdentifiers']);
        
        // Assert
        $this->assertCount(1, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::create
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::getPublicAccess
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::addSignedIdentifier
     * @covers MicrosoftAzure\Storage\Table\Models\TableACL::fromXml
     */
    public function testCreateMultipleEntries()
    {
        // Setup
        $sample = TestResources::getTableACLMultipleEntriesSample();
        
        // Test
        $acl = TableACL::create($sample['SignedIdentifiers']);
        
        // Assert
        $this->assertCount(2, $acl->getSignedIdentifiers());
        
        return $acl;
    }
}

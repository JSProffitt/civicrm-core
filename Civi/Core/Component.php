<?php
/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.4                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2013                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 *
 * Generated from xml/schema/CRM/Core/Component.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */

namespace Civi\Core;

require_once 'Civi/Core/Entity.php';

use Doctrine\ORM\Mapping as ORM;
use Civi\API\Annotation as CiviAPI;
use JMS\Serializer\Annotation as JMS;

/**
 * Component
 *
 * @CiviAPI\Entity("Component")
 * @CiviAPI\Permission()
 * @ORM\Table(name="civicrm_component")
 * @ORM\Entity
 *
 */
class Component extends \Civi\Core\Entity {

  /**
   * @var integer
   *
   * @JMS\Type("integer")
   * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned":true} )
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="IDENTITY")
   */
  private $id;
    
  /**
   * @var string
   *
   * @JMS\Type("string")
   * @ORM\Column(name="name", type="string", length=64, nullable=false)
   * 
   * 
   */
  private $name;
  
  /**
   * @var string
   *
   * @JMS\Type("string")
   * @ORM\Column(name="namespace", type="string", length=128, nullable=true)
   * 
   * 
   */
  private $namespace;

  /**
   * Get id
   *
   * @return integer
   */
  public function getId() {
    return $this->id;
  }
    
  /**
   * Set name
   *
   * @param string $name
   * @return Component
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * Get name
   *
   * @return string
   */
  public function getName() {
    return $this->name;
  }
  
  /**
   * Set namespace
   *
   * @param string $namespace
   * @return Component
   */
  public function setNamespace($namespace) {
    $this->namespace = $namespace;
    return $this;
  }

  /**
   * Get namespace
   *
   * @return string
   */
  public function getNamespace() {
    return $this->namespace;
  }

  /**
   * returns all the column names of this table
   *
   * @access public
   * @return array
   */
  public static $_fields = NULL;

  static function &fields( ) {
    if ( !self::$_fields) {
      self::$_fields = array (
      
              'id' => array(
      
        'name' => 'id',
        'propertyName' => 'id',
        'type' => \CRM_Utils_Type::T_INT,
                        'required' => true,
                                                     
                                    
                          ),
      
              'name' => array(
      
        'name' => 'name',
        'propertyName' => 'name',
        'type' => \CRM_Utils_Type::T_STRING,
                'title' => ts('Component name'),
                        'required' => true,
                         'maxlength' => 64,
                                 'size' => \CRM_Utils_Type::BIG,
                           
                                    
                          ),
      
              'namespace' => array(
      
        'name' => 'namespace',
        'propertyName' => 'namespace',
        'type' => \CRM_Utils_Type::T_STRING,
                'title' => ts('Namespace reserved for component.'),
                                 'maxlength' => 128,
                                 'size' => \CRM_Utils_Type::HUGE,
                           
                                    
                          ),
             );
    }
    return self::$_fields;
  }

}

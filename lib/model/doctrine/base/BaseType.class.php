<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Type', 'doctrine');

/**
 * BaseType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $libelle
 * @property Doctrine_Collection $Groupe
 * 
 * @method integer             getId()      Returns the current record's "id" value
 * @method string              getLibelle() Returns the current record's "libelle" value
 * @method Doctrine_Collection getGroupe()  Returns the current record's "Groupe" collection
 * @method Type                setId()      Sets the current record's "id" value
 * @method Type                setLibelle() Sets the current record's "libelle" value
 * @method Type                setGroupe()  Sets the current record's "Groupe" collection
 * 
 * @package    intranet-cctb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('type');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('libelle', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '45',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Groupe', array(
             'local' => 'id',
             'foreign' => 'type_id'));
    }
}
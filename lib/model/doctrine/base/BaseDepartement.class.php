<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Departement', 'doctrine');

/**
 * BaseDepartement
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $region_id
 * @property string $nom
 * @property Region $Region
 * @property Doctrine_Collection $Ville
 * 
 * @method integer             getId()        Returns the current record's "id" value
 * @method integer             getRegionId()  Returns the current record's "region_id" value
 * @method string              getNom()       Returns the current record's "nom" value
 * @method Region              getRegion()    Returns the current record's "Region" value
 * @method Doctrine_Collection getVille()     Returns the current record's "Ville" collection
 * @method Departement         setId()        Sets the current record's "id" value
 * @method Departement         setRegionId()  Sets the current record's "region_id" value
 * @method Departement         setNom()       Sets the current record's "nom" value
 * @method Departement         setRegion()    Sets the current record's "Region" value
 * @method Departement         setVille()     Sets the current record's "Ville" collection
 * 
 * @package    intranet-cctb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseDepartement extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('departement');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('region_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('nom', 'string', 45, array(
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
        $this->hasOne('Region', array(
             'local' => 'region_id',
             'foreign' => 'id'));

        $this->hasMany('Ville', array(
             'local' => 'region_id',
             'foreign' => 'departement_id'));
    }
}
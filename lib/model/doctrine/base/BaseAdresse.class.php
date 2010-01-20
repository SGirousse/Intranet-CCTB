<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Adresse', 'doctrine');

/**
 * BaseAdresse
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $ville_id
 * @property integer $personne_id
 * @property integer $groupe_id
 * @property string $rue
 * @property string $rue_cptl
 * @property string $cp
 * @property string $ville
 * @property Ville $Ville
 * @property Personne $Personne
 * @property Groupe $Groupe
 * 
 * @method integer  getId()          Returns the current record's "id" value
 * @method integer  getVilleId()     Returns the current record's "ville_id" value
 * @method integer  getPersonneId()  Returns the current record's "personne_id" value
 * @method integer  getGroupeId()    Returns the current record's "groupe_id" value
 * @method string   getRue()         Returns the current record's "rue" value
 * @method string   getRueCptl()     Returns the current record's "rue_cptl" value
 * @method string   getCp()          Returns the current record's "cp" value
 * @method string   getVille()       Returns the current record's "ville" value
 * @method Ville    getVille()       Returns the current record's "Ville" value
 * @method Personne getPersonne()    Returns the current record's "Personne" value
 * @method Groupe   getGroupe()      Returns the current record's "Groupe" value
 * @method Adresse  setId()          Sets the current record's "id" value
 * @method Adresse  setVilleId()     Sets the current record's "ville_id" value
 * @method Adresse  setPersonneId()  Sets the current record's "personne_id" value
 * @method Adresse  setGroupeId()    Sets the current record's "groupe_id" value
 * @method Adresse  setRue()         Sets the current record's "rue" value
 * @method Adresse  setRueCptl()     Sets the current record's "rue_cptl" value
 * @method Adresse  setCp()          Sets the current record's "cp" value
 * @method Adresse  setVille()       Sets the current record's "ville" value
 * @method Adresse  setVille()       Sets the current record's "Ville" value
 * @method Adresse  setPersonne()    Sets the current record's "Personne" value
 * @method Adresse  setGroupe()      Sets the current record's "Groupe" value
 * 
 * @package    intranet-cctb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseAdresse extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('adresse');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('ville_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('personne_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('groupe_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('rue', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '45',
             ));
        $this->hasColumn('rue_cptl', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '45',
             ));
        $this->hasColumn('cp', 'string', 5, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '5',
             ));
        $this->hasColumn('ville', 'string', 45, array(
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
        $this->hasOne('Ville', array(
             'local' => 'ville_id',
             'foreign' => 'id'));

        $this->hasOne('Personne', array(
             'local' => 'personne_id',
             'foreign' => 'id'));

        $this->hasOne('Groupe', array(
             'local' => 'groupe_id',
             'foreign' => 'id'));
    }
}
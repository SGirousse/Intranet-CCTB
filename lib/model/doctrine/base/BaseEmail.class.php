<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Email', 'doctrine');

/**
 * BaseEmail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $personne_id
 * @property integer $groupe_id
 * @property string $email
 * @property Personne $Personne
 * @property Groupe $Groupe
 * 
 * @method integer  getId()          Returns the current record's "id" value
 * @method integer  getPersonneId()  Returns the current record's "personne_id" value
 * @method integer  getGroupeId()    Returns the current record's "groupe_id" value
 * @method string   getEmail()       Returns the current record's "email" value
 * @method Personne getPersonne()    Returns the current record's "Personne" value
 * @method Groupe   getGroupe()      Returns the current record's "Groupe" value
 * @method Email    setId()          Sets the current record's "id" value
 * @method Email    setPersonneId()  Sets the current record's "personne_id" value
 * @method Email    setGroupeId()    Sets the current record's "groupe_id" value
 * @method Email    setEmail()       Sets the current record's "email" value
 * @method Email    setPersonne()    Sets the current record's "Personne" value
 * @method Email    setGroupe()      Sets the current record's "Groupe" value
 * 
 * @package    intranet-cctb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseEmail extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('email');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
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
        $this->hasColumn('email', 'string', 45, array(
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
        $this->hasOne('Personne', array(
             'local' => 'personne_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Groupe', array(
             'local' => 'groupe_id',
             'foreign' => 'id'));
    }
}
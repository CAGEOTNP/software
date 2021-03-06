<?php

/**
 * BaseEQs
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property decimal $max
 * @property decimal $min
 * @property decimal $med
 * @property decimal $fQ
 * @property decimal $tQ
 * @property string $dist_name
 * @property decimal $mean
 * @property decimal $std
 * @property decimal $lsq
 * @property integer $expert_id
 * @property integer $casestudy_id
 * @property Experts $Experts
 * @property Casestudy $Casestudy
 * 
 * @method decimal   getMax()          Returns the current record's "max" value
 * @method decimal   getMin()          Returns the current record's "min" value
 * @method decimal   getMed()          Returns the current record's "med" value
 * @method decimal   getFQ()           Returns the current record's "fQ" value
 * @method decimal   getTQ()           Returns the current record's "tQ" value
 * @method string    getDistName()     Returns the current record's "dist_name" value
 * @method decimal   getMean()         Returns the current record's "mean" value
 * @method decimal   getStd()          Returns the current record's "std" value
 * @method decimal   getLsq()          Returns the current record's "lsq" value
 * @method integer   getExpertId()     Returns the current record's "expert_id" value
 * @method integer   getCasestudyId()  Returns the current record's "casestudy_id" value
 * @method Experts   getExperts()      Returns the current record's "Experts" value
 * @method Casestudy getCasestudy()    Returns the current record's "Casestudy" value
 * @method EQs       setMax()          Sets the current record's "max" value
 * @method EQs       setMin()          Sets the current record's "min" value
 * @method EQs       setMed()          Sets the current record's "med" value
 * @method EQs       setFQ()           Sets the current record's "fQ" value
 * @method EQs       setTQ()           Sets the current record's "tQ" value
 * @method EQs       setDistName()     Sets the current record's "dist_name" value
 * @method EQs       setMean()         Sets the current record's "mean" value
 * @method EQs       setStd()          Sets the current record's "std" value
 * @method EQs       setLsq()          Sets the current record's "lsq" value
 * @method EQs       setExpertId()     Sets the current record's "expert_id" value
 * @method EQs       setCasestudyId()  Sets the current record's "casestudy_id" value
 * @method EQs       setExperts()      Sets the current record's "Experts" value
 * @method EQs       setCasestudy()    Sets the current record's "Casestudy" value
 * 
 * @package    eVar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEQs extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_qs');
        $this->hasColumn('max', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('min', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('med', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('fQ', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('tQ', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('dist_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('mean', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('std', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('lsq', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('expert_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('casestudy_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Experts', array(
             'local' => 'expert_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Casestudy', array(
             'local' => 'casestudy_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
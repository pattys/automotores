<?php



/**
 * This class defines the structure of the 'Estado_Auto' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class EstadoAutoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.EstadoAutoTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Estado_Auto');
        $this->setPhpName('EstadoAuto');
        $this->setClassname('EstadoAuto');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('AUTO', 'Auto', 'INTEGER' , 'Autos', 'ID', true, null, null);
        $this->addForeignKey('CONDUCTOR', 'Conductor', 'INTEGER', 'Choferes', 'LICENCIA', false, null, null);
        $this->addColumn('DISPONIBILIDAD', 'Disponibilidad', 'CHAR', true, null, null);
        $this->addColumn('DESTINO', 'Destino', 'VARCHAR', false, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Autos', 'Autos', RelationMap::MANY_TO_ONE, array('Auto' => 'Id', ), null, null);
        $this->addRelation('Choferes', 'Choferes', RelationMap::MANY_TO_ONE, array('Conductor' => 'Licencia', ), null, null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
        );
    } // getBehaviors()

} // EstadoAutoTableMap

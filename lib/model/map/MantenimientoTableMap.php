<?php



/**
 * This class defines the structure of the 'Mantenimiento' table.
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
class MantenimientoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.MantenimientoTableMap';

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
        $this->setName('Mantenimiento');
        $this->setPhpName('Mantenimiento');
        $this->setClassname('Mantenimiento');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ID_AUTO', 'IdAuto', 'INTEGER' , 'Autos', 'ID', true, null, null);
        $this->addColumn('CODIGO_MANT', 'CodigoMant', 'INTEGER', true, null, null);
        $this->addColumn('KILOMETRAJE', 'Kilometraje', 'INTEGER', true, null, null);
        $this->addColumn('FECHA_SERVICE', 'FechaService', 'DATE', true, null, null);
        $this->addColumn('DETALLES', 'Detalles', 'VARCHAR', true, 500, null);
        $this->addColumn('PRECIO', 'Precio', 'DECIMAL', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Autos', 'Autos', RelationMap::MANY_TO_ONE, array('Id_Auto' => 'Id', ), null, null);
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

} // MantenimientoTableMap

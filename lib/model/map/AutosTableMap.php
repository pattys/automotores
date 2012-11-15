<?php



/**
 * This class defines the structure of the 'Autos' table.
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
class AutosTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.AutosTableMap';

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
        $this->setName('Autos');
        $this->setPhpName('Autos');
        $this->setClassname('Autos');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('MODELO', 'Modelo', 'VARCHAR', true, 80, null);
        $this->addColumn('COLOR', 'Color', 'VARCHAR', true, 30, null);
        $this->addColumn('ANIO_AUTO', 'AnioAuto', 'INTEGER', true, 4, null);
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('PATENTE', 'Patente', 'VARCHAR', true, 15, null);
        $this->addColumn('IMAGEN', 'Imagen', 'BLOB', false, null, null);
        $this->addColumn('CHASIS', 'Chasis', 'VARCHAR', true, 17, null);
        $this->addColumn('VENC_SEGURO', 'VencSeguro', 'DATE', true, null, null);
        $this->addForeignKey('CATEGORIA', 'Categoria', 'CHAR', 'Categoria_Autos', 'CLASE_AUTO', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CategoriaAutos', 'CategoriaAutos', RelationMap::MANY_TO_ONE, array('Categoria' => 'Clase_Auto', ), null, null);
        $this->addRelation('EstadoAuto', 'EstadoAuto', RelationMap::ONE_TO_ONE, array('Id' => 'Auto', ), null, null);
        $this->addRelation('Mantenimiento', 'Mantenimiento', RelationMap::ONE_TO_ONE, array('Id' => 'Id_Auto', ), null, null);
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

} // AutosTableMap

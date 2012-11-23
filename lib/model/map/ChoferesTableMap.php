<?php



/**
 * This class defines the structure of the 'Choferes' table.
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
class ChoferesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ChoferesTableMap';

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
        $this->setName('Choferes');
        $this->setPhpName('Choferes');
        $this->setClassname('Choferes');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 50, null);
        $this->addColumn('LICENCIA', 'Licencia', 'INTEGER', true, null, null);
        $this->addColumn('DOMICILIO', 'Domicilio', 'VARCHAR', true, 50, null);
        $this->addColumn('VENCIMIENTO_LIC', 'VencimientoLic', 'DATE', true, null, null);
        $this->addForeignKey('CLASE', 'Clase', 'CHAR', 'Categoria_Autos', 'CLASE_AUTO', true, null, null);
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CategoriaAutos', 'CategoriaAutos', RelationMap::MANY_TO_ONE, array('Clase' => 'Clase_Auto', ), null, null);
        $this->addRelation('EstadoAuto', 'EstadoAuto', RelationMap::ONE_TO_MANY, array('Licencia' => 'Conductor', ), null, null, 'EstadoAutos');
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

} // ChoferesTableMap

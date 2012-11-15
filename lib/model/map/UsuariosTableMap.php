<?php



/**
 * This class defines the structure of the 'Usuarios' table.
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
class UsuariosTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.UsuariosTableMap';

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
        $this->setName('Usuarios');
        $this->setPhpName('Usuarios');
        $this->setClassname('Usuarios');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 50, null);
        $this->addColumn('CONTRASENIA', 'Contrasenia', 'VARCHAR', true, 15, null);
        $this->addColumn('CARGO', 'Cargo', 'VARCHAR', true, 30, null);
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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

} // UsuariosTableMap

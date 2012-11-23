<?php


/**
 * Base class that represents a query for the 'Usuarios' table.
 *
 * 
 *
 * @method     UsuariosQuery orderByNombre($order = Criteria::ASC) Order by the Nombre column
 * @method     UsuariosQuery orderByContrasenia($order = Criteria::ASC) Order by the Contrasenia column
 * @method     UsuariosQuery orderByCargo($order = Criteria::ASC) Order by the Cargo column
 * @method     UsuariosQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     UsuariosQuery groupByNombre() Group by the Nombre column
 * @method     UsuariosQuery groupByContrasenia() Group by the Contrasenia column
 * @method     UsuariosQuery groupByCargo() Group by the Cargo column
 * @method     UsuariosQuery groupById() Group by the id column
 *
 * @method     UsuariosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UsuariosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UsuariosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Usuarios findOne(PropelPDO $con = null) Return the first Usuarios matching the query
 * @method     Usuarios findOneOrCreate(PropelPDO $con = null) Return the first Usuarios matching the query, or a new Usuarios object populated from the query conditions when no match is found
 *
 * @method     Usuarios findOneByNombre(string $Nombre) Return the first Usuarios filtered by the Nombre column
 * @method     Usuarios findOneByContrasenia(string $Contrasenia) Return the first Usuarios filtered by the Contrasenia column
 * @method     Usuarios findOneByCargo(string $Cargo) Return the first Usuarios filtered by the Cargo column
 * @method     Usuarios findOneById(int $id) Return the first Usuarios filtered by the id column
 *
 * @method     array findByNombre(string $Nombre) Return Usuarios objects filtered by the Nombre column
 * @method     array findByContrasenia(string $Contrasenia) Return Usuarios objects filtered by the Contrasenia column
 * @method     array findByCargo(string $Cargo) Return Usuarios objects filtered by the Cargo column
 * @method     array findById(int $id) Return Usuarios objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseUsuariosQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseUsuariosQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Usuarios', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsuariosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     UsuariosQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsuariosQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsuariosQuery) {
            return $criteria;
        }
        $query = new UsuariosQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Usuarios|Usuarios[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsuariosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsuariosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Usuarios A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `NOMBRE`, `CONTRASENIA`, `CARGO`, `ID` FROM `Usuarios` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Usuarios();
            $obj->hydrate($row);
            UsuariosPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Usuarios|Usuarios[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Usuarios[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuariosPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuariosPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE Nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE Nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the Contrasenia column
     *
     * Example usage:
     * <code>
     * $query->filterByContrasenia('fooValue');   // WHERE Contrasenia = 'fooValue'
     * $query->filterByContrasenia('%fooValue%'); // WHERE Contrasenia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contrasenia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByContrasenia($contrasenia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contrasenia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contrasenia)) {
                $contrasenia = str_replace('*', '%', $contrasenia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::CONTRASENIA, $contrasenia, $comparison);
    }

    /**
     * Filter the query on the Cargo column
     *
     * Example usage:
     * <code>
     * $query->filterByCargo('fooValue');   // WHERE Cargo = 'fooValue'
     * $query->filterByCargo('%fooValue%'); // WHERE Cargo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByCargo($cargo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargo)) {
                $cargo = str_replace('*', '%', $cargo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::CARGO, $cargo, $comparison);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(UsuariosPeer::ID, $id, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Usuarios $usuarios Object to remove from the list of results
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function prune($usuarios = null)
    {
        if ($usuarios) {
            $this->addUsingAlias(UsuariosPeer::ID, $usuarios->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseUsuariosQuery
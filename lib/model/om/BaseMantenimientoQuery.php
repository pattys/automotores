<?php


/**
 * Base class that represents a query for the 'Mantenimiento' table.
 *
 * 
 *
 * @method     MantenimientoQuery orderByIdAuto($order = Criteria::ASC) Order by the Id_Auto column
 * @method     MantenimientoQuery orderByCodigoMant($order = Criteria::ASC) Order by the Codigo_Mant column
 * @method     MantenimientoQuery orderByKilometraje($order = Criteria::ASC) Order by the Kilometraje column
 * @method     MantenimientoQuery orderByFechaService($order = Criteria::ASC) Order by the Fecha_Service column
 * @method     MantenimientoQuery orderByDetalles($order = Criteria::ASC) Order by the Detalles column
 * @method     MantenimientoQuery orderByPrecio($order = Criteria::ASC) Order by the Precio column
 *
 * @method     MantenimientoQuery groupByIdAuto() Group by the Id_Auto column
 * @method     MantenimientoQuery groupByCodigoMant() Group by the Codigo_Mant column
 * @method     MantenimientoQuery groupByKilometraje() Group by the Kilometraje column
 * @method     MantenimientoQuery groupByFechaService() Group by the Fecha_Service column
 * @method     MantenimientoQuery groupByDetalles() Group by the Detalles column
 * @method     MantenimientoQuery groupByPrecio() Group by the Precio column
 *
 * @method     MantenimientoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MantenimientoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MantenimientoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MantenimientoQuery leftJoinAutos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Autos relation
 * @method     MantenimientoQuery rightJoinAutos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Autos relation
 * @method     MantenimientoQuery innerJoinAutos($relationAlias = null) Adds a INNER JOIN clause to the query using the Autos relation
 *
 * @method     Mantenimiento findOne(PropelPDO $con = null) Return the first Mantenimiento matching the query
 * @method     Mantenimiento findOneOrCreate(PropelPDO $con = null) Return the first Mantenimiento matching the query, or a new Mantenimiento object populated from the query conditions when no match is found
 *
 * @method     Mantenimiento findOneByIdAuto(int $Id_Auto) Return the first Mantenimiento filtered by the Id_Auto column
 * @method     Mantenimiento findOneByCodigoMant(int $Codigo_Mant) Return the first Mantenimiento filtered by the Codigo_Mant column
 * @method     Mantenimiento findOneByKilometraje(int $Kilometraje) Return the first Mantenimiento filtered by the Kilometraje column
 * @method     Mantenimiento findOneByFechaService(string $Fecha_Service) Return the first Mantenimiento filtered by the Fecha_Service column
 * @method     Mantenimiento findOneByDetalles(string $Detalles) Return the first Mantenimiento filtered by the Detalles column
 * @method     Mantenimiento findOneByPrecio(string $Precio) Return the first Mantenimiento filtered by the Precio column
 *
 * @method     array findByIdAuto(int $Id_Auto) Return Mantenimiento objects filtered by the Id_Auto column
 * @method     array findByCodigoMant(int $Codigo_Mant) Return Mantenimiento objects filtered by the Codigo_Mant column
 * @method     array findByKilometraje(int $Kilometraje) Return Mantenimiento objects filtered by the Kilometraje column
 * @method     array findByFechaService(string $Fecha_Service) Return Mantenimiento objects filtered by the Fecha_Service column
 * @method     array findByDetalles(string $Detalles) Return Mantenimiento objects filtered by the Detalles column
 * @method     array findByPrecio(string $Precio) Return Mantenimiento objects filtered by the Precio column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMantenimientoQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseMantenimientoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Mantenimiento', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MantenimientoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     MantenimientoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MantenimientoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MantenimientoQuery) {
            return $criteria;
        }
        $query = new MantenimientoQuery();
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
     * @return   Mantenimiento|Mantenimiento[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MantenimientoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MantenimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Mantenimiento A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID_AUTO`, `CODIGO_MANT`, `KILOMETRAJE`, `FECHA_SERVICE`, `DETALLES`, `PRECIO` FROM `Mantenimiento` WHERE `ID_AUTO` = :p0';
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
            $obj = new Mantenimiento();
            $obj->hydrate($row);
            MantenimientoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Mantenimiento|Mantenimiento[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Mantenimiento[]|mixed the list of results, formatted by the current formatter
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
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MantenimientoPeer::ID_AUTO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MantenimientoPeer::ID_AUTO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Id_Auto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAuto(1234); // WHERE Id_Auto = 1234
     * $query->filterByIdAuto(array(12, 34)); // WHERE Id_Auto IN (12, 34)
     * $query->filterByIdAuto(array('min' => 12)); // WHERE Id_Auto > 12
     * </code>
     *
     * @see       filterByAutos()
     *
     * @param     mixed $idAuto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByIdAuto($idAuto = null, $comparison = null)
    {
        if (is_array($idAuto) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(MantenimientoPeer::ID_AUTO, $idAuto, $comparison);
    }

    /**
     * Filter the query on the Codigo_Mant column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigoMant(1234); // WHERE Codigo_Mant = 1234
     * $query->filterByCodigoMant(array(12, 34)); // WHERE Codigo_Mant IN (12, 34)
     * $query->filterByCodigoMant(array('min' => 12)); // WHERE Codigo_Mant > 12
     * </code>
     *
     * @param     mixed $codigoMant The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByCodigoMant($codigoMant = null, $comparison = null)
    {
        if (is_array($codigoMant)) {
            $useMinMax = false;
            if (isset($codigoMant['min'])) {
                $this->addUsingAlias(MantenimientoPeer::CODIGO_MANT, $codigoMant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codigoMant['max'])) {
                $this->addUsingAlias(MantenimientoPeer::CODIGO_MANT, $codigoMant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MantenimientoPeer::CODIGO_MANT, $codigoMant, $comparison);
    }

    /**
     * Filter the query on the Kilometraje column
     *
     * Example usage:
     * <code>
     * $query->filterByKilometraje(1234); // WHERE Kilometraje = 1234
     * $query->filterByKilometraje(array(12, 34)); // WHERE Kilometraje IN (12, 34)
     * $query->filterByKilometraje(array('min' => 12)); // WHERE Kilometraje > 12
     * </code>
     *
     * @param     mixed $kilometraje The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByKilometraje($kilometraje = null, $comparison = null)
    {
        if (is_array($kilometraje)) {
            $useMinMax = false;
            if (isset($kilometraje['min'])) {
                $this->addUsingAlias(MantenimientoPeer::KILOMETRAJE, $kilometraje['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kilometraje['max'])) {
                $this->addUsingAlias(MantenimientoPeer::KILOMETRAJE, $kilometraje['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MantenimientoPeer::KILOMETRAJE, $kilometraje, $comparison);
    }

    /**
     * Filter the query on the Fecha_Service column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaService('2011-03-14'); // WHERE Fecha_Service = '2011-03-14'
     * $query->filterByFechaService('now'); // WHERE Fecha_Service = '2011-03-14'
     * $query->filterByFechaService(array('max' => 'yesterday')); // WHERE Fecha_Service > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaService The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByFechaService($fechaService = null, $comparison = null)
    {
        if (is_array($fechaService)) {
            $useMinMax = false;
            if (isset($fechaService['min'])) {
                $this->addUsingAlias(MantenimientoPeer::FECHA_SERVICE, $fechaService['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaService['max'])) {
                $this->addUsingAlias(MantenimientoPeer::FECHA_SERVICE, $fechaService['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MantenimientoPeer::FECHA_SERVICE, $fechaService, $comparison);
    }

    /**
     * Filter the query on the Detalles column
     *
     * Example usage:
     * <code>
     * $query->filterByDetalles('fooValue');   // WHERE Detalles = 'fooValue'
     * $query->filterByDetalles('%fooValue%'); // WHERE Detalles LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detalles The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByDetalles($detalles = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detalles)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $detalles)) {
                $detalles = str_replace('*', '%', $detalles);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MantenimientoPeer::DETALLES, $detalles, $comparison);
    }

    /**
     * Filter the query on the Precio column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecio(1234); // WHERE Precio = 1234
     * $query->filterByPrecio(array(12, 34)); // WHERE Precio IN (12, 34)
     * $query->filterByPrecio(array('min' => 12)); // WHERE Precio > 12
     * </code>
     *
     * @param     mixed $precio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function filterByPrecio($precio = null, $comparison = null)
    {
        if (is_array($precio)) {
            $useMinMax = false;
            if (isset($precio['min'])) {
                $this->addUsingAlias(MantenimientoPeer::PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precio['max'])) {
                $this->addUsingAlias(MantenimientoPeer::PRECIO, $precio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MantenimientoPeer::PRECIO, $precio, $comparison);
    }

    /**
     * Filter the query by a related Autos object
     *
     * @param   Autos|PropelObjectCollection $autos The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   MantenimientoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAutos($autos, $comparison = null)
    {
        if ($autos instanceof Autos) {
            return $this
                ->addUsingAlias(MantenimientoPeer::ID_AUTO, $autos->getId(), $comparison);
        } elseif ($autos instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MantenimientoPeer::ID_AUTO, $autos->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAutos() only accepts arguments of type Autos or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Autos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function joinAutos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Autos');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Autos');
        }

        return $this;
    }

    /**
     * Use the Autos relation Autos object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AutosQuery A secondary query class using the current class as primary query
     */
    public function useAutosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAutos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Autos', 'AutosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Mantenimiento $mantenimiento Object to remove from the list of results
     *
     * @return MantenimientoQuery The current query, for fluid interface
     */
    public function prune($mantenimiento = null)
    {
        if ($mantenimiento) {
            $this->addUsingAlias(MantenimientoPeer::ID_AUTO, $mantenimiento->getIdAuto(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseMantenimientoQuery
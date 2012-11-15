<?php


/**
 * Base class that represents a query for the 'Estado_Auto' table.
 *
 * 
 *
 * @method     EstadoAutoQuery orderByAuto($order = Criteria::ASC) Order by the Auto column
 * @method     EstadoAutoQuery orderByConductor($order = Criteria::ASC) Order by the Conductor column
 * @method     EstadoAutoQuery orderByDisponibilidad($order = Criteria::ASC) Order by the Disponibilidad column
 * @method     EstadoAutoQuery orderByDestino($order = Criteria::ASC) Order by the Destino column
 *
 * @method     EstadoAutoQuery groupByAuto() Group by the Auto column
 * @method     EstadoAutoQuery groupByConductor() Group by the Conductor column
 * @method     EstadoAutoQuery groupByDisponibilidad() Group by the Disponibilidad column
 * @method     EstadoAutoQuery groupByDestino() Group by the Destino column
 *
 * @method     EstadoAutoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EstadoAutoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EstadoAutoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EstadoAutoQuery leftJoinAutos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Autos relation
 * @method     EstadoAutoQuery rightJoinAutos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Autos relation
 * @method     EstadoAutoQuery innerJoinAutos($relationAlias = null) Adds a INNER JOIN clause to the query using the Autos relation
 *
 * @method     EstadoAutoQuery leftJoinChoferes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Choferes relation
 * @method     EstadoAutoQuery rightJoinChoferes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Choferes relation
 * @method     EstadoAutoQuery innerJoinChoferes($relationAlias = null) Adds a INNER JOIN clause to the query using the Choferes relation
 *
 * @method     EstadoAuto findOne(PropelPDO $con = null) Return the first EstadoAuto matching the query
 * @method     EstadoAuto findOneOrCreate(PropelPDO $con = null) Return the first EstadoAuto matching the query, or a new EstadoAuto object populated from the query conditions when no match is found
 *
 * @method     EstadoAuto findOneByAuto(int $Auto) Return the first EstadoAuto filtered by the Auto column
 * @method     EstadoAuto findOneByConductor(int $Conductor) Return the first EstadoAuto filtered by the Conductor column
 * @method     EstadoAuto findOneByDisponibilidad(string $Disponibilidad) Return the first EstadoAuto filtered by the Disponibilidad column
 * @method     EstadoAuto findOneByDestino(string $Destino) Return the first EstadoAuto filtered by the Destino column
 *
 * @method     array findByAuto(int $Auto) Return EstadoAuto objects filtered by the Auto column
 * @method     array findByConductor(int $Conductor) Return EstadoAuto objects filtered by the Conductor column
 * @method     array findByDisponibilidad(string $Disponibilidad) Return EstadoAuto objects filtered by the Disponibilidad column
 * @method     array findByDestino(string $Destino) Return EstadoAuto objects filtered by the Destino column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEstadoAutoQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseEstadoAutoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'EstadoAuto', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EstadoAutoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EstadoAutoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EstadoAutoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EstadoAutoQuery) {
            return $criteria;
        }
        $query = new EstadoAutoQuery();
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
     * @return   EstadoAuto|EstadoAuto[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EstadoAutoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EstadoAutoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EstadoAuto A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `AUTO`, `CONDUCTOR`, `DISPONIBILIDAD`, `DESTINO` FROM `Estado_Auto` WHERE `AUTO` = :p0';
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
            $obj = new EstadoAuto();
            $obj->hydrate($row);
            EstadoAutoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EstadoAuto|EstadoAuto[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EstadoAuto[]|mixed the list of results, formatted by the current formatter
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
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EstadoAutoPeer::AUTO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EstadoAutoPeer::AUTO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Auto column
     *
     * Example usage:
     * <code>
     * $query->filterByAuto(1234); // WHERE Auto = 1234
     * $query->filterByAuto(array(12, 34)); // WHERE Auto IN (12, 34)
     * $query->filterByAuto(array('min' => 12)); // WHERE Auto > 12
     * </code>
     *
     * @see       filterByAutos()
     *
     * @param     mixed $auto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function filterByAuto($auto = null, $comparison = null)
    {
        if (is_array($auto) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EstadoAutoPeer::AUTO, $auto, $comparison);
    }

    /**
     * Filter the query on the Conductor column
     *
     * Example usage:
     * <code>
     * $query->filterByConductor(1234); // WHERE Conductor = 1234
     * $query->filterByConductor(array(12, 34)); // WHERE Conductor IN (12, 34)
     * $query->filterByConductor(array('min' => 12)); // WHERE Conductor > 12
     * </code>
     *
     * @see       filterByChoferes()
     *
     * @param     mixed $conductor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function filterByConductor($conductor = null, $comparison = null)
    {
        if (is_array($conductor)) {
            $useMinMax = false;
            if (isset($conductor['min'])) {
                $this->addUsingAlias(EstadoAutoPeer::CONDUCTOR, $conductor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($conductor['max'])) {
                $this->addUsingAlias(EstadoAutoPeer::CONDUCTOR, $conductor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoAutoPeer::CONDUCTOR, $conductor, $comparison);
    }

    /**
     * Filter the query on the Disponibilidad column
     *
     * Example usage:
     * <code>
     * $query->filterByDisponibilidad('fooValue');   // WHERE Disponibilidad = 'fooValue'
     * $query->filterByDisponibilidad('%fooValue%'); // WHERE Disponibilidad LIKE '%fooValue%'
     * </code>
     *
     * @param     string $disponibilidad The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function filterByDisponibilidad($disponibilidad = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($disponibilidad)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $disponibilidad)) {
                $disponibilidad = str_replace('*', '%', $disponibilidad);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EstadoAutoPeer::DISPONIBILIDAD, $disponibilidad, $comparison);
    }

    /**
     * Filter the query on the Destino column
     *
     * Example usage:
     * <code>
     * $query->filterByDestino('fooValue');   // WHERE Destino = 'fooValue'
     * $query->filterByDestino('%fooValue%'); // WHERE Destino LIKE '%fooValue%'
     * </code>
     *
     * @param     string $destino The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function filterByDestino($destino = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($destino)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $destino)) {
                $destino = str_replace('*', '%', $destino);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EstadoAutoPeer::DESTINO, $destino, $comparison);
    }

    /**
     * Filter the query by a related Autos object
     *
     * @param   Autos|PropelObjectCollection $autos The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EstadoAutoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAutos($autos, $comparison = null)
    {
        if ($autos instanceof Autos) {
            return $this
                ->addUsingAlias(EstadoAutoPeer::AUTO, $autos->getId(), $comparison);
        } elseif ($autos instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EstadoAutoPeer::AUTO, $autos->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EstadoAutoQuery The current query, for fluid interface
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
     * Filter the query by a related Choferes object
     *
     * @param   Choferes|PropelObjectCollection $choferes The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EstadoAutoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByChoferes($choferes, $comparison = null)
    {
        if ($choferes instanceof Choferes) {
            return $this
                ->addUsingAlias(EstadoAutoPeer::CONDUCTOR, $choferes->getLicencia(), $comparison);
        } elseif ($choferes instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EstadoAutoPeer::CONDUCTOR, $choferes->toKeyValue('PrimaryKey', 'Licencia'), $comparison);
        } else {
            throw new PropelException('filterByChoferes() only accepts arguments of type Choferes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Choferes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function joinChoferes($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Choferes');

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
            $this->addJoinObject($join, 'Choferes');
        }

        return $this;
    }

    /**
     * Use the Choferes relation Choferes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ChoferesQuery A secondary query class using the current class as primary query
     */
    public function useChoferesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinChoferes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Choferes', 'ChoferesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   EstadoAuto $estadoAuto Object to remove from the list of results
     *
     * @return EstadoAutoQuery The current query, for fluid interface
     */
    public function prune($estadoAuto = null)
    {
        if ($estadoAuto) {
            $this->addUsingAlias(EstadoAutoPeer::AUTO, $estadoAuto->getAuto(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseEstadoAutoQuery
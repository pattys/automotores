<?php


/**
 * Base class that represents a query for the 'Categoria_Autos' table.
 *
 * 
 *
 * @method     CategoriaAutosQuery orderById($order = Criteria::ASC) Order by the Id column
 * @method     CategoriaAutosQuery orderByTipoAuto($order = Criteria::ASC) Order by the Tipo_Auto column
 * @method     CategoriaAutosQuery orderByClaseAuto($order = Criteria::ASC) Order by the Clase_Auto column
 *
 * @method     CategoriaAutosQuery groupById() Group by the Id column
 * @method     CategoriaAutosQuery groupByTipoAuto() Group by the Tipo_Auto column
 * @method     CategoriaAutosQuery groupByClaseAuto() Group by the Clase_Auto column
 *
 * @method     CategoriaAutosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CategoriaAutosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CategoriaAutosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CategoriaAutosQuery leftJoinAutos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Autos relation
 * @method     CategoriaAutosQuery rightJoinAutos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Autos relation
 * @method     CategoriaAutosQuery innerJoinAutos($relationAlias = null) Adds a INNER JOIN clause to the query using the Autos relation
 *
 * @method     CategoriaAutosQuery leftJoinChoferes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Choferes relation
 * @method     CategoriaAutosQuery rightJoinChoferes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Choferes relation
 * @method     CategoriaAutosQuery innerJoinChoferes($relationAlias = null) Adds a INNER JOIN clause to the query using the Choferes relation
 *
 * @method     CategoriaAutos findOne(PropelPDO $con = null) Return the first CategoriaAutos matching the query
 * @method     CategoriaAutos findOneOrCreate(PropelPDO $con = null) Return the first CategoriaAutos matching the query, or a new CategoriaAutos object populated from the query conditions when no match is found
 *
 * @method     CategoriaAutos findOneById(int $Id) Return the first CategoriaAutos filtered by the Id column
 * @method     CategoriaAutos findOneByTipoAuto(string $Tipo_Auto) Return the first CategoriaAutos filtered by the Tipo_Auto column
 * @method     CategoriaAutos findOneByClaseAuto(string $Clase_Auto) Return the first CategoriaAutos filtered by the Clase_Auto column
 *
 * @method     array findById(int $Id) Return CategoriaAutos objects filtered by the Id column
 * @method     array findByTipoAuto(string $Tipo_Auto) Return CategoriaAutos objects filtered by the Tipo_Auto column
 * @method     array findByClaseAuto(string $Clase_Auto) Return CategoriaAutos objects filtered by the Clase_Auto column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCategoriaAutosQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseCategoriaAutosQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'CategoriaAutos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CategoriaAutosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CategoriaAutosQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CategoriaAutosQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CategoriaAutosQuery) {
            return $criteria;
        }
        $query = new CategoriaAutosQuery();
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
     * @return   CategoriaAutos|CategoriaAutos[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoriaAutosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CategoriaAutosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   CategoriaAutos A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `TIPO_AUTO`, `CLASE_AUTO` FROM `Categoria_Autos` WHERE `ID` = :p0';
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
            $obj = new CategoriaAutos();
            $obj->hydrate($row);
            CategoriaAutosPeer::addInstanceToPool($obj, (string) $key);
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
     * @return CategoriaAutos|CategoriaAutos[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CategoriaAutos[]|mixed the list of results, formatted by the current formatter
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
     * @return CategoriaAutosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoriaAutosPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CategoriaAutosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoriaAutosPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE Id = 1234
     * $query->filterById(array(12, 34)); // WHERE Id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE Id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoriaAutosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CategoriaAutosPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the Tipo_Auto column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoAuto('fooValue');   // WHERE Tipo_Auto = 'fooValue'
     * $query->filterByTipoAuto('%fooValue%'); // WHERE Tipo_Auto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipoAuto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoriaAutosQuery The current query, for fluid interface
     */
    public function filterByTipoAuto($tipoAuto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipoAuto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipoAuto)) {
                $tipoAuto = str_replace('*', '%', $tipoAuto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoriaAutosPeer::TIPO_AUTO, $tipoAuto, $comparison);
    }

    /**
     * Filter the query on the Clase_Auto column
     *
     * Example usage:
     * <code>
     * $query->filterByClaseAuto('fooValue');   // WHERE Clase_Auto = 'fooValue'
     * $query->filterByClaseAuto('%fooValue%'); // WHERE Clase_Auto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $claseAuto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoriaAutosQuery The current query, for fluid interface
     */
    public function filterByClaseAuto($claseAuto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($claseAuto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $claseAuto)) {
                $claseAuto = str_replace('*', '%', $claseAuto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoriaAutosPeer::CLASE_AUTO, $claseAuto, $comparison);
    }

    /**
     * Filter the query by a related Autos object
     *
     * @param   Autos|PropelObjectCollection $autos  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CategoriaAutosQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAutos($autos, $comparison = null)
    {
        if ($autos instanceof Autos) {
            return $this
                ->addUsingAlias(CategoriaAutosPeer::CLASE_AUTO, $autos->getCategoria(), $comparison);
        } elseif ($autos instanceof PropelObjectCollection) {
            return $this
                ->useAutosQuery()
                ->filterByPrimaryKeys($autos->getPrimaryKeys())
                ->endUse();
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
     * @return CategoriaAutosQuery The current query, for fluid interface
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
     * @param   Choferes|PropelObjectCollection $choferes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CategoriaAutosQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByChoferes($choferes, $comparison = null)
    {
        if ($choferes instanceof Choferes) {
            return $this
                ->addUsingAlias(CategoriaAutosPeer::CLASE_AUTO, $choferes->getClase(), $comparison);
        } elseif ($choferes instanceof PropelObjectCollection) {
            return $this
                ->useChoferesQuery()
                ->filterByPrimaryKeys($choferes->getPrimaryKeys())
                ->endUse();
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
     * @return CategoriaAutosQuery The current query, for fluid interface
     */
    public function joinChoferes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useChoferesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChoferes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Choferes', 'ChoferesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CategoriaAutos $categoriaAutos Object to remove from the list of results
     *
     * @return CategoriaAutosQuery The current query, for fluid interface
     */
    public function prune($categoriaAutos = null)
    {
        if ($categoriaAutos) {
            $this->addUsingAlias(CategoriaAutosPeer::ID, $categoriaAutos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseCategoriaAutosQuery
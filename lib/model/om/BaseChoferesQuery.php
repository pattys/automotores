<?php


/**
 * Base class that represents a query for the 'Choferes' table.
 *
 * 
 *
 * @method     ChoferesQuery orderByNombre($order = Criteria::ASC) Order by the Nombre column
 * @method     ChoferesQuery orderByLicencia($order = Criteria::ASC) Order by the Licencia column
 * @method     ChoferesQuery orderByDomicilio($order = Criteria::ASC) Order by the Domicilio column
 * @method     ChoferesQuery orderByVencimientoLic($order = Criteria::ASC) Order by the Vencimiento_Lic column
 * @method     ChoferesQuery orderByClase($order = Criteria::ASC) Order by the Clase column
 *
 * @method     ChoferesQuery groupByNombre() Group by the Nombre column
 * @method     ChoferesQuery groupByLicencia() Group by the Licencia column
 * @method     ChoferesQuery groupByDomicilio() Group by the Domicilio column
 * @method     ChoferesQuery groupByVencimientoLic() Group by the Vencimiento_Lic column
 * @method     ChoferesQuery groupByClase() Group by the Clase column
 *
 * @method     ChoferesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChoferesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChoferesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChoferesQuery leftJoinCategoriaAutos($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoriaAutos relation
 * @method     ChoferesQuery rightJoinCategoriaAutos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoriaAutos relation
 * @method     ChoferesQuery innerJoinCategoriaAutos($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoriaAutos relation
 *
 * @method     ChoferesQuery leftJoinEstadoAuto($relationAlias = null) Adds a LEFT JOIN clause to the query using the EstadoAuto relation
 * @method     ChoferesQuery rightJoinEstadoAuto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EstadoAuto relation
 * @method     ChoferesQuery innerJoinEstadoAuto($relationAlias = null) Adds a INNER JOIN clause to the query using the EstadoAuto relation
 *
 * @method     Choferes findOne(PropelPDO $con = null) Return the first Choferes matching the query
 * @method     Choferes findOneOrCreate(PropelPDO $con = null) Return the first Choferes matching the query, or a new Choferes object populated from the query conditions when no match is found
 *
 * @method     Choferes findOneByNombre(string $Nombre) Return the first Choferes filtered by the Nombre column
 * @method     Choferes findOneByLicencia(int $Licencia) Return the first Choferes filtered by the Licencia column
 * @method     Choferes findOneByDomicilio(string $Domicilio) Return the first Choferes filtered by the Domicilio column
 * @method     Choferes findOneByVencimientoLic(string $Vencimiento_Lic) Return the first Choferes filtered by the Vencimiento_Lic column
 * @method     Choferes findOneByClase(string $Clase) Return the first Choferes filtered by the Clase column
 *
 * @method     array findByNombre(string $Nombre) Return Choferes objects filtered by the Nombre column
 * @method     array findByLicencia(int $Licencia) Return Choferes objects filtered by the Licencia column
 * @method     array findByDomicilio(string $Domicilio) Return Choferes objects filtered by the Domicilio column
 * @method     array findByVencimientoLic(string $Vencimiento_Lic) Return Choferes objects filtered by the Vencimiento_Lic column
 * @method     array findByClase(string $Clase) Return Choferes objects filtered by the Clase column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseChoferesQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseChoferesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Choferes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChoferesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ChoferesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChoferesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ChoferesQuery) {
            return $criteria;
        }
        $query = new ChoferesQuery();
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
     * @return   Choferes|Choferes[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChoferesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ChoferesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Choferes A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `NOMBRE`, `LICENCIA`, `DOMICILIO`, `VENCIMIENTO_LIC`, `CLASE` FROM `Choferes` WHERE `LICENCIA` = :p0';
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
            $obj = new Choferes();
            $obj->hydrate($row);
            ChoferesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Choferes|Choferes[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Choferes[]|mixed the list of results, formatted by the current formatter
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
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChoferesPeer::LICENCIA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChoferesPeer::LICENCIA, $keys, Criteria::IN);
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
     * @return ChoferesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ChoferesPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the Licencia column
     *
     * Example usage:
     * <code>
     * $query->filterByLicencia(1234); // WHERE Licencia = 1234
     * $query->filterByLicencia(array(12, 34)); // WHERE Licencia IN (12, 34)
     * $query->filterByLicencia(array('min' => 12)); // WHERE Licencia > 12
     * </code>
     *
     * @param     mixed $licencia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function filterByLicencia($licencia = null, $comparison = null)
    {
        if (is_array($licencia) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ChoferesPeer::LICENCIA, $licencia, $comparison);
    }

    /**
     * Filter the query on the Domicilio column
     *
     * Example usage:
     * <code>
     * $query->filterByDomicilio('fooValue');   // WHERE Domicilio = 'fooValue'
     * $query->filterByDomicilio('%fooValue%'); // WHERE Domicilio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $domicilio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function filterByDomicilio($domicilio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($domicilio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $domicilio)) {
                $domicilio = str_replace('*', '%', $domicilio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChoferesPeer::DOMICILIO, $domicilio, $comparison);
    }

    /**
     * Filter the query on the Vencimiento_Lic column
     *
     * Example usage:
     * <code>
     * $query->filterByVencimientoLic('2011-03-14'); // WHERE Vencimiento_Lic = '2011-03-14'
     * $query->filterByVencimientoLic('now'); // WHERE Vencimiento_Lic = '2011-03-14'
     * $query->filterByVencimientoLic(array('max' => 'yesterday')); // WHERE Vencimiento_Lic > '2011-03-13'
     * </code>
     *
     * @param     mixed $vencimientoLic The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function filterByVencimientoLic($vencimientoLic = null, $comparison = null)
    {
        if (is_array($vencimientoLic)) {
            $useMinMax = false;
            if (isset($vencimientoLic['min'])) {
                $this->addUsingAlias(ChoferesPeer::VENCIMIENTO_LIC, $vencimientoLic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vencimientoLic['max'])) {
                $this->addUsingAlias(ChoferesPeer::VENCIMIENTO_LIC, $vencimientoLic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChoferesPeer::VENCIMIENTO_LIC, $vencimientoLic, $comparison);
    }

    /**
     * Filter the query on the Clase column
     *
     * Example usage:
     * <code>
     * $query->filterByClase('fooValue');   // WHERE Clase = 'fooValue'
     * $query->filterByClase('%fooValue%'); // WHERE Clase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clase The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function filterByClase($clase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clase)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clase)) {
                $clase = str_replace('*', '%', $clase);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChoferesPeer::CLASE, $clase, $comparison);
    }

    /**
     * Filter the query by a related CategoriaAutos object
     *
     * @param   CategoriaAutos|PropelObjectCollection $categoriaAutos The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ChoferesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCategoriaAutos($categoriaAutos, $comparison = null)
    {
        if ($categoriaAutos instanceof CategoriaAutos) {
            return $this
                ->addUsingAlias(ChoferesPeer::CLASE, $categoriaAutos->getClaseAuto(), $comparison);
        } elseif ($categoriaAutos instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChoferesPeer::CLASE, $categoriaAutos->toKeyValue('PrimaryKey', 'ClaseAuto'), $comparison);
        } else {
            throw new PropelException('filterByCategoriaAutos() only accepts arguments of type CategoriaAutos or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoriaAutos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function joinCategoriaAutos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoriaAutos');

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
            $this->addJoinObject($join, 'CategoriaAutos');
        }

        return $this;
    }

    /**
     * Use the CategoriaAutos relation CategoriaAutos object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CategoriaAutosQuery A secondary query class using the current class as primary query
     */
    public function useCategoriaAutosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoriaAutos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoriaAutos', 'CategoriaAutosQuery');
    }

    /**
     * Filter the query by a related EstadoAuto object
     *
     * @param   EstadoAuto|PropelObjectCollection $estadoAuto  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ChoferesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEstadoAuto($estadoAuto, $comparison = null)
    {
        if ($estadoAuto instanceof EstadoAuto) {
            return $this
                ->addUsingAlias(ChoferesPeer::LICENCIA, $estadoAuto->getConductor(), $comparison);
        } elseif ($estadoAuto instanceof PropelObjectCollection) {
            return $this
                ->useEstadoAutoQuery()
                ->filterByPrimaryKeys($estadoAuto->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEstadoAuto() only accepts arguments of type EstadoAuto or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EstadoAuto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function joinEstadoAuto($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EstadoAuto');

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
            $this->addJoinObject($join, 'EstadoAuto');
        }

        return $this;
    }

    /**
     * Use the EstadoAuto relation EstadoAuto object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EstadoAutoQuery A secondary query class using the current class as primary query
     */
    public function useEstadoAutoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEstadoAuto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EstadoAuto', 'EstadoAutoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Choferes $choferes Object to remove from the list of results
     *
     * @return ChoferesQuery The current query, for fluid interface
     */
    public function prune($choferes = null)
    {
        if ($choferes) {
            $this->addUsingAlias(ChoferesPeer::LICENCIA, $choferes->getLicencia(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseChoferesQuery
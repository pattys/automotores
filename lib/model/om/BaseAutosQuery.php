<?php


/**
 * Base class that represents a query for the 'Autos' table.
 *
 * 
 *
 * @method     AutosQuery orderByModelo($order = Criteria::ASC) Order by the Modelo column
 * @method     AutosQuery orderByColor($order = Criteria::ASC) Order by the color column
 * @method     AutosQuery orderByAnioAuto($order = Criteria::ASC) Order by the anio_auto column
 * @method     AutosQuery orderById($order = Criteria::ASC) Order by the Id column
 * @method     AutosQuery orderByPatente($order = Criteria::ASC) Order by the Patente column
 * @method     AutosQuery orderByImagen($order = Criteria::ASC) Order by the Imagen column
 * @method     AutosQuery orderByChasis($order = Criteria::ASC) Order by the chasis column
 * @method     AutosQuery orderByVencSeguro($order = Criteria::ASC) Order by the Venc_Seguro column
 * @method     AutosQuery orderByCategoria($order = Criteria::ASC) Order by the Categoria column
 *
 * @method     AutosQuery groupByModelo() Group by the Modelo column
 * @method     AutosQuery groupByColor() Group by the color column
 * @method     AutosQuery groupByAnioAuto() Group by the anio_auto column
 * @method     AutosQuery groupById() Group by the Id column
 * @method     AutosQuery groupByPatente() Group by the Patente column
 * @method     AutosQuery groupByImagen() Group by the Imagen column
 * @method     AutosQuery groupByChasis() Group by the chasis column
 * @method     AutosQuery groupByVencSeguro() Group by the Venc_Seguro column
 * @method     AutosQuery groupByCategoria() Group by the Categoria column
 *
 * @method     AutosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AutosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AutosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AutosQuery leftJoinCategoriaAutos($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoriaAutos relation
 * @method     AutosQuery rightJoinCategoriaAutos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoriaAutos relation
 * @method     AutosQuery innerJoinCategoriaAutos($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoriaAutos relation
 *
 * @method     AutosQuery leftJoinEstadoAuto($relationAlias = null) Adds a LEFT JOIN clause to the query using the EstadoAuto relation
 * @method     AutosQuery rightJoinEstadoAuto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EstadoAuto relation
 * @method     AutosQuery innerJoinEstadoAuto($relationAlias = null) Adds a INNER JOIN clause to the query using the EstadoAuto relation
 *
 * @method     AutosQuery leftJoinMantenimiento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mantenimiento relation
 * @method     AutosQuery rightJoinMantenimiento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mantenimiento relation
 * @method     AutosQuery innerJoinMantenimiento($relationAlias = null) Adds a INNER JOIN clause to the query using the Mantenimiento relation
 *
 * @method     Autos findOne(PropelPDO $con = null) Return the first Autos matching the query
 * @method     Autos findOneOrCreate(PropelPDO $con = null) Return the first Autos matching the query, or a new Autos object populated from the query conditions when no match is found
 *
 * @method     Autos findOneByModelo(string $Modelo) Return the first Autos filtered by the Modelo column
 * @method     Autos findOneByColor(string $color) Return the first Autos filtered by the color column
 * @method     Autos findOneByAnioAuto(int $anio_auto) Return the first Autos filtered by the anio_auto column
 * @method     Autos findOneById(int $Id) Return the first Autos filtered by the Id column
 * @method     Autos findOneByPatente(string $Patente) Return the first Autos filtered by the Patente column
 * @method     Autos findOneByImagen(resource $Imagen) Return the first Autos filtered by the Imagen column
 * @method     Autos findOneByChasis(string $chasis) Return the first Autos filtered by the chasis column
 * @method     Autos findOneByVencSeguro(string $Venc_Seguro) Return the first Autos filtered by the Venc_Seguro column
 * @method     Autos findOneByCategoria(string $Categoria) Return the first Autos filtered by the Categoria column
 *
 * @method     array findByModelo(string $Modelo) Return Autos objects filtered by the Modelo column
 * @method     array findByColor(string $color) Return Autos objects filtered by the color column
 * @method     array findByAnioAuto(int $anio_auto) Return Autos objects filtered by the anio_auto column
 * @method     array findById(int $Id) Return Autos objects filtered by the Id column
 * @method     array findByPatente(string $Patente) Return Autos objects filtered by the Patente column
 * @method     array findByImagen(resource $Imagen) Return Autos objects filtered by the Imagen column
 * @method     array findByChasis(string $chasis) Return Autos objects filtered by the chasis column
 * @method     array findByVencSeguro(string $Venc_Seguro) Return Autos objects filtered by the Venc_Seguro column
 * @method     array findByCategoria(string $Categoria) Return Autos objects filtered by the Categoria column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAutosQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseAutosQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Autos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AutosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AutosQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AutosQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AutosQuery) {
            return $criteria;
        }
        $query = new AutosQuery();
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
     * @return   Autos|Autos[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AutosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AutosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Autos A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `MODELO`, `COLOR`, `ANIO_AUTO`, `ID`, `PATENTE`, `IMAGEN`, `CHASIS`, `VENC_SEGURO`, `CATEGORIA` FROM `Autos` WHERE `ID` = :p0';
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
            $obj = new Autos();
            $obj->hydrate($row);
            AutosPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Autos|Autos[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Autos[]|mixed the list of results, formatted by the current formatter
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
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AutosPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AutosPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Modelo column
     *
     * Example usage:
     * <code>
     * $query->filterByModelo('fooValue');   // WHERE Modelo = 'fooValue'
     * $query->filterByModelo('%fooValue%'); // WHERE Modelo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $modelo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByModelo($modelo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modelo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $modelo)) {
                $modelo = str_replace('*', '%', $modelo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AutosPeer::MODELO, $modelo, $comparison);
    }

    /**
     * Filter the query on the color column
     *
     * Example usage:
     * <code>
     * $query->filterByColor('fooValue');   // WHERE color = 'fooValue'
     * $query->filterByColor('%fooValue%'); // WHERE color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $color The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByColor($color = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($color)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $color)) {
                $color = str_replace('*', '%', $color);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AutosPeer::COLOR, $color, $comparison);
    }

    /**
     * Filter the query on the anio_auto column
     *
     * Example usage:
     * <code>
     * $query->filterByAnioAuto(1234); // WHERE anio_auto = 1234
     * $query->filterByAnioAuto(array(12, 34)); // WHERE anio_auto IN (12, 34)
     * $query->filterByAnioAuto(array('min' => 12)); // WHERE anio_auto > 12
     * </code>
     *
     * @param     mixed $anioAuto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByAnioAuto($anioAuto = null, $comparison = null)
    {
        if (is_array($anioAuto)) {
            $useMinMax = false;
            if (isset($anioAuto['min'])) {
                $this->addUsingAlias(AutosPeer::ANIO_AUTO, $anioAuto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anioAuto['max'])) {
                $this->addUsingAlias(AutosPeer::ANIO_AUTO, $anioAuto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutosPeer::ANIO_AUTO, $anioAuto, $comparison);
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
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AutosPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the Patente column
     *
     * Example usage:
     * <code>
     * $query->filterByPatente('fooValue');   // WHERE Patente = 'fooValue'
     * $query->filterByPatente('%fooValue%'); // WHERE Patente LIKE '%fooValue%'
     * </code>
     *
     * @param     string $patente The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByPatente($patente = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($patente)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $patente)) {
                $patente = str_replace('*', '%', $patente);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AutosPeer::PATENTE, $patente, $comparison);
    }

    /**
     * Filter the query on the Imagen column
     *
     * @param     mixed $imagen The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByImagen($imagen = null, $comparison = null)
    {

        return $this->addUsingAlias(AutosPeer::IMAGEN, $imagen, $comparison);
    }

    /**
     * Filter the query on the chasis column
     *
     * Example usage:
     * <code>
     * $query->filterByChasis('fooValue');   // WHERE chasis = 'fooValue'
     * $query->filterByChasis('%fooValue%'); // WHERE chasis LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chasis The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByChasis($chasis = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chasis)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chasis)) {
                $chasis = str_replace('*', '%', $chasis);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AutosPeer::CHASIS, $chasis, $comparison);
    }

    /**
     * Filter the query on the Venc_Seguro column
     *
     * Example usage:
     * <code>
     * $query->filterByVencSeguro('2011-03-14'); // WHERE Venc_Seguro = '2011-03-14'
     * $query->filterByVencSeguro('now'); // WHERE Venc_Seguro = '2011-03-14'
     * $query->filterByVencSeguro(array('max' => 'yesterday')); // WHERE Venc_Seguro > '2011-03-13'
     * </code>
     *
     * @param     mixed $vencSeguro The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByVencSeguro($vencSeguro = null, $comparison = null)
    {
        if (is_array($vencSeguro)) {
            $useMinMax = false;
            if (isset($vencSeguro['min'])) {
                $this->addUsingAlias(AutosPeer::VENC_SEGURO, $vencSeguro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vencSeguro['max'])) {
                $this->addUsingAlias(AutosPeer::VENC_SEGURO, $vencSeguro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutosPeer::VENC_SEGURO, $vencSeguro, $comparison);
    }

    /**
     * Filter the query on the Categoria column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoria('fooValue');   // WHERE Categoria = 'fooValue'
     * $query->filterByCategoria('%fooValue%'); // WHERE Categoria LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoria The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function filterByCategoria($categoria = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoria)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $categoria)) {
                $categoria = str_replace('*', '%', $categoria);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AutosPeer::CATEGORIA, $categoria, $comparison);
    }

    /**
     * Filter the query by a related CategoriaAutos object
     *
     * @param   CategoriaAutos|PropelObjectCollection $categoriaAutos The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AutosQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCategoriaAutos($categoriaAutos, $comparison = null)
    {
        if ($categoriaAutos instanceof CategoriaAutos) {
            return $this
                ->addUsingAlias(AutosPeer::CATEGORIA, $categoriaAutos->getClaseAuto(), $comparison);
        } elseif ($categoriaAutos instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AutosPeer::CATEGORIA, $categoriaAutos->toKeyValue('PrimaryKey', 'ClaseAuto'), $comparison);
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
     * @return AutosQuery The current query, for fluid interface
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
     * @return   AutosQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEstadoAuto($estadoAuto, $comparison = null)
    {
        if ($estadoAuto instanceof EstadoAuto) {
            return $this
                ->addUsingAlias(AutosPeer::ID, $estadoAuto->getAuto(), $comparison);
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
     * @return AutosQuery The current query, for fluid interface
     */
    public function joinEstadoAuto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useEstadoAutoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEstadoAuto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EstadoAuto', 'EstadoAutoQuery');
    }

    /**
     * Filter the query by a related Mantenimiento object
     *
     * @param   Mantenimiento|PropelObjectCollection $mantenimiento  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AutosQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMantenimiento($mantenimiento, $comparison = null)
    {
        if ($mantenimiento instanceof Mantenimiento) {
            return $this
                ->addUsingAlias(AutosPeer::ID, $mantenimiento->getIdAuto(), $comparison);
        } elseif ($mantenimiento instanceof PropelObjectCollection) {
            return $this
                ->useMantenimientoQuery()
                ->filterByPrimaryKeys($mantenimiento->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMantenimiento() only accepts arguments of type Mantenimiento or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mantenimiento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function joinMantenimiento($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mantenimiento');

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
            $this->addJoinObject($join, 'Mantenimiento');
        }

        return $this;
    }

    /**
     * Use the Mantenimiento relation Mantenimiento object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MantenimientoQuery A secondary query class using the current class as primary query
     */
    public function useMantenimientoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMantenimiento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mantenimiento', 'MantenimientoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Autos $autos Object to remove from the list of results
     *
     * @return AutosQuery The current query, for fluid interface
     */
    public function prune($autos = null)
    {
        if ($autos) {
            $this->addUsingAlias(AutosPeer::ID, $autos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseAutosQuery
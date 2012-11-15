<?php


/**
 * Base class that represents a row from the 'Autos' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAutos extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'AutosPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AutosPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the modelo field.
     * @var        string
     */
    protected $modelo;

    /**
     * The value for the color field.
     * @var        string
     */
    protected $color;

    /**
     * The value for the anio_auto field.
     * @var        int
     */
    protected $anio_auto;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the patente field.
     * @var        string
     */
    protected $patente;

    /**
     * The value for the imagen field.
     * @var        resource
     */
    protected $imagen;

    /**
     * The value for the chasis field.
     * @var        string
     */
    protected $chasis;

    /**
     * The value for the venc_seguro field.
     * @var        string
     */
    protected $venc_seguro;

    /**
     * The value for the categoria field.
     * @var        string
     */
    protected $categoria;

    /**
     * @var        CategoriaAutos
     */
    protected $aCategoriaAutos;

    /**
     * @var        EstadoAuto one-to-one related EstadoAuto object
     */
    protected $singleEstadoAuto;

    /**
     * @var        Mantenimiento one-to-one related Mantenimiento object
     */
    protected $singleMantenimiento;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $estadoAutosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mantenimientosScheduledForDeletion = null;

    /**
     * Get the [modelo] column value.
     * 
     * @return   string
     */
    public function getModelo()
    {

        return $this->modelo;
    }

    /**
     * Get the [color] column value.
     * 
     * @return   string
     */
    public function getColor()
    {

        return $this->color;
    }

    /**
     * Get the [anio_auto] column value.
     * 
     * @return   int
     */
    public function getAnioAuto()
    {

        return $this->anio_auto;
    }

    /**
     * Get the [id] column value.
     * 
     * @return   int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [patente] column value.
     * 
     * @return   string
     */
    public function getPatente()
    {

        return $this->patente;
    }

    /**
     * Get the [imagen] column value.
     * 
     * @return   resource
     */
    public function getImagen()
    {

        return $this->imagen;
    }

    /**
     * Get the [chasis] column value.
     * 
     * @return   string
     */
    public function getChasis()
    {

        return $this->chasis;
    }

    /**
     * Get the [optionally formatted] temporal [venc_seguro] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getVencSeguro($format = 'Y-m-d')
    {
        if ($this->venc_seguro === null) {
            return null;
        }


        if ($this->venc_seguro === '0000-00-00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->venc_seguro);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->venc_seguro, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [categoria] column value.
     * 
     * @return   string
     */
    public function getCategoria()
    {

        return $this->categoria;
    }

    /**
     * Set the value of [modelo] column.
     * 
     * @param      string $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setModelo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->modelo !== $v) {
            $this->modelo = $v;
            $this->modifiedColumns[] = AutosPeer::MODELO;
        }


        return $this;
    } // setModelo()

    /**
     * Set the value of [color] column.
     * 
     * @param      string $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setColor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->color !== $v) {
            $this->color = $v;
            $this->modifiedColumns[] = AutosPeer::COLOR;
        }


        return $this;
    } // setColor()

    /**
     * Set the value of [anio_auto] column.
     * 
     * @param      int $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setAnioAuto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->anio_auto !== $v) {
            $this->anio_auto = $v;
            $this->modifiedColumns[] = AutosPeer::ANIO_AUTO;
        }


        return $this;
    } // setAnioAuto()

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = AutosPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [patente] column.
     * 
     * @param      string $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setPatente($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->patente !== $v) {
            $this->patente = $v;
            $this->modifiedColumns[] = AutosPeer::PATENTE;
        }


        return $this;
    } // setPatente()

    /**
     * Set the value of [imagen] column.
     * 
     * @param      resource $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setImagen($v)
    {
        // Because BLOB columns are streams in PDO we have to assume that they are
        // always modified when a new value is passed in.  For example, the contents
        // of the stream itself may have changed externally.
        if (!is_resource($v) && $v !== null) {
            $this->imagen = fopen('php://memory', 'r+');
            fwrite($this->imagen, $v);
            rewind($this->imagen);
        } else { // it's already a stream
            $this->imagen = $v;
        }
        $this->modifiedColumns[] = AutosPeer::IMAGEN;


        return $this;
    } // setImagen()

    /**
     * Set the value of [chasis] column.
     * 
     * @param      string $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setChasis($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chasis !== $v) {
            $this->chasis = $v;
            $this->modifiedColumns[] = AutosPeer::CHASIS;
        }


        return $this;
    } // setChasis()

    /**
     * Sets the value of [venc_seguro] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Autos The current object (for fluent API support)
     */
    public function setVencSeguro($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->venc_seguro !== null || $dt !== null) {
            $currentDateAsString = ($this->venc_seguro !== null && $tmpDt = new DateTime($this->venc_seguro)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->venc_seguro = $newDateAsString;
                $this->modifiedColumns[] = AutosPeer::VENC_SEGURO;
            }
        } // if either are not null


        return $this;
    } // setVencSeguro()

    /**
     * Set the value of [categoria] column.
     * 
     * @param      string $v new value
     * @return   Autos The current object (for fluent API support)
     */
    public function setCategoria($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->categoria !== $v) {
            $this->categoria = $v;
            $this->modifiedColumns[] = AutosPeer::CATEGORIA;
        }

        if ($this->aCategoriaAutos !== null && $this->aCategoriaAutos->getClaseAuto() !== $v) {
            $this->aCategoriaAutos = null;
        }


        return $this;
    } // setCategoria()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->modelo = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->color = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->anio_auto = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->patente = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            if ($row[$startcol + 5] !== null) {
                $this->imagen = fopen('php://memory', 'r+');
                fwrite($this->imagen, $row[$startcol + 5]);
                rewind($this->imagen);
            } else {
                $this->imagen = null;
            }
            $this->chasis = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->venc_seguro = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->categoria = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = AutosPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Autos object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aCategoriaAutos !== null && $this->categoria !== $this->aCategoriaAutos->getClaseAuto()) {
            $this->aCategoriaAutos = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(AutosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AutosPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategoriaAutos = null;
            $this->singleEstadoAuto = null;

            $this->singleMantenimiento = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(AutosPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AutosQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAutos:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseAutos:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(AutosPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAutos:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseAutos:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

                AutosPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategoriaAutos !== null) {
                if ($this->aCategoriaAutos->isModified() || $this->aCategoriaAutos->isNew()) {
                    $affectedRows += $this->aCategoriaAutos->save($con);
                }
                $this->setCategoriaAutos($this->aCategoriaAutos);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                // Rewind the imagen LOB column, since PDO does not rewind after inserting value.
                if ($this->imagen !== null && is_resource($this->imagen)) {
                    rewind($this->imagen);
                }

                $this->resetModified();
            }

            if ($this->estadoAutosScheduledForDeletion !== null) {
                if (!$this->estadoAutosScheduledForDeletion->isEmpty()) {
                    EstadoAutoQuery::create()
                        ->filterByPrimaryKeys($this->estadoAutosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->estadoAutosScheduledForDeletion = null;
                }
            }

            if ($this->singleEstadoAuto !== null) {
                if (!$this->singleEstadoAuto->isDeleted()) {
                        $affectedRows += $this->singleEstadoAuto->save($con);
                }
            }

            if ($this->mantenimientosScheduledForDeletion !== null) {
                if (!$this->mantenimientosScheduledForDeletion->isEmpty()) {
                    MantenimientoQuery::create()
                        ->filterByPrimaryKeys($this->mantenimientosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mantenimientosScheduledForDeletion = null;
                }
            }

            if ($this->singleMantenimiento !== null) {
                if (!$this->singleMantenimiento->isDeleted()) {
                        $affectedRows += $this->singleMantenimiento->save($con);
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = AutosPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AutosPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AutosPeer::MODELO)) {
            $modifiedColumns[':p' . $index++]  = '`MODELO`';
        }
        if ($this->isColumnModified(AutosPeer::COLOR)) {
            $modifiedColumns[':p' . $index++]  = '`COLOR`';
        }
        if ($this->isColumnModified(AutosPeer::ANIO_AUTO)) {
            $modifiedColumns[':p' . $index++]  = '`ANIO_AUTO`';
        }
        if ($this->isColumnModified(AutosPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(AutosPeer::PATENTE)) {
            $modifiedColumns[':p' . $index++]  = '`PATENTE`';
        }
        if ($this->isColumnModified(AutosPeer::IMAGEN)) {
            $modifiedColumns[':p' . $index++]  = '`IMAGEN`';
        }
        if ($this->isColumnModified(AutosPeer::CHASIS)) {
            $modifiedColumns[':p' . $index++]  = '`CHASIS`';
        }
        if ($this->isColumnModified(AutosPeer::VENC_SEGURO)) {
            $modifiedColumns[':p' . $index++]  = '`VENC_SEGURO`';
        }
        if ($this->isColumnModified(AutosPeer::CATEGORIA)) {
            $modifiedColumns[':p' . $index++]  = '`CATEGORIA`';
        }

        $sql = sprintf(
            'INSERT INTO `Autos` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`MODELO`':
						$stmt->bindValue($identifier, $this->modelo, PDO::PARAM_STR);
                        break;
                    case '`COLOR`':
						$stmt->bindValue($identifier, $this->color, PDO::PARAM_STR);
                        break;
                    case '`ANIO_AUTO`':
						$stmt->bindValue($identifier, $this->anio_auto, PDO::PARAM_INT);
                        break;
                    case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`PATENTE`':
						$stmt->bindValue($identifier, $this->patente, PDO::PARAM_STR);
                        break;
                    case '`IMAGEN`':
						if (is_resource($this->imagen)) {
						    rewind($this->imagen);
						}
						$stmt->bindValue($identifier, $this->imagen, PDO::PARAM_LOB);
                        break;
                    case '`CHASIS`':
						$stmt->bindValue($identifier, $this->chasis, PDO::PARAM_STR);
                        break;
                    case '`VENC_SEGURO`':
						$stmt->bindValue($identifier, $this->venc_seguro, PDO::PARAM_STR);
                        break;
                    case '`CATEGORIA`':
						$stmt->bindValue($identifier, $this->categoria, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
			$pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param      mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategoriaAutos !== null) {
                if (!$this->aCategoriaAutos->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCategoriaAutos->getValidationFailures());
                }
            }


            if (($retval = AutosPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->singleEstadoAuto !== null) {
                    if (!$this->singleEstadoAuto->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleEstadoAuto->getValidationFailures());
                    }
                }

                if ($this->singleMantenimiento !== null) {
                    if (!$this->singleMantenimiento->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleMantenimiento->getValidationFailures());
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = AutosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getModelo();
                break;
            case 1:
                return $this->getColor();
                break;
            case 2:
                return $this->getAnioAuto();
                break;
            case 3:
                return $this->getId();
                break;
            case 4:
                return $this->getPatente();
                break;
            case 5:
                return $this->getImagen();
                break;
            case 6:
                return $this->getChasis();
                break;
            case 7:
                return $this->getVencSeguro();
                break;
            case 8:
                return $this->getCategoria();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Autos'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Autos'][$this->getPrimaryKey()] = true;
        $keys = AutosPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getModelo(),
            $keys[1] => $this->getColor(),
            $keys[2] => $this->getAnioAuto(),
            $keys[3] => $this->getId(),
            $keys[4] => $this->getPatente(),
            $keys[5] => $this->getImagen(),
            $keys[6] => $this->getChasis(),
            $keys[7] => $this->getVencSeguro(),
            $keys[8] => $this->getCategoria(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCategoriaAutos) {
                $result['CategoriaAutos'] = $this->aCategoriaAutos->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleEstadoAuto) {
                $result['EstadoAuto'] = $this->singleEstadoAuto->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleMantenimiento) {
                $result['Mantenimiento'] = $this->singleMantenimiento->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = AutosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setModelo($value);
                break;
            case 1:
                $this->setColor($value);
                break;
            case 2:
                $this->setAnioAuto($value);
                break;
            case 3:
                $this->setId($value);
                break;
            case 4:
                $this->setPatente($value);
                break;
            case 5:
                $this->setImagen($value);
                break;
            case 6:
                $this->setChasis($value);
                break;
            case 7:
                $this->setVencSeguro($value);
                break;
            case 8:
                $this->setCategoria($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = AutosPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setModelo($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setColor($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAnioAuto($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPatente($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setImagen($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setChasis($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setVencSeguro($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCategoria($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AutosPeer::DATABASE_NAME);

        if ($this->isColumnModified(AutosPeer::MODELO)) $criteria->add(AutosPeer::MODELO, $this->modelo);
        if ($this->isColumnModified(AutosPeer::COLOR)) $criteria->add(AutosPeer::COLOR, $this->color);
        if ($this->isColumnModified(AutosPeer::ANIO_AUTO)) $criteria->add(AutosPeer::ANIO_AUTO, $this->anio_auto);
        if ($this->isColumnModified(AutosPeer::ID)) $criteria->add(AutosPeer::ID, $this->id);
        if ($this->isColumnModified(AutosPeer::PATENTE)) $criteria->add(AutosPeer::PATENTE, $this->patente);
        if ($this->isColumnModified(AutosPeer::IMAGEN)) $criteria->add(AutosPeer::IMAGEN, $this->imagen);
        if ($this->isColumnModified(AutosPeer::CHASIS)) $criteria->add(AutosPeer::CHASIS, $this->chasis);
        if ($this->isColumnModified(AutosPeer::VENC_SEGURO)) $criteria->add(AutosPeer::VENC_SEGURO, $this->venc_seguro);
        if ($this->isColumnModified(AutosPeer::CATEGORIA)) $criteria->add(AutosPeer::CATEGORIA, $this->categoria);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(AutosPeer::DATABASE_NAME);
        $criteria->add(AutosPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of Autos (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setModelo($this->getModelo());
        $copyObj->setColor($this->getColor());
        $copyObj->setAnioAuto($this->getAnioAuto());
        $copyObj->setPatente($this->getPatente());
        $copyObj->setImagen($this->getImagen());
        $copyObj->setChasis($this->getChasis());
        $copyObj->setVencSeguro($this->getVencSeguro());
        $copyObj->setCategoria($this->getCategoria());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            $relObj = $this->getEstadoAuto();
            if ($relObj) {
                $copyObj->setEstadoAuto($relObj->copy($deepCopy));
            }

            $relObj = $this->getMantenimiento();
            if ($relObj) {
                $copyObj->setMantenimiento($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 Autos Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return   AutosPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AutosPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a CategoriaAutos object.
     *
     * @param                  CategoriaAutos $v
     * @return                 Autos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategoriaAutos(CategoriaAutos $v = null)
    {
        if ($v === null) {
            $this->setCategoria(NULL);
        } else {
            $this->setCategoria($v->getClaseAuto());
        }

        $this->aCategoriaAutos = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the CategoriaAutos object, it will not be re-added.
        if ($v !== null) {
            $v->addAutos($this);
        }


        return $this;
    }


    /**
     * Get the associated CategoriaAutos object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 CategoriaAutos The associated CategoriaAutos object.
     * @throws PropelException
     */
    public function getCategoriaAutos(PropelPDO $con = null)
    {
        if ($this->aCategoriaAutos === null && (($this->categoria !== "" && $this->categoria !== null))) {
            $this->aCategoriaAutos = CategoriaAutosQuery::create()
                ->filterByAutos($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategoriaAutos->addAutoss($this);
             */
        }

        return $this->aCategoriaAutos;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
    }

    /**
     * Gets a single EstadoAuto object, which is related to this object by a one-to-one relationship.
     *
     * @param      PropelPDO $con optional connection object
     * @return                 EstadoAuto
     * @throws PropelException
     */
    public function getEstadoAuto(PropelPDO $con = null)
    {

        if ($this->singleEstadoAuto === null && !$this->isNew()) {
            $this->singleEstadoAuto = EstadoAutoQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleEstadoAuto;
    }

    /**
     * Sets a single EstadoAuto object as related to this object by a one-to-one relationship.
     *
     * @param                  EstadoAuto $v EstadoAuto
     * @return                 Autos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEstadoAuto(EstadoAuto $v = null)
    {
        $this->singleEstadoAuto = $v;

        // Make sure that that the passed-in EstadoAuto isn't already associated with this object
        if ($v !== null && $v->getAutos() === null) {
            $v->setAutos($this);
        }

        return $this;
    }

    /**
     * Gets a single Mantenimiento object, which is related to this object by a one-to-one relationship.
     *
     * @param      PropelPDO $con optional connection object
     * @return                 Mantenimiento
     * @throws PropelException
     */
    public function getMantenimiento(PropelPDO $con = null)
    {

        if ($this->singleMantenimiento === null && !$this->isNew()) {
            $this->singleMantenimiento = MantenimientoQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleMantenimiento;
    }

    /**
     * Sets a single Mantenimiento object as related to this object by a one-to-one relationship.
     *
     * @param                  Mantenimiento $v Mantenimiento
     * @return                 Autos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMantenimiento(Mantenimiento $v = null)
    {
        $this->singleMantenimiento = $v;

        // Make sure that that the passed-in Mantenimiento isn't already associated with this object
        if ($v !== null && $v->getAutos() === null) {
            $v->setAutos($this);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->modelo = null;
        $this->color = null;
        $this->anio_auto = null;
        $this->id = null;
        $this->patente = null;
        $this->imagen = null;
        $this->chasis = null;
        $this->venc_seguro = null;
        $this->categoria = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->singleEstadoAuto) {
                $this->singleEstadoAuto->clearAllReferences($deep);
            }
            if ($this->singleMantenimiento) {
                $this->singleMantenimiento->clearAllReferences($deep);
            }
        } // if ($deep)

        if ($this->singleEstadoAuto instanceof PropelCollection) {
            $this->singleEstadoAuto->clearIterator();
        }
        $this->singleEstadoAuto = null;
        if ($this->singleMantenimiento instanceof PropelCollection) {
            $this->singleMantenimiento->clearIterator();
        }
        $this->singleMantenimiento = null;
        $this->aCategoriaAutos = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AutosPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {
        
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseAutos:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}


        return parent::__call($name, $params);
    }

} // BaseAutos

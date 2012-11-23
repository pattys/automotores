<?php


/**
 * Base class that represents a row from the 'Choferes' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseChoferes extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'ChoferesPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ChoferesPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the nombre field.
     * @var        string
     */
    protected $nombre;

    /**
     * The value for the licencia field.
     * @var        int
     */
    protected $licencia;

    /**
     * The value for the domicilio field.
     * @var        string
     */
    protected $domicilio;

    /**
     * The value for the vencimiento_lic field.
     * @var        string
     */
    protected $vencimiento_lic;

    /**
     * The value for the clase field.
     * @var        string
     */
    protected $clase;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * @var        CategoriaAutos
     */
    protected $aCategoriaAutos;

    /**
     * @var        PropelObjectCollection|EstadoAuto[] Collection to store aggregation of EstadoAuto objects.
     */
    protected $collEstadoAutos;

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
     * Get the [nombre] column value.
     * 
     * @return   string
     */
    public function getNombre()
    {

        return $this->nombre;
    }

    /**
     * Get the [licencia] column value.
     * 
     * @return   int
     */
    public function getLicencia()
    {

        return $this->licencia;
    }

    /**
     * Get the [domicilio] column value.
     * 
     * @return   string
     */
    public function getDomicilio()
    {

        return $this->domicilio;
    }

    /**
     * Get the [optionally formatted] temporal [vencimiento_lic] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getVencimientoLic($format = 'Y-m-d')
    {
        if ($this->vencimiento_lic === null) {
            return null;
        }


        if ($this->vencimiento_lic === '0000-00-00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->vencimiento_lic);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->vencimiento_lic, true), $x);
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
     * Get the [clase] column value.
     * 
     * @return   string
     */
    public function getClase()
    {

        return $this->clase;
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
     * Set the value of [nombre] column.
     * 
     * @param      string $v new value
     * @return   Choferes The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[] = ChoferesPeer::NOMBRE;
        }


        return $this;
    } // setNombre()

    /**
     * Set the value of [licencia] column.
     * 
     * @param      int $v new value
     * @return   Choferes The current object (for fluent API support)
     */
    public function setLicencia($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->licencia !== $v) {
            $this->licencia = $v;
            $this->modifiedColumns[] = ChoferesPeer::LICENCIA;
        }


        return $this;
    } // setLicencia()

    /**
     * Set the value of [domicilio] column.
     * 
     * @param      string $v new value
     * @return   Choferes The current object (for fluent API support)
     */
    public function setDomicilio($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->domicilio !== $v) {
            $this->domicilio = $v;
            $this->modifiedColumns[] = ChoferesPeer::DOMICILIO;
        }


        return $this;
    } // setDomicilio()

    /**
     * Sets the value of [vencimiento_lic] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Choferes The current object (for fluent API support)
     */
    public function setVencimientoLic($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->vencimiento_lic !== null || $dt !== null) {
            $currentDateAsString = ($this->vencimiento_lic !== null && $tmpDt = new DateTime($this->vencimiento_lic)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->vencimiento_lic = $newDateAsString;
                $this->modifiedColumns[] = ChoferesPeer::VENCIMIENTO_LIC;
            }
        } // if either are not null


        return $this;
    } // setVencimientoLic()

    /**
     * Set the value of [clase] column.
     * 
     * @param      string $v new value
     * @return   Choferes The current object (for fluent API support)
     */
    public function setClase($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clase !== $v) {
            $this->clase = $v;
            $this->modifiedColumns[] = ChoferesPeer::CLASE;
        }

        if ($this->aCategoriaAutos !== null && $this->aCategoriaAutos->getClaseAuto() !== $v) {
            $this->aCategoriaAutos = null;
        }


        return $this;
    } // setClase()

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Choferes The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ChoferesPeer::ID;
        }


        return $this;
    } // setId()

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

            $this->nombre = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->licencia = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->domicilio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->vencimiento_lic = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->clase = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = ChoferesPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Choferes object", $e);
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

        if ($this->aCategoriaAutos !== null && $this->clase !== $this->aCategoriaAutos->getClaseAuto()) {
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
            $con = Propel::getConnection(ChoferesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ChoferesPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategoriaAutos = null;
            $this->collEstadoAutos = null;

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
            $con = Propel::getConnection(ChoferesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ChoferesQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseChoferes:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseChoferes:delete:post') as $callable)
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
            $con = Propel::getConnection(ChoferesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseChoferes:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseChoferes:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

                ChoferesPeer::addInstanceToPool($this);
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
                $this->resetModified();
            }

            if ($this->estadoAutosScheduledForDeletion !== null) {
                if (!$this->estadoAutosScheduledForDeletion->isEmpty()) {
                    foreach ($this->estadoAutosScheduledForDeletion as $estadoAuto) {
                        // need to save related object because we set the relation to null
                        $estadoAuto->save($con);
                    }
                    $this->estadoAutosScheduledForDeletion = null;
                }
            }

            if ($this->collEstadoAutos !== null) {
                foreach ($this->collEstadoAutos as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
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

        $this->modifiedColumns[] = ChoferesPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ChoferesPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ChoferesPeer::NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`NOMBRE`';
        }
        if ($this->isColumnModified(ChoferesPeer::LICENCIA)) {
            $modifiedColumns[':p' . $index++]  = '`LICENCIA`';
        }
        if ($this->isColumnModified(ChoferesPeer::DOMICILIO)) {
            $modifiedColumns[':p' . $index++]  = '`DOMICILIO`';
        }
        if ($this->isColumnModified(ChoferesPeer::VENCIMIENTO_LIC)) {
            $modifiedColumns[':p' . $index++]  = '`VENCIMIENTO_LIC`';
        }
        if ($this->isColumnModified(ChoferesPeer::CLASE)) {
            $modifiedColumns[':p' . $index++]  = '`CLASE`';
        }
        if ($this->isColumnModified(ChoferesPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }

        $sql = sprintf(
            'INSERT INTO `Choferes` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`NOMBRE`':
						$stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case '`LICENCIA`':
						$stmt->bindValue($identifier, $this->licencia, PDO::PARAM_INT);
                        break;
                    case '`DOMICILIO`':
						$stmt->bindValue($identifier, $this->domicilio, PDO::PARAM_STR);
                        break;
                    case '`VENCIMIENTO_LIC`':
						$stmt->bindValue($identifier, $this->vencimiento_lic, PDO::PARAM_STR);
                        break;
                    case '`CLASE`':
						$stmt->bindValue($identifier, $this->clase, PDO::PARAM_STR);
                        break;
                    case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
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


            if (($retval = ChoferesPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collEstadoAutos !== null) {
                    foreach ($this->collEstadoAutos as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
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
        $pos = ChoferesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getNombre();
                break;
            case 1:
                return $this->getLicencia();
                break;
            case 2:
                return $this->getDomicilio();
                break;
            case 3:
                return $this->getVencimientoLic();
                break;
            case 4:
                return $this->getClase();
                break;
            case 5:
                return $this->getId();
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
        if (isset($alreadyDumpedObjects['Choferes'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Choferes'][$this->getPrimaryKey()] = true;
        $keys = ChoferesPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getNombre(),
            $keys[1] => $this->getLicencia(),
            $keys[2] => $this->getDomicilio(),
            $keys[3] => $this->getVencimientoLic(),
            $keys[4] => $this->getClase(),
            $keys[5] => $this->getId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCategoriaAutos) {
                $result['CategoriaAutos'] = $this->aCategoriaAutos->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEstadoAutos) {
                $result['EstadoAutos'] = $this->collEstadoAutos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ChoferesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setNombre($value);
                break;
            case 1:
                $this->setLicencia($value);
                break;
            case 2:
                $this->setDomicilio($value);
                break;
            case 3:
                $this->setVencimientoLic($value);
                break;
            case 4:
                $this->setClase($value);
                break;
            case 5:
                $this->setId($value);
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
        $keys = ChoferesPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setNombre($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setLicencia($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDomicilio($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setVencimientoLic($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setClase($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ChoferesPeer::DATABASE_NAME);

        if ($this->isColumnModified(ChoferesPeer::NOMBRE)) $criteria->add(ChoferesPeer::NOMBRE, $this->nombre);
        if ($this->isColumnModified(ChoferesPeer::LICENCIA)) $criteria->add(ChoferesPeer::LICENCIA, $this->licencia);
        if ($this->isColumnModified(ChoferesPeer::DOMICILIO)) $criteria->add(ChoferesPeer::DOMICILIO, $this->domicilio);
        if ($this->isColumnModified(ChoferesPeer::VENCIMIENTO_LIC)) $criteria->add(ChoferesPeer::VENCIMIENTO_LIC, $this->vencimiento_lic);
        if ($this->isColumnModified(ChoferesPeer::CLASE)) $criteria->add(ChoferesPeer::CLASE, $this->clase);
        if ($this->isColumnModified(ChoferesPeer::ID)) $criteria->add(ChoferesPeer::ID, $this->id);

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
        $criteria = new Criteria(ChoferesPeer::DATABASE_NAME);
        $criteria->add(ChoferesPeer::ID, $this->id);

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
     * @param      object $copyObj An object of Choferes (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setLicencia($this->getLicencia());
        $copyObj->setDomicilio($this->getDomicilio());
        $copyObj->setVencimientoLic($this->getVencimientoLic());
        $copyObj->setClase($this->getClase());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getEstadoAutos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEstadoAuto($relObj->copy($deepCopy));
                }
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
     * @return                 Choferes Clone of current object.
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
     * @return   ChoferesPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ChoferesPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a CategoriaAutos object.
     *
     * @param                  CategoriaAutos $v
     * @return                 Choferes The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategoriaAutos(CategoriaAutos $v = null)
    {
        if ($v === null) {
            $this->setClase(NULL);
        } else {
            $this->setClase($v->getClaseAuto());
        }

        $this->aCategoriaAutos = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the CategoriaAutos object, it will not be re-added.
        if ($v !== null) {
            $v->addChoferes($this);
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
        if ($this->aCategoriaAutos === null && (($this->clase !== "" && $this->clase !== null))) {
            $this->aCategoriaAutos = CategoriaAutosQuery::create()
                ->filterByChoferes($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategoriaAutos->addChoferess($this);
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
        if ('EstadoAuto' == $relationName) {
            $this->initEstadoAutos();
        }
    }

    /**
     * Clears out the collEstadoAutos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEstadoAutos()
     */
    public function clearEstadoAutos()
    {
        $this->collEstadoAutos = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collEstadoAutos collection.
     *
     * By default this just sets the collEstadoAutos collection to an empty array (like clearcollEstadoAutos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEstadoAutos($overrideExisting = true)
    {
        if (null !== $this->collEstadoAutos && !$overrideExisting) {
            return;
        }
        $this->collEstadoAutos = new PropelObjectCollection();
        $this->collEstadoAutos->setModel('EstadoAuto');
    }

    /**
     * Gets an array of EstadoAuto objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Choferes is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|EstadoAuto[] List of EstadoAuto objects
     * @throws PropelException
     */
    public function getEstadoAutos($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collEstadoAutos || null !== $criteria) {
            if ($this->isNew() && null === $this->collEstadoAutos) {
                // return empty collection
                $this->initEstadoAutos();
            } else {
                $collEstadoAutos = EstadoAutoQuery::create(null, $criteria)
                    ->filterByChoferes($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collEstadoAutos;
                }
                $this->collEstadoAutos = $collEstadoAutos;
            }
        }

        return $this->collEstadoAutos;
    }

    /**
     * Sets a collection of EstadoAuto objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $estadoAutos A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setEstadoAutos(PropelCollection $estadoAutos, PropelPDO $con = null)
    {
        $this->estadoAutosScheduledForDeletion = $this->getEstadoAutos(new Criteria(), $con)->diff($estadoAutos);

        foreach ($this->estadoAutosScheduledForDeletion as $estadoAutoRemoved) {
            $estadoAutoRemoved->setChoferes(null);
        }

        $this->collEstadoAutos = null;
        foreach ($estadoAutos as $estadoAuto) {
            $this->addEstadoAuto($estadoAuto);
        }

        $this->collEstadoAutos = $estadoAutos;
    }

    /**
     * Returns the number of related EstadoAuto objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related EstadoAuto objects.
     * @throws PropelException
     */
    public function countEstadoAutos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collEstadoAutos || null !== $criteria) {
            if ($this->isNew() && null === $this->collEstadoAutos) {
                return 0;
            } else {
                $query = EstadoAutoQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByChoferes($this)
                    ->count($con);
            }
        } else {
            return count($this->collEstadoAutos);
        }
    }

    /**
     * Method called to associate a EstadoAuto object to this object
     * through the EstadoAuto foreign key attribute.
     *
     * @param    EstadoAuto $l EstadoAuto
     * @return   Choferes The current object (for fluent API support)
     */
    public function addEstadoAuto(EstadoAuto $l)
    {
        if ($this->collEstadoAutos === null) {
            $this->initEstadoAutos();
        }
        if (!$this->collEstadoAutos->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddEstadoAuto($l);
        }

        return $this;
    }

    /**
     * @param	EstadoAuto $estadoAuto The estadoAuto object to add.
     */
    protected function doAddEstadoAuto($estadoAuto)
    {
        $this->collEstadoAutos[]= $estadoAuto;
        $estadoAuto->setChoferes($this);
    }

    /**
     * @param	EstadoAuto $estadoAuto The estadoAuto object to remove.
     */
    public function removeEstadoAuto($estadoAuto)
    {
        if ($this->getEstadoAutos()->contains($estadoAuto)) {
            $this->collEstadoAutos->remove($this->collEstadoAutos->search($estadoAuto));
            if (null === $this->estadoAutosScheduledForDeletion) {
                $this->estadoAutosScheduledForDeletion = clone $this->collEstadoAutos;
                $this->estadoAutosScheduledForDeletion->clear();
            }
            $this->estadoAutosScheduledForDeletion[]= $estadoAuto;
            $estadoAuto->setChoferes(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Choferes is new, it will return
     * an empty collection; or if this Choferes has previously
     * been saved, it will retrieve related EstadoAutos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Choferes.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EstadoAuto[] List of EstadoAuto objects
     */
    public function getEstadoAutosJoinAutos($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EstadoAutoQuery::create(null, $criteria);
        $query->joinWith('Autos', $join_behavior);

        return $this->getEstadoAutos($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->nombre = null;
        $this->licencia = null;
        $this->domicilio = null;
        $this->vencimiento_lic = null;
        $this->clase = null;
        $this->id = null;
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
            if ($this->collEstadoAutos) {
                foreach ($this->collEstadoAutos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collEstadoAutos instanceof PropelCollection) {
            $this->collEstadoAutos->clearIterator();
        }
        $this->collEstadoAutos = null;
        $this->aCategoriaAutos = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ChoferesPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {
        
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseChoferes:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}


        return parent::__call($name, $params);
    }

} // BaseChoferes

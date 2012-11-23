<?php


/**
 * Base class that represents a row from the 'Estado_Auto' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEstadoAuto extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'EstadoAutoPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EstadoAutoPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the auto field.
     * @var        int
     */
    protected $auto;

    /**
     * The value for the conductor field.
     * @var        int
     */
    protected $conductor;

    /**
     * The value for the disponibilidad field.
     * @var        string
     */
    protected $disponibilidad;

    /**
     * The value for the destino field.
     * @var        string
     */
    protected $destino;

    /**
     * @var        Autos
     */
    protected $aAutos;

    /**
     * @var        Choferes
     */
    protected $aChoferes;

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
     * Get the [auto] column value.
     * 
     * @return   int
     */
    public function getAuto()
    {

        return $this->auto;
    }

    /**
     * Get the [conductor] column value.
     * 
     * @return   int
     */
    public function getConductor()
    {

        return $this->conductor;
    }

    /**
     * Get the [disponibilidad] column value.
     * 
     * @return   string
     */
    public function getDisponibilidad()
    {

        return $this->disponibilidad;
    }

    /**
     * Get the [destino] column value.
     * 
     * @return   string
     */
    public function getDestino()
    {

        return $this->destino;
    }

    /**
     * Set the value of [auto] column.
     * 
     * @param      int $v new value
     * @return   EstadoAuto The current object (for fluent API support)
     */
    public function setAuto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->auto !== $v) {
            $this->auto = $v;
            $this->modifiedColumns[] = EstadoAutoPeer::AUTO;
        }

        if ($this->aAutos !== null && $this->aAutos->getId() !== $v) {
            $this->aAutos = null;
        }


        return $this;
    } // setAuto()

    /**
     * Set the value of [conductor] column.
     * 
     * @param      int $v new value
     * @return   EstadoAuto The current object (for fluent API support)
     */
    public function setConductor($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->conductor !== $v) {
            $this->conductor = $v;
            $this->modifiedColumns[] = EstadoAutoPeer::CONDUCTOR;
        }

        if ($this->aChoferes !== null && $this->aChoferes->getLicencia() !== $v) {
            $this->aChoferes = null;
        }


        return $this;
    } // setConductor()

    /**
     * Set the value of [disponibilidad] column.
     * 
     * @param      string $v new value
     * @return   EstadoAuto The current object (for fluent API support)
     */
    public function setDisponibilidad($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->disponibilidad !== $v) {
            $this->disponibilidad = $v;
            $this->modifiedColumns[] = EstadoAutoPeer::DISPONIBILIDAD;
        }


        return $this;
    } // setDisponibilidad()

    /**
     * Set the value of [destino] column.
     * 
     * @param      string $v new value
     * @return   EstadoAuto The current object (for fluent API support)
     */
    public function setDestino($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->destino !== $v) {
            $this->destino = $v;
            $this->modifiedColumns[] = EstadoAutoPeer::DESTINO;
        }


        return $this;
    } // setDestino()

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

            $this->auto = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->conductor = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->disponibilidad = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->destino = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = EstadoAutoPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating EstadoAuto object", $e);
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

        if ($this->aAutos !== null && $this->auto !== $this->aAutos->getId()) {
            $this->aAutos = null;
        }
        if ($this->aChoferes !== null && $this->conductor !== $this->aChoferes->getLicencia()) {
            $this->aChoferes = null;
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
            $con = Propel::getConnection(EstadoAutoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EstadoAutoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAutos = null;
            $this->aChoferes = null;
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
            $con = Propel::getConnection(EstadoAutoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EstadoAutoQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseEstadoAuto:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseEstadoAuto:delete:post') as $callable)
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
            $con = Propel::getConnection(EstadoAutoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseEstadoAuto:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseEstadoAuto:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

                EstadoAutoPeer::addInstanceToPool($this);
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

            if ($this->aAutos !== null) {
                if ($this->aAutos->isModified() || $this->aAutos->isNew()) {
                    $affectedRows += $this->aAutos->save($con);
                }
                $this->setAutos($this->aAutos);
            }

            if ($this->aChoferes !== null) {
                if ($this->aChoferes->isModified() || $this->aChoferes->isNew()) {
                    $affectedRows += $this->aChoferes->save($con);
                }
                $this->setChoferes($this->aChoferes);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EstadoAutoPeer::AUTO)) {
            $modifiedColumns[':p' . $index++]  = '`AUTO`';
        }
        if ($this->isColumnModified(EstadoAutoPeer::CONDUCTOR)) {
            $modifiedColumns[':p' . $index++]  = '`CONDUCTOR`';
        }
        if ($this->isColumnModified(EstadoAutoPeer::DISPONIBILIDAD)) {
            $modifiedColumns[':p' . $index++]  = '`DISPONIBILIDAD`';
        }
        if ($this->isColumnModified(EstadoAutoPeer::DESTINO)) {
            $modifiedColumns[':p' . $index++]  = '`DESTINO`';
        }

        $sql = sprintf(
            'INSERT INTO `Estado_Auto` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`AUTO`':
						$stmt->bindValue($identifier, $this->auto, PDO::PARAM_INT);
                        break;
                    case '`CONDUCTOR`':
						$stmt->bindValue($identifier, $this->conductor, PDO::PARAM_INT);
                        break;
                    case '`DISPONIBILIDAD`':
						$stmt->bindValue($identifier, $this->disponibilidad, PDO::PARAM_STR);
                        break;
                    case '`DESTINO`':
						$stmt->bindValue($identifier, $this->destino, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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

            if ($this->aAutos !== null) {
                if (!$this->aAutos->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAutos->getValidationFailures());
                }
            }

            if ($this->aChoferes !== null) {
                if (!$this->aChoferes->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aChoferes->getValidationFailures());
                }
            }


            if (($retval = EstadoAutoPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = EstadoAutoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAuto();
                break;
            case 1:
                return $this->getConductor();
                break;
            case 2:
                return $this->getDisponibilidad();
                break;
            case 3:
                return $this->getDestino();
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
        if (isset($alreadyDumpedObjects['EstadoAuto'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EstadoAuto'][$this->getPrimaryKey()] = true;
        $keys = EstadoAutoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAuto(),
            $keys[1] => $this->getConductor(),
            $keys[2] => $this->getDisponibilidad(),
            $keys[3] => $this->getDestino(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAutos) {
                $result['Autos'] = $this->aAutos->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aChoferes) {
                $result['Choferes'] = $this->aChoferes->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = EstadoAutoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAuto($value);
                break;
            case 1:
                $this->setConductor($value);
                break;
            case 2:
                $this->setDisponibilidad($value);
                break;
            case 3:
                $this->setDestino($value);
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
        $keys = EstadoAutoPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setAuto($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setConductor($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDisponibilidad($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDestino($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EstadoAutoPeer::DATABASE_NAME);

        if ($this->isColumnModified(EstadoAutoPeer::AUTO)) $criteria->add(EstadoAutoPeer::AUTO, $this->auto);
        if ($this->isColumnModified(EstadoAutoPeer::CONDUCTOR)) $criteria->add(EstadoAutoPeer::CONDUCTOR, $this->conductor);
        if ($this->isColumnModified(EstadoAutoPeer::DISPONIBILIDAD)) $criteria->add(EstadoAutoPeer::DISPONIBILIDAD, $this->disponibilidad);
        if ($this->isColumnModified(EstadoAutoPeer::DESTINO)) $criteria->add(EstadoAutoPeer::DESTINO, $this->destino);

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
        $criteria = new Criteria(EstadoAutoPeer::DATABASE_NAME);
        $criteria->add(EstadoAutoPeer::AUTO, $this->auto);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getAuto();
    }

    /**
     * Generic method to set the primary key (auto column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAuto($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAuto();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of EstadoAuto (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setConductor($this->getConductor());
        $copyObj->setDisponibilidad($this->getDisponibilidad());
        $copyObj->setDestino($this->getDestino());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            $relObj = $this->getAutos();
            if ($relObj) {
                $copyObj->setAutos($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAuto(NULL); // this is a auto-increment column, so set to default value
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
     * @return                 EstadoAuto Clone of current object.
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
     * @return   EstadoAutoPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EstadoAutoPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Autos object.
     *
     * @param                  Autos $v
     * @return                 EstadoAuto The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAutos(Autos $v = null)
    {
        if ($v === null) {
            $this->setAuto(NULL);
        } else {
            $this->setAuto($v->getId());
        }

        $this->aAutos = $v;

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setEstadoAuto($this);
        }


        return $this;
    }


    /**
     * Get the associated Autos object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Autos The associated Autos object.
     * @throws PropelException
     */
    public function getAutos(PropelPDO $con = null)
    {
        if ($this->aAutos === null && ($this->auto !== null)) {
            $this->aAutos = AutosQuery::create()->findPk($this->auto, $con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aAutos->setEstadoAuto($this);
        }

        return $this->aAutos;
    }

    /**
     * Declares an association between this object and a Choferes object.
     *
     * @param                  Choferes $v
     * @return                 EstadoAuto The current object (for fluent API support)
     * @throws PropelException
     */
    public function setChoferes(Choferes $v = null)
    {
        if ($v === null) {
            $this->setConductor(NULL);
        } else {
            $this->setConductor($v->getLicencia());
        }

        $this->aChoferes = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Choferes object, it will not be re-added.
        if ($v !== null) {
            $v->addEstadoAuto($this);
        }


        return $this;
    }


    /**
     * Get the associated Choferes object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Choferes The associated Choferes object.
     * @throws PropelException
     */
    public function getChoferes(PropelPDO $con = null)
    {
        if ($this->aChoferes === null && ($this->conductor !== null)) {
            $this->aChoferes = ChoferesQuery::create()
                ->filterByEstadoAuto($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aChoferes->addEstadoAutos($this);
             */
        }

        return $this->aChoferes;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->auto = null;
        $this->conductor = null;
        $this->disponibilidad = null;
        $this->destino = null;
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
        } // if ($deep)

        $this->aAutos = null;
        $this->aChoferes = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EstadoAutoPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {
        
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseEstadoAuto:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}


        return parent::__call($name, $params);
    }

} // BaseEstadoAuto

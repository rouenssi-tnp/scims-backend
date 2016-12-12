<?php

namespace SciMS\Models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use SciMS\Models\Keyword as ChildKeyword;
use SciMS\Models\KeywordQuery as ChildKeywordQuery;
use SciMS\Models\Map\KeywordTableMap;

/**
 * Base class that represents a query for the 'keyword' table.
 *
 *
 *
 * @method     ChildKeywordQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKeywordQuery orderByArticleId($order = Criteria::ASC) Order by the article_id column
 * @method     ChildKeywordQuery orderByTitle($order = Criteria::ASC) Order by the title column
 *
 * @method     ChildKeywordQuery groupById() Group by the id column
 * @method     ChildKeywordQuery groupByArticleId() Group by the article_id column
 * @method     ChildKeywordQuery groupByTitle() Group by the title column
 *
 * @method     ChildKeywordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKeywordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKeywordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKeywordQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKeywordQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKeywordQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKeywordQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method     ChildKeywordQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method     ChildKeywordQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method     ChildKeywordQuery joinWithArticle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Article relation
 *
 * @method     ChildKeywordQuery leftJoinWithArticle() Adds a LEFT JOIN clause and with to the query using the Article relation
 * @method     ChildKeywordQuery rightJoinWithArticle() Adds a RIGHT JOIN clause and with to the query using the Article relation
 * @method     ChildKeywordQuery innerJoinWithArticle() Adds a INNER JOIN clause and with to the query using the Article relation
 *
 * @method     \SciMS\Models\ArticleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildKeyword findOne(ConnectionInterface $con = null) Return the first ChildKeyword matching the query
 * @method     ChildKeyword findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKeyword matching the query, or a new ChildKeyword object populated from the query conditions when no match is found
 *
 * @method     ChildKeyword findOneById(int $id) Return the first ChildKeyword filtered by the id column
 * @method     ChildKeyword findOneByArticleId(int $article_id) Return the first ChildKeyword filtered by the article_id column
 * @method     ChildKeyword findOneByTitle(string $title) Return the first ChildKeyword filtered by the title column *

 * @method     ChildKeyword requirePk($key, ConnectionInterface $con = null) Return the ChildKeyword by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKeyword requireOne(ConnectionInterface $con = null) Return the first ChildKeyword matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKeyword requireOneById(int $id) Return the first ChildKeyword filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKeyword requireOneByArticleId(int $article_id) Return the first ChildKeyword filtered by the article_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKeyword requireOneByTitle(string $title) Return the first ChildKeyword filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKeyword[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKeyword objects based on current ModelCriteria
 * @method     ChildKeyword[]|ObjectCollection findById(int $id) Return ChildKeyword objects filtered by the id column
 * @method     ChildKeyword[]|ObjectCollection findByArticleId(int $article_id) Return ChildKeyword objects filtered by the article_id column
 * @method     ChildKeyword[]|ObjectCollection findByTitle(string $title) Return ChildKeyword objects filtered by the title column
 * @method     ChildKeyword[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KeywordQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \SciMS\Models\Base\KeywordQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'scims', $modelName = '\\SciMS\\Models\\Keyword', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKeywordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKeywordQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKeywordQuery) {
            return $criteria;
        }
        $query = new ChildKeywordQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildKeyword|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KeywordTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KeywordTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildKeyword A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, article_id, title FROM keyword WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildKeyword $obj */
            $obj = new ChildKeyword();
            $obj->hydrate($row);
            KeywordTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildKeyword|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildKeywordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KeywordTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKeywordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KeywordTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildKeywordQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KeywordTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KeywordTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeywordTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the article_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArticleId(1234); // WHERE article_id = 1234
     * $query->filterByArticleId(array(12, 34)); // WHERE article_id IN (12, 34)
     * $query->filterByArticleId(array('min' => 12)); // WHERE article_id > 12
     * </code>
     *
     * @see       filterByArticle()
     *
     * @param     mixed $articleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKeywordQuery The current query, for fluid interface
     */
    public function filterByArticleId($articleId = null, $comparison = null)
    {
        if (is_array($articleId)) {
            $useMinMax = false;
            if (isset($articleId['min'])) {
                $this->addUsingAlias(KeywordTableMap::COL_ARTICLE_ID, $articleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($articleId['max'])) {
                $this->addUsingAlias(KeywordTableMap::COL_ARTICLE_ID, $articleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeywordTableMap::COL_ARTICLE_ID, $articleId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKeywordQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeywordTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query by a related \SciMS\Models\Article object
     *
     * @param \SciMS\Models\Article|ObjectCollection $article The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildKeywordQuery The current query, for fluid interface
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof \SciMS\Models\Article) {
            return $this
                ->addUsingAlias(KeywordTableMap::COL_ARTICLE_ID, $article->getId(), $comparison);
        } elseif ($article instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KeywordTableMap::COL_ARTICLE_ID, $article->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByArticle() only accepts arguments of type \SciMS\Models\Article or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Article relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildKeywordQuery The current query, for fluid interface
     */
    public function joinArticle($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Article');

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
            $this->addJoinObject($join, 'Article');
        }

        return $this;
    }

    /**
     * Use the Article relation Article object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SciMS\Models\ArticleQuery A secondary query class using the current class as primary query
     */
    public function useArticleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinArticle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Article', '\SciMS\Models\ArticleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKeyword $keyword Object to remove from the list of results
     *
     * @return $this|ChildKeywordQuery The current query, for fluid interface
     */
    public function prune($keyword = null)
    {
        if ($keyword) {
            $this->addUsingAlias(KeywordTableMap::COL_ID, $keyword->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the keyword table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KeywordTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KeywordTableMap::clearInstancePool();
            KeywordTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KeywordTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KeywordTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KeywordTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KeywordTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KeywordQuery

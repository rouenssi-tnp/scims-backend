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
use SciMS\Models\Category as ChildCategory;
use SciMS\Models\CategoryQuery as ChildCategoryQuery;
use SciMS\Models\Map\CategoryTableMap;

/**
 * Base class that represents a query for the 'category' table.
 *
 *
 *
 * @method     ChildCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCategoryQuery orderByParentCategoryId($order = Criteria::ASC) Order by the parent_category_id column
 *
 * @method     ChildCategoryQuery groupById() Group by the id column
 * @method     ChildCategoryQuery groupByName() Group by the name column
 * @method     ChildCategoryQuery groupByParentCategoryId() Group by the parent_category_id column
 *
 * @method     ChildCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCategoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCategoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCategoryQuery leftJoinParentCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ParentCategory relation
 * @method     ChildCategoryQuery rightJoinParentCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ParentCategory relation
 * @method     ChildCategoryQuery innerJoinParentCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ParentCategory relation
 *
 * @method     ChildCategoryQuery joinWithParentCategory($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ParentCategory relation
 *
 * @method     ChildCategoryQuery leftJoinWithParentCategory() Adds a LEFT JOIN clause and with to the query using the ParentCategory relation
 * @method     ChildCategoryQuery rightJoinWithParentCategory() Adds a RIGHT JOIN clause and with to the query using the ParentCategory relation
 * @method     ChildCategoryQuery innerJoinWithParentCategory() Adds a INNER JOIN clause and with to the query using the ParentCategory relation
 *
 * @method     ChildCategoryQuery leftJoinArticleRelatedByCategoryId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArticleRelatedByCategoryId relation
 * @method     ChildCategoryQuery rightJoinArticleRelatedByCategoryId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArticleRelatedByCategoryId relation
 * @method     ChildCategoryQuery innerJoinArticleRelatedByCategoryId($relationAlias = null) Adds a INNER JOIN clause to the query using the ArticleRelatedByCategoryId relation
 *
 * @method     ChildCategoryQuery joinWithArticleRelatedByCategoryId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ArticleRelatedByCategoryId relation
 *
 * @method     ChildCategoryQuery leftJoinWithArticleRelatedByCategoryId() Adds a LEFT JOIN clause and with to the query using the ArticleRelatedByCategoryId relation
 * @method     ChildCategoryQuery rightJoinWithArticleRelatedByCategoryId() Adds a RIGHT JOIN clause and with to the query using the ArticleRelatedByCategoryId relation
 * @method     ChildCategoryQuery innerJoinWithArticleRelatedByCategoryId() Adds a INNER JOIN clause and with to the query using the ArticleRelatedByCategoryId relation
 *
 * @method     ChildCategoryQuery leftJoinArticleRelatedBySubcategoryId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArticleRelatedBySubcategoryId relation
 * @method     ChildCategoryQuery rightJoinArticleRelatedBySubcategoryId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArticleRelatedBySubcategoryId relation
 * @method     ChildCategoryQuery innerJoinArticleRelatedBySubcategoryId($relationAlias = null) Adds a INNER JOIN clause to the query using the ArticleRelatedBySubcategoryId relation
 *
 * @method     ChildCategoryQuery joinWithArticleRelatedBySubcategoryId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ArticleRelatedBySubcategoryId relation
 *
 * @method     ChildCategoryQuery leftJoinWithArticleRelatedBySubcategoryId() Adds a LEFT JOIN clause and with to the query using the ArticleRelatedBySubcategoryId relation
 * @method     ChildCategoryQuery rightJoinWithArticleRelatedBySubcategoryId() Adds a RIGHT JOIN clause and with to the query using the ArticleRelatedBySubcategoryId relation
 * @method     ChildCategoryQuery innerJoinWithArticleRelatedBySubcategoryId() Adds a INNER JOIN clause and with to the query using the ArticleRelatedBySubcategoryId relation
 *
 * @method     ChildCategoryQuery leftJoinCategoryRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryRelatedById relation
 * @method     ChildCategoryQuery rightJoinCategoryRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryRelatedById relation
 * @method     ChildCategoryQuery innerJoinCategoryRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryRelatedById relation
 *
 * @method     ChildCategoryQuery joinWithCategoryRelatedById($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CategoryRelatedById relation
 *
 * @method     ChildCategoryQuery leftJoinWithCategoryRelatedById() Adds a LEFT JOIN clause and with to the query using the CategoryRelatedById relation
 * @method     ChildCategoryQuery rightJoinWithCategoryRelatedById() Adds a RIGHT JOIN clause and with to the query using the CategoryRelatedById relation
 * @method     ChildCategoryQuery innerJoinWithCategoryRelatedById() Adds a INNER JOIN clause and with to the query using the CategoryRelatedById relation
 *
 * @method     \SciMS\Models\CategoryQuery|\SciMS\Models\ArticleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCategory findOne(ConnectionInterface $con = null) Return the first ChildCategory matching the query
 * @method     ChildCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCategory matching the query, or a new ChildCategory object populated from the query conditions when no match is found
 *
 * @method     ChildCategory findOneById(int $id) Return the first ChildCategory filtered by the id column
 * @method     ChildCategory findOneByName(string $name) Return the first ChildCategory filtered by the name column
 * @method     ChildCategory findOneByParentCategoryId(int $parent_category_id) Return the first ChildCategory filtered by the parent_category_id column *

 * @method     ChildCategory requirePk($key, ConnectionInterface $con = null) Return the ChildCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOne(ConnectionInterface $con = null) Return the first ChildCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategory requireOneById(int $id) Return the first ChildCategory filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByName(string $name) Return the first ChildCategory filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByParentCategoryId(int $parent_category_id) Return the first ChildCategory filtered by the parent_category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCategory objects based on current ModelCriteria
 * @method     ChildCategory[]|ObjectCollection findById(int $id) Return ChildCategory objects filtered by the id column
 * @method     ChildCategory[]|ObjectCollection findByName(string $name) Return ChildCategory objects filtered by the name column
 * @method     ChildCategory[]|ObjectCollection findByParentCategoryId(int $parent_category_id) Return ChildCategory objects filtered by the parent_category_id column
 * @method     ChildCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \SciMS\Models\Base\CategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'scims', $modelName = '\\SciMS\\Models\\Category', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCategoryQuery) {
            return $criteria;
        }
        $query = new ChildCategoryQuery();
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
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CategoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CategoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, parent_category_id FROM category WHERE id = :p0';
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
            /** @var ChildCategory $obj */
            $obj = new ChildCategory();
            $obj->hydrate($row);
            CategoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the parent_category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentCategoryId(1234); // WHERE parent_category_id = 1234
     * $query->filterByParentCategoryId(array(12, 34)); // WHERE parent_category_id IN (12, 34)
     * $query->filterByParentCategoryId(array('min' => 12)); // WHERE parent_category_id > 12
     * </code>
     *
     * @see       filterByParentCategory()
     *
     * @param     mixed $parentCategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByParentCategoryId($parentCategoryId = null, $comparison = null)
    {
        if (is_array($parentCategoryId)) {
            $useMinMax = false;
            if (isset($parentCategoryId['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_PARENT_CATEGORY_ID, $parentCategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentCategoryId['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_PARENT_CATEGORY_ID, $parentCategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_PARENT_CATEGORY_ID, $parentCategoryId, $comparison);
    }

    /**
     * Filter the query by a related \SciMS\Models\Category object
     *
     * @param \SciMS\Models\Category|ObjectCollection $category The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByParentCategory($category, $comparison = null)
    {
        if ($category instanceof \SciMS\Models\Category) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_PARENT_CATEGORY_ID, $category->getId(), $comparison);
        } elseif ($category instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CategoryTableMap::COL_PARENT_CATEGORY_ID, $category->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByParentCategory() only accepts arguments of type \SciMS\Models\Category or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ParentCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function joinParentCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ParentCategory');

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
            $this->addJoinObject($join, 'ParentCategory');
        }

        return $this;
    }

    /**
     * Use the ParentCategory relation Category object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SciMS\Models\CategoryQuery A secondary query class using the current class as primary query
     */
    public function useParentCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinParentCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ParentCategory', '\SciMS\Models\CategoryQuery');
    }

    /**
     * Filter the query by a related \SciMS\Models\Article object
     *
     * @param \SciMS\Models\Article|ObjectCollection $article the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByArticleRelatedByCategoryId($article, $comparison = null)
    {
        if ($article instanceof \SciMS\Models\Article) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_ID, $article->getCategoryId(), $comparison);
        } elseif ($article instanceof ObjectCollection) {
            return $this
                ->useArticleRelatedByCategoryIdQuery()
                ->filterByPrimaryKeys($article->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArticleRelatedByCategoryId() only accepts arguments of type \SciMS\Models\Article or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArticleRelatedByCategoryId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function joinArticleRelatedByCategoryId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArticleRelatedByCategoryId');

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
            $this->addJoinObject($join, 'ArticleRelatedByCategoryId');
        }

        return $this;
    }

    /**
     * Use the ArticleRelatedByCategoryId relation Article object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SciMS\Models\ArticleQuery A secondary query class using the current class as primary query
     */
    public function useArticleRelatedByCategoryIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinArticleRelatedByCategoryId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArticleRelatedByCategoryId', '\SciMS\Models\ArticleQuery');
    }

    /**
     * Filter the query by a related \SciMS\Models\Article object
     *
     * @param \SciMS\Models\Article|ObjectCollection $article the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByArticleRelatedBySubcategoryId($article, $comparison = null)
    {
        if ($article instanceof \SciMS\Models\Article) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_ID, $article->getSubcategoryId(), $comparison);
        } elseif ($article instanceof ObjectCollection) {
            return $this
                ->useArticleRelatedBySubcategoryIdQuery()
                ->filterByPrimaryKeys($article->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArticleRelatedBySubcategoryId() only accepts arguments of type \SciMS\Models\Article or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArticleRelatedBySubcategoryId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function joinArticleRelatedBySubcategoryId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArticleRelatedBySubcategoryId');

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
            $this->addJoinObject($join, 'ArticleRelatedBySubcategoryId');
        }

        return $this;
    }

    /**
     * Use the ArticleRelatedBySubcategoryId relation Article object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SciMS\Models\ArticleQuery A secondary query class using the current class as primary query
     */
    public function useArticleRelatedBySubcategoryIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinArticleRelatedBySubcategoryId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArticleRelatedBySubcategoryId', '\SciMS\Models\ArticleQuery');
    }

    /**
     * Filter the query by a related \SciMS\Models\Category object
     *
     * @param \SciMS\Models\Category|ObjectCollection $category the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryRelatedById($category, $comparison = null)
    {
        if ($category instanceof \SciMS\Models\Category) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_ID, $category->getParentCategoryId(), $comparison);
        } elseif ($category instanceof ObjectCollection) {
            return $this
                ->useCategoryRelatedByIdQuery()
                ->filterByPrimaryKeys($category->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCategoryRelatedById() only accepts arguments of type \SciMS\Models\Category or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function joinCategoryRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryRelatedById');

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
            $this->addJoinObject($join, 'CategoryRelatedById');
        }

        return $this;
    }

    /**
     * Use the CategoryRelatedById relation Category object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SciMS\Models\CategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCategoryRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryRelatedById', '\SciMS\Models\CategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCategory $category Object to remove from the list of results
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function prune($category = null)
    {
        if ($category) {
            $this->addUsingAlias(CategoryTableMap::COL_ID, $category->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategoryTableMap::clearInstancePool();
            CategoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CategoryQuery

<?php

namespace Test\Models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Test\Models\Book as ChildBook;
use Test\Models\BookQuery as ChildBookQuery;
use Test\Models\Map\BookTableMap;

/**
 * Base class that represents a query for the 'nft__books' table.
 *
 *
 *
 * @method     ChildBookQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBookQuery orderByCrdate($order = Criteria::ASC) Order by the crdate column
 * @method     ChildBookQuery orderByTstamp($order = Criteria::ASC) Order by the tstamp column
 * @method     ChildBookQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildBookQuery orderBySubtitle($order = Criteria::ASC) Order by the subtitle column
 * @method     ChildBookQuery orderByTotalPages($order = Criteria::ASC) Order by the total_pages column
 * @method     ChildBookQuery orderByPublishDate($order = Criteria::ASC) Order by the publish_date column
 * @method     ChildBookQuery orderByAbstract($order = Criteria::ASC) Order by the abstract column
 * @method     ChildBookQuery orderByGenreId($order = Criteria::ASC) Order by the genre_id column
 * @method     ChildBookQuery orderByAuthorId($order = Criteria::ASC) Order by the author_id column
 *
 * @method     ChildBookQuery groupById() Group by the id column
 * @method     ChildBookQuery groupByCrdate() Group by the crdate column
 * @method     ChildBookQuery groupByTstamp() Group by the tstamp column
 * @method     ChildBookQuery groupByTitle() Group by the title column
 * @method     ChildBookQuery groupBySubtitle() Group by the subtitle column
 * @method     ChildBookQuery groupByTotalPages() Group by the total_pages column
 * @method     ChildBookQuery groupByPublishDate() Group by the publish_date column
 * @method     ChildBookQuery groupByAbstract() Group by the abstract column
 * @method     ChildBookQuery groupByGenreId() Group by the genre_id column
 * @method     ChildBookQuery groupByAuthorId() Group by the author_id column
 *
 * @method     ChildBookQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method     ChildBookQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method     ChildBookQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method     ChildBookQuery joinWithAuthor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Author relation
 *
 * @method     ChildBookQuery leftJoinWithAuthor() Adds a LEFT JOIN clause and with to the query using the Author relation
 * @method     ChildBookQuery rightJoinWithAuthor() Adds a RIGHT JOIN clause and with to the query using the Author relation
 * @method     ChildBookQuery innerJoinWithAuthor() Adds a INNER JOIN clause and with to the query using the Author relation
 *
 * @method     ChildBookQuery leftJoinChapter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Chapter relation
 * @method     ChildBookQuery rightJoinChapter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Chapter relation
 * @method     ChildBookQuery innerJoinChapter($relationAlias = null) Adds a INNER JOIN clause to the query using the Chapter relation
 *
 * @method     ChildBookQuery joinWithChapter($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Chapter relation
 *
 * @method     ChildBookQuery leftJoinWithChapter() Adds a LEFT JOIN clause and with to the query using the Chapter relation
 * @method     ChildBookQuery rightJoinWithChapter() Adds a RIGHT JOIN clause and with to the query using the Chapter relation
 * @method     ChildBookQuery innerJoinWithChapter() Adds a INNER JOIN clause and with to the query using the Chapter relation
 *
 * @method     ChildBookQuery leftJoinBookstoreBook($relationAlias = null) Adds a LEFT JOIN clause to the query using the BookstoreBook relation
 * @method     ChildBookQuery rightJoinBookstoreBook($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BookstoreBook relation
 * @method     ChildBookQuery innerJoinBookstoreBook($relationAlias = null) Adds a INNER JOIN clause to the query using the BookstoreBook relation
 *
 * @method     ChildBookQuery joinWithBookstoreBook($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the BookstoreBook relation
 *
 * @method     ChildBookQuery leftJoinWithBookstoreBook() Adds a LEFT JOIN clause and with to the query using the BookstoreBook relation
 * @method     ChildBookQuery rightJoinWithBookstoreBook() Adds a RIGHT JOIN clause and with to the query using the BookstoreBook relation
 * @method     ChildBookQuery innerJoinWithBookstoreBook() Adds a INNER JOIN clause and with to the query using the BookstoreBook relation
 *
 * @method     \Test\Models\AuthorQuery|\Test\Models\ChapterQuery|\Test\Models\BookstoreBookQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBook findOne(ConnectionInterface $con = null) Return the first ChildBook matching the query
 * @method     ChildBook findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBook matching the query, or a new ChildBook object populated from the query conditions when no match is found
 *
 * @method     ChildBook findOneById(int $id) Return the first ChildBook filtered by the id column
 * @method     ChildBook findOneByCrdate(int $crdate) Return the first ChildBook filtered by the crdate column
 * @method     ChildBook findOneByTstamp(int $tstamp) Return the first ChildBook filtered by the tstamp column
 * @method     ChildBook findOneByTitle(string $title) Return the first ChildBook filtered by the title column
 * @method     ChildBook findOneBySubtitle(string $subtitle) Return the first ChildBook filtered by the subtitle column
 * @method     ChildBook findOneByTotalPages(int $total_pages) Return the first ChildBook filtered by the total_pages column
 * @method     ChildBook findOneByPublishDate(int $publish_date) Return the first ChildBook filtered by the publish_date column
 * @method     ChildBook findOneByAbstract(string $abstract) Return the first ChildBook filtered by the abstract column
 * @method     ChildBook findOneByGenreId(int $genre_id) Return the first ChildBook filtered by the genre_id column
 * @method     ChildBook findOneByAuthorId(int $author_id) Return the first ChildBook filtered by the author_id column *

 * @method     ChildBook requirePk($key, ConnectionInterface $con = null) Return the ChildBook by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOne(ConnectionInterface $con = null) Return the first ChildBook matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBook requireOneById(int $id) Return the first ChildBook filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByCrdate(int $crdate) Return the first ChildBook filtered by the crdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByTstamp(int $tstamp) Return the first ChildBook filtered by the tstamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByTitle(string $title) Return the first ChildBook filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneBySubtitle(string $subtitle) Return the first ChildBook filtered by the subtitle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByTotalPages(int $total_pages) Return the first ChildBook filtered by the total_pages column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByPublishDate(int $publish_date) Return the first ChildBook filtered by the publish_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByAbstract(string $abstract) Return the first ChildBook filtered by the abstract column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByGenreId(int $genre_id) Return the first ChildBook filtered by the genre_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBook requireOneByAuthorId(int $author_id) Return the first ChildBook filtered by the author_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBook[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBook objects based on current ModelCriteria
 * @method     ChildBook[]|ObjectCollection findById(int $id) Return ChildBook objects filtered by the id column
 * @method     ChildBook[]|ObjectCollection findByCrdate(int $crdate) Return ChildBook objects filtered by the crdate column
 * @method     ChildBook[]|ObjectCollection findByTstamp(int $tstamp) Return ChildBook objects filtered by the tstamp column
 * @method     ChildBook[]|ObjectCollection findByTitle(string $title) Return ChildBook objects filtered by the title column
 * @method     ChildBook[]|ObjectCollection findBySubtitle(string $subtitle) Return ChildBook objects filtered by the subtitle column
 * @method     ChildBook[]|ObjectCollection findByTotalPages(int $total_pages) Return ChildBook objects filtered by the total_pages column
 * @method     ChildBook[]|ObjectCollection findByPublishDate(int $publish_date) Return ChildBook objects filtered by the publish_date column
 * @method     ChildBook[]|ObjectCollection findByAbstract(string $abstract) Return ChildBook objects filtered by the abstract column
 * @method     ChildBook[]|ObjectCollection findByGenreId(int $genre_id) Return ChildBook objects filtered by the genre_id column
 * @method     ChildBook[]|ObjectCollection findByAuthorId(int $author_id) Return ChildBook objects filtered by the author_id column
 * @method     ChildBook[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BookQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Test\Models\Base\BookQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'nf_test', $modelName = '\\Test\\Models\\Book', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBookQuery) {
            return $criteria;
        }
        $query = new ChildBookQuery();
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
     * @return ChildBook|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BookTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBook A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, crdate, tstamp, title, subtitle, total_pages, publish_date, abstract, genre_id, author_id FROM nft__books WHERE id = :p0';
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
            /** @var ChildBook $obj */
            $obj = new ChildBook();
            $obj->hydrate($row);
            BookTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBook|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BookTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BookTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BookTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BookTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the crdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCrdate(1234); // WHERE crdate = 1234
     * $query->filterByCrdate(array(12, 34)); // WHERE crdate IN (12, 34)
     * $query->filterByCrdate(array('min' => 12)); // WHERE crdate > 12
     * </code>
     *
     * @param     mixed $crdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByCrdate($crdate = null, $comparison = null)
    {
        if (is_array($crdate)) {
            $useMinMax = false;
            if (isset($crdate['min'])) {
                $this->addUsingAlias(BookTableMap::COL_CRDATE, $crdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crdate['max'])) {
                $this->addUsingAlias(BookTableMap::COL_CRDATE, $crdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_CRDATE, $crdate, $comparison);
    }

    /**
     * Filter the query on the tstamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTstamp(1234); // WHERE tstamp = 1234
     * $query->filterByTstamp(array(12, 34)); // WHERE tstamp IN (12, 34)
     * $query->filterByTstamp(array('min' => 12)); // WHERE tstamp > 12
     * </code>
     *
     * @param     mixed $tstamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByTstamp($tstamp = null, $comparison = null)
    {
        if (is_array($tstamp)) {
            $useMinMax = false;
            if (isset($tstamp['min'])) {
                $this->addUsingAlias(BookTableMap::COL_TSTAMP, $tstamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstamp['max'])) {
                $this->addUsingAlias(BookTableMap::COL_TSTAMP, $tstamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_TSTAMP, $tstamp, $comparison);
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
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the subtitle column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtitle('fooValue');   // WHERE subtitle = 'fooValue'
     * $query->filterBySubtitle('%fooValue%', Criteria::LIKE); // WHERE subtitle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subtitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterBySubtitle($subtitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subtitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_SUBTITLE, $subtitle, $comparison);
    }

    /**
     * Filter the query on the total_pages column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPages(1234); // WHERE total_pages = 1234
     * $query->filterByTotalPages(array(12, 34)); // WHERE total_pages IN (12, 34)
     * $query->filterByTotalPages(array('min' => 12)); // WHERE total_pages > 12
     * </code>
     *
     * @param     mixed $totalPages The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByTotalPages($totalPages = null, $comparison = null)
    {
        if (is_array($totalPages)) {
            $useMinMax = false;
            if (isset($totalPages['min'])) {
                $this->addUsingAlias(BookTableMap::COL_TOTAL_PAGES, $totalPages['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPages['max'])) {
                $this->addUsingAlias(BookTableMap::COL_TOTAL_PAGES, $totalPages['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_TOTAL_PAGES, $totalPages, $comparison);
    }

    /**
     * Filter the query on the publish_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPublishDate(1234); // WHERE publish_date = 1234
     * $query->filterByPublishDate(array(12, 34)); // WHERE publish_date IN (12, 34)
     * $query->filterByPublishDate(array('min' => 12)); // WHERE publish_date > 12
     * </code>
     *
     * @param     mixed $publishDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByPublishDate($publishDate = null, $comparison = null)
    {
        if (is_array($publishDate)) {
            $useMinMax = false;
            if (isset($publishDate['min'])) {
                $this->addUsingAlias(BookTableMap::COL_PUBLISH_DATE, $publishDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publishDate['max'])) {
                $this->addUsingAlias(BookTableMap::COL_PUBLISH_DATE, $publishDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_PUBLISH_DATE, $publishDate, $comparison);
    }

    /**
     * Filter the query on the abstract column
     *
     * Example usage:
     * <code>
     * $query->filterByAbstract('fooValue');   // WHERE abstract = 'fooValue'
     * $query->filterByAbstract('%fooValue%', Criteria::LIKE); // WHERE abstract LIKE '%fooValue%'
     * </code>
     *
     * @param     string $abstract The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByAbstract($abstract = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($abstract)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_ABSTRACT, $abstract, $comparison);
    }

    /**
     * Filter the query on the genre_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGenreId(1234); // WHERE genre_id = 1234
     * $query->filterByGenreId(array(12, 34)); // WHERE genre_id IN (12, 34)
     * $query->filterByGenreId(array('min' => 12)); // WHERE genre_id > 12
     * </code>
     *
     * @param     mixed $genreId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByGenreId($genreId = null, $comparison = null)
    {
        if (is_array($genreId)) {
            $useMinMax = false;
            if (isset($genreId['min'])) {
                $this->addUsingAlias(BookTableMap::COL_GENRE_ID, $genreId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($genreId['max'])) {
                $this->addUsingAlias(BookTableMap::COL_GENRE_ID, $genreId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_GENRE_ID, $genreId, $comparison);
    }

    /**
     * Filter the query on the author_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorId(1234); // WHERE author_id = 1234
     * $query->filterByAuthorId(array(12, 34)); // WHERE author_id IN (12, 34)
     * $query->filterByAuthorId(array('min' => 12)); // WHERE author_id > 12
     * </code>
     *
     * @see       filterByAuthor()
     *
     * @param     mixed $authorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByAuthorId($authorId = null, $comparison = null)
    {
        if (is_array($authorId)) {
            $useMinMax = false;
            if (isset($authorId['min'])) {
                $this->addUsingAlias(BookTableMap::COL_AUTHOR_ID, $authorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorId['max'])) {
                $this->addUsingAlias(BookTableMap::COL_AUTHOR_ID, $authorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_AUTHOR_ID, $authorId, $comparison);
    }

    /**
     * Filter the query by a related \Test\Models\Author object
     *
     * @param \Test\Models\Author|ObjectCollection $author The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBookQuery The current query, for fluid interface
     */
    public function filterByAuthor($author, $comparison = null)
    {
        if ($author instanceof \Test\Models\Author) {
            return $this
                ->addUsingAlias(BookTableMap::COL_AUTHOR_ID, $author->getId(), $comparison);
        } elseif ($author instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BookTableMap::COL_AUTHOR_ID, $author->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAuthor() only accepts arguments of type \Test\Models\Author or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Author relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function joinAuthor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Author');

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
            $this->addJoinObject($join, 'Author');
        }

        return $this;
    }

    /**
     * Use the Author relation Author object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Test\Models\AuthorQuery A secondary query class using the current class as primary query
     */
    public function useAuthorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAuthor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Author', '\Test\Models\AuthorQuery');
    }

    /**
     * Filter the query by a related \Test\Models\Chapter object
     *
     * @param \Test\Models\Chapter|ObjectCollection $chapter the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookQuery The current query, for fluid interface
     */
    public function filterByChapter($chapter, $comparison = null)
    {
        if ($chapter instanceof \Test\Models\Chapter) {
            return $this
                ->addUsingAlias(BookTableMap::COL_ID, $chapter->getBookId(), $comparison);
        } elseif ($chapter instanceof ObjectCollection) {
            return $this
                ->useChapterQuery()
                ->filterByPrimaryKeys($chapter->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByChapter() only accepts arguments of type \Test\Models\Chapter or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Chapter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function joinChapter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Chapter');

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
            $this->addJoinObject($join, 'Chapter');
        }

        return $this;
    }

    /**
     * Use the Chapter relation Chapter object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Test\Models\ChapterQuery A secondary query class using the current class as primary query
     */
    public function useChapterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChapter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Chapter', '\Test\Models\ChapterQuery');
    }

    /**
     * Filter the query by a related \Test\Models\BookstoreBook object
     *
     * @param \Test\Models\BookstoreBook|ObjectCollection $bookstoreBook the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookQuery The current query, for fluid interface
     */
    public function filterByBookstoreBook($bookstoreBook, $comparison = null)
    {
        if ($bookstoreBook instanceof \Test\Models\BookstoreBook) {
            return $this
                ->addUsingAlias(BookTableMap::COL_ID, $bookstoreBook->getBookId(), $comparison);
        } elseif ($bookstoreBook instanceof ObjectCollection) {
            return $this
                ->useBookstoreBookQuery()
                ->filterByPrimaryKeys($bookstoreBook->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBookstoreBook() only accepts arguments of type \Test\Models\BookstoreBook or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BookstoreBook relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function joinBookstoreBook($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BookstoreBook');

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
            $this->addJoinObject($join, 'BookstoreBook');
        }

        return $this;
    }

    /**
     * Use the BookstoreBook relation BookstoreBook object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Test\Models\BookstoreBookQuery A secondary query class using the current class as primary query
     */
    public function useBookstoreBookQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBookstoreBook($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BookstoreBook', '\Test\Models\BookstoreBookQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBook $book Object to remove from the list of results
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function prune($book = null)
    {
        if ($book) {
            $this->addUsingAlias(BookTableMap::COL_ID, $book->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the nft__books table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookTableMap::clearInstancePool();
            BookTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BookQuery

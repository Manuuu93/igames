<?php

namespace components;

class Db
{
    use Singleton;

    protected $dbh;

    /**
     * Db constructor.
     */
    protected function __construct()
    {
        $config = Config::instance();
        $host = $config->data['db']['host'];
        $dbname = $config->data['db']['dbname'];
        $user = $config->data['db']['user'];
        $password = $config->data['db']['password'];

        $this->dbh = new \PDO('mysql:host=' . $host . '; dbname=' . $dbname, $user, $password);
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        var_dump($sth->errorInfo());

        return $res;
    }

    /**
     * @param $sql
     * @param $class
     * @param array $params
     * @return array
     */
    public function query($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        return [];
    }

    /**
     * @return string
     */
    public function getLastInsertedId()
    {
        return $this->dbh->lastInsertId();
    }
}

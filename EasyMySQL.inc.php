<?php
/**
 * EasyMySQLi is a wrapper for easy access to MySQLi-Library
 *
 * @author Alexander Täffner <support+opensource_AT_firesplash_DOT_de>
 * @version 1.0
 *
 * @link https://git.firesplash.de/open-source-php/EasyMySQLi Our GitLab Project Page
 * @see examples.php
 * @copyright Alexander Täffner
 * @license Apache License 2.0
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.00
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
/**
 * Exception-Class for general MySQLi-Statement-Errors
 */
class MySQLiException extends Exception {}
/**
 * Exception-Class for general MySQLi-Statement-Errors
 */
class MySQLiConnectException extends MySQLiException {}
/**
 * Exception-Class for Query-Related MySQLi-Errors
 */
class MySQLiQueryException extends MySQLiException {
    /**
     * Stores the query for the catcher for debug reasons
     */
    protected $query;

    /**
     * Stores the error number for the catcher for debug reasons
     */
    protected $errno;

    /**
     * Stores the error string for the catcher for debug reasons
     */
    protected $error;

    /**
     * Boa Constructor - MySQLiQueryException is a bit different ...
     * @param string query takes the basic query string including question marks
     * @param mysqli_stmt stmt takes the related mysqli_stmt-object
     * @returns the object
     */
    function __construct($query, $stmt) {
        $this->message = $stmt->errno.': '.$stmt->error;
        $this->errno = $stmt->errno;
        $this->error = $stmt->error;
        $this->query = $query;
        $stmt->close();
    }
} //Just a dummy
define('EMYSQLI_BIND_INDEXED', 0b00000001);
define('EMYSQLI_BIND_ASSOC', 0b00000010);
/**
 * This class provides access to the MySQLi-Wrapper.
 * The cool part: It just extends MySQLi so you can use any MySQLi-Method as if
 * you would have initialized MySQLi itself. So if you encounter a point where
 * EasyMySQLi-Methods do not fit you can use the full MySQLi-Feature-Set
 * on EasyMySQLi-Instance.
 *
 * @example examples.php Usage Examples
 * @example examples.php 14 4 Class-Initialization
 * @copyright Alexander Täffner
 * @author Alexander Täffner <support+opensource_AT_firesplash_DOT_de>
 * @license Apache License 2.0
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.00
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 * @link https://git.firesplash.de/open-source-php/EasyMySQLi Our GitLab Project Page
 * @link http://php.net/manual/book.mysqli.php Documentation for PHP's MySQLi-Extension
 * @see examples.php
 */
class EasyMySQLi extends mysqli {
    /**
     * Stores our current mysqli_stmt
     * @ignore private...
     */
    private $_stmt;

    /**
     * Are we running in debug-mode?
     * @ignore private...
     */
    private $debug = false;

    /**
     * Bad programming style? Then this will be set false I guess...
     * @ignore private...
     */
    private $exceptions = true;

    /**
     * Selfmade result array
     * @ignore private...
     */
    private $_res;

    /**
     * Will the array contian indexes and/or names?
     * @ignore private...
     */
    private $arraytype = EMYSQLI_BIND_ASSOC;

    /**
     * This is an instance of EasyMySQLiLogger
     */
    private $log = false;

    /**
     * This stores the message for log-lines.
     */
    private $logmsg = 'Query';





    /**
     * Boa Constructor
     * Initializes connection to a MySQL or MariaDB Server (or compatible) and returns the EasyMySQLi-Object.
     * If any optional paremeter is being omitted PHP's defaults will be used.
     * @param string $host MySQL/MariaDB-Host or null to use PHP's defaults.
     * @param string $username Username to use to connect to DB or null to use PHP's defaults.
     * @param string $passwd The password for $username@$host or null to use PHP's defaults.
     * @param string $dbname The name of the database you want to work with
     * @param int $port Optional: The port to connect if using tcp connection
     * @param string $socket Optional: The Socket to use to connect to DB if using local db wit unix socket (localhost)
     * @returns Object The EasyMySQLi-Object assigned to the specified database
     * @throws EasyMySQLiException if connecting fails for any reason
     * @see http://php.net/manual/de/mysqli.construct.php
     */
    function __construct($host, $username, $passwd, $dbname, $port = null , $socket = null) {
        if ($host === null) $host = ini_get("mysqli.default_host");
        if ($username === null) $username = ini_get("mysqli.default_user");
        if ($passwd === null) $passwd = ini_get("mysqli.default_pw");
        if ($port === null) $port = ini_get("mysqli.default_port");
        if ($socket === null) $socket = ini_get("mysqli.default_socket");

        parent::__construct($host, $username, $passwd, $dbname, $port, $socket);
    }



    /**
     * Referencer
     * @param mixed[] $src Array with values
     * @return pointer[] Array of references to the originating array
     * @ignore private...
     */
    private function getRefs(&$src) {
        $r = array();
        foreach ($src as $k => $garbage) $r[$k] = &$src[$k];
        return $r;
    }



    /**
     * Takes a numeric string and returns it's value as eighter int or float
     * @param string $val The source array
     * @param boolean $check optional! check Test the string for being numeric before manipulating (strongly advised)
     * @return int|float the value with correct datatype or false if the given stirng is not numeric
     * @example examples.php 85 6 Usage Examples
     */
    public function str2num($val, $check=true) {
        if ($check && !is_numeric($val)) return false;
        return $val + 0;
    }


    /**
     * Iterates through an array of values and replaces numeric strings with their integer or float values
     * @param mixed[] $array The source array
     * @return array the array with corrected datatypes
     * @example examples.php 93 7 Usage Examples
     */
    public function prepareArray($array) {
        $new = array();
        foreach ($array as $k => $v) {
            if (is_numeric($v))	$new[$k] = $this->str2num($v, false);
            else $new[$k] = $v;
        }
        return $new;
    }


    /**
     * Enables Logging of transactions
     * @param string $fileName The full path to the logfile
     * @param boolean $omitSelects If you want to exclude queries starting with the words 'select' or 'show', then set this to true
     * @return void
     */
    public function enableLogging($fileName, $omitSelects=false) {
        require_once('EasyMySQLiLogger.inc.php');
        $this->omitSelects = $omitSelects;
        $this->log = new EasyMySQLiLogger($fileName);
    }



    /**
     * This method sets a minimalistic descriptive message to be included in log lines from now on.
     * @param string msg The actual message. Should not be too long. Defaults to "Query".
     */
    function setLogMessage($msg) {
        $this->logmsg = $msg;
    }



    /**
     * Sets Debug mode - If enabled every query will simply print debug information.
     * @param boolean $bool the on/off switch: true=on false=off
     * @return void
     * @example examples.php 18 1 Usage Examples
     */
    public function setDebug($bool) {
        $this->debug = $bool;
    }



    /**
     * Configures Errorhandling... some way...
     * @param boolean $bool if set to false every Exception will instead just return null. THIS IS ABSOLUTELY NOT RECOMMENDED! Use catch! This could else completely break functionality
     * @deprecated Do not use if you don't know what you are doing...
     * @return void
     */
    public function setExceptions($bool) {
        $this->exceptions = $bool;
    }


    /**
     * Using this method you can set which type of index your array should have. The parameter is a flag so you could use binary operators to combine them.
     * @param int $typeflags A combination of EMYSQLI_BIND_ASSOC and EMYSQLI_BIND_INDEXED - At least one is needed. Default is EMYSQLI_BIND_ASSOC
     * @return void
     * @throws MySQLiException if flags are not valid
     * @example examples.php 76 6 Usage Examples
     */
    public function setArrayType($typeflags) {
        if (($typeflags & (EMYSQLI_BIND_ASSOC | EMYSQLI_BIND_INDEXED)) == 0) {
            if ($this->exceptions) throw new MySQLiException('You have to select at least one Array-Type-Flag');
            else return null;
        } else {
            $this->arraytype = $typeflags;
        }
    }




    /**
     * Main Intelligence - Really builds and executes the query
     * @param mixed[] $args an array of arguments where first element is the sql query and further elements are parameters.
     * @return boolean true when query has been successfully executed else false
     * @throws MySQLiQueryException if query was invalid
     * @throws MySQLiException if something else goes wrong in MySQLi-Statements
     * @ignore private...
     */
    private function _execute($args) {
        //Health-Check - We chack this here for security reasons as if we would do so in the constructor the connect-line including password might be printed out in clear text (and this is bad)
        if ($this->connect_error) {
            if ($this->exceptions) throw new MySQLiConnectException('Failed to connect to database using specified parameters. Please note: This Error already happenned at Connect-Time when initializing EasyMySQLi. MySQLi-Error: '.$this->connect_errno.': '.$this->connect_error);
            else return null;
        }

        //Init
        $this->_stmt = null;
        $this->_stmt = @$this->stmt_init();
        if ($this->_stmt == null)
            if ($this->exceptions) throw new MySQLiException('Unable to initialize statement');
            else return null;

        //Simple query?
        if (count($args) > 1) {
            if ($this->debug) {
                print "Source-Array:\n";
                print_r($args);
            }
            $this->_stmt->prepare($args[0]);
            if ($this->_stmt->errno > 0) {
                if ($this->exceptions) throw new MySQLiException('MySQLi-Statement-Error '.$this->_stmt->errno.': '.$this->_stmt->error);
                else return null;
            }
            $params = array(0 => '');
            foreach ($args as $k => $v) {
                if ($k == 0) continue; //0 is the query

                //determine data type
                if ($v === null) {
                    if ($this->debug) print "$k identified as being NULL\n";
                    $params[0] .= 'i';
                    $cv = null;
                } else if (is_double($v) || is_float($v)) {
                    if ($this->debug) print "$k identified as being a FLOAT or DOUBLE\n";
                    $params[0] .= 'd';
                    $cv = doubleval($v);
                } else if (is_int($v) || is_long($v)) {
                    if ($this->debug) print "$k identified as being a INT or LONG\n";
                    $params[0] .= 'i';
                    $cv = intval($v);
                } else if (is_string($v)) {
                    if ($this->debug) print "$k identified as being a sexy STRING\n";
                    $params[0] .= 's';
                    $cv = strval($v);
                } else {
                    if ($this->debug) print "$k identified as being a BINARY (BLOB)\n";
                    $params[0] .= 'b';
                    $cv = $v;
                }

                //insert value
                $params[] = $cv;
            }

            if ($this->debug) {
                print "Bind-Array:\n";
                print_r($params);
            }

            //Bind parameters to query
            call_user_func_array(array($this->_stmt, 'bind_param'), $this->getRefs($params));

        } else {
            if ($this->debug) print "Simple query: $args[0]\n";
            $this->_stmt->prepare($args[0]);
            if ($this->_stmt->errno > 0) {
                if ($this->exceptions) throw new MySQLiException('MySQLi-Statement-Error '.$this->_stmt->errno.': '.$this->_stmt->error);
                else return null;
            }
        }

        //HOLD ON! Big Brother might be watching us!
        if ($this->log) {
            if ($this->omitSelects && !in_array(strtolower(substr($args[0], 0, 4)), array('sele', 'show')))
                $this->log->logQuery($args[0], $params, $this->logmsg);
        }
        //3, 2 ,1, FIRE!
        $success = ($this->_stmt->execute() ? true : false);
        if (!$success) {
            if ($this->exceptions) throw new MySQLiQueryException($args[0], $this->_stmt);
            else return null;
        }
        else $this->_res = $this->_stmt->store_result();
        return $success;
    }
    /**
     * binds the result into an array
     * @param boolean $type is a binary flagset of EMYSQLI_BIND_ASSOC and EMYSQLI_BIND_INDEXED (constants)
     * @param int limit maximum amount of rows in _res
     * @ignore private...
     */
    private function _bindRes ($type=false, $limit=false) {
        if (!$type) $type = $this->arraytype;
        $this->_res = array(); //reset
        $raw = array();

        if (($type & EMYSQLI_BIND_ASSOC) == EMYSQLI_BIND_ASSOC) {
            $metadata = $this->_stmt->result_metadata();
            if (!$metadata) throw new MySQLiException('Could not fetch field metadata');
            $fields = $metadata->fetch_fields();
            if (!$fields) if ($this->exceptions) throw new MySQLiException('Could not fetch fields from metadata. Check your query!');
            else return null;
            $cnt = count($fields);
            if (!is_array($fields)) {
                if ($this->exceptions) throw new MySQLiException('Obviously no result has been stored in _stmt');
                else return null;
            }
        } else {
            $cnt = $this->_stmt->field_count;
        }
        if ($this->debug) print "I got ".$cnt." fields in total\n";
        for ($i=0 ; $i<$cnt ; $i++) { //Generate blank result line array
            if ($this->debug) print "Preparing some space for field '".$fields[$i]->name."'\n";
            $raw[] = null;
        }
        if ($this->debug) {
            print "Preapared array looks like that:\n";
            print_r($raw);
        }
        call_user_func_array(array($this->_stmt, 'bind_result'), $this->getRefs($raw)); //Bind $raw to result
        $i=0;
        while ($this->_stmt->fetch()) { //"bind"
            if ($this->debug) {
                print "Next row:\n";
                print_r($raw);
            }
            $tmp = array();
            if (($type & EMYSQLI_BIND_INDEXED) == EMYSQLI_BIND_INDEXED) $tmp = $raw;
            if (($type & EMYSQLI_BIND_ASSOC) == EMYSQLI_BIND_ASSOC) {
                foreach ($raw as $id => $val) {
                    $tmp[$fields[$id]->name] = $val;
                }
            }
            $this->_res[] = $tmp;
            if ($limit && ++$i >= $limit) break;
        }
        if ($this->debug) {
            print "Finished! This is my new data buffer in _res:\n";
            print_r($this->_res);
        }
    }



    /**
     * Executes a query
     * @api NOTE: put your values as additional parameters behind $query!
     * @param string $query The absic MySQL-Query. Use ? for parameters - NOTE: put your values as additional parameters behind $query!
     * @param mixed $parameters...
     * @return boolean true if the query succeeded or false if it failed for some reason.
     * @throws MySQLiQueryException if a MySQL-Error occures while executing the query
     * @throws MySQLiException if something else goes wrong e.g. invalid order of calls when using manual mysqli statements
     * @example examples.php 22 35 Usage Examples
     */
    public function queryNoResult($query) {
        $success = $this->_execute(func_get_args());
        $this->_stmt->free_result();
        $this->_stmt->close();
        return $success;
    }



    /**
     * Executes a query and returns technical information
     * @api NOTE: put your values as additional parameters behind $query!
     * @param string $query The absic MySQL-Query. Use ? for parameters - NOTE: put your values as additional parameters behind $query!
     * @param mixed $parameters...
     * @return mixed[] array with two elements: affected_rows and insert_id - the latter might be null if no insert happened. affected_rows hows the count of *modified* rows
     * @throws MySQLiQueryException if a MySQL-Error occures while executing the query
     * @throws MySQLiException if something else goes wrong e.g. invalid order of calls when using manual mysqli statements
     * @example examples.php 22 35 Usage Examples
     */
    public function queryWithResult($query) {
        $success = $this->_execute(func_get_args());
        $result = array();
        $result['affected_rows'] = $this->_stmt->affected_rows;
        if ($this->_stmt->insert_id) $result['insert_id'] = $this->_stmt->insert_id;
        else $result['insert_id'] = null;
        $this->_stmt->free_result();
        $this->_stmt->close();
        return $result;
    }



    /**
     * Executes a query and returns first line as array
     * @api NOTE: put your values as additional parameters behind $query!
     * @param string $query The absic MySQL-Query. Use ? for parameters - NOTE: put your values as additional parameters behind $query!
     * @param mixed $parameters...
     * @return mixed first field in result set (Like A1 in table calculation)
     * @throws MySQLiQueryException if a MySQL-Error occures while executing the query
     * @throws MySQLiException if something else goes wrong e.g. invalid order of calls when using manual mysqli statements
     * @example examples.php 59 6 Usage Examples
     */
    public function querySingleField($query) {
        $res = $this->_execute(func_get_args());
        $this->_bindRes(EMYSQLI_BIND_INDEXED);
        $this->_stmt->free_result();
        $this->_stmt->close();
        return $this->_res[0][0];
    }

    /**
     * Executes a query and returns first line as array.
     * You can use method setArrayType to switch between indexed and associative as well as mixed type.
     * @api NOTE: put your values as additional parameters behind $query!
     * @param string $query The absic MySQL-Query. Use ? for parameters - NOTE: put your values as additional parameters behind $query!
     * @param mixed $parameters...
     * @return mixed[] array first line of result set as an array or NULL
     * @throws MySQLiQueryException if a MySQL-Error occures while executing the query
     * @throws MySQLiException if something else goes wrong e.g. invalid order of calls when using manual mysqli statements
     * @example examples.php 67 7 Usage Examples
     */
    public function querySingleRow($query) {
        $res = $this->_execute(func_get_args());
        $this->_bindRes($this->arraytype, 1);
        $this->_stmt->free_result();
        $this->_stmt->close();
        return $this->_res[0];
    }

    /**
     * Executes a query and returns the full result set as array.
     * You can use method setArrayType to switch between indexed and associative as well as mixed type.
     * @api NOTE: put your values as additional parameters behind $query!
     * @param string $query The absic MySQL-Query. Use ? for parameters - NOTE: put your values as additional parameters behind $query!
     * @param mixed $parameters...
     * @return mixed[][] array full result as two dimensional array. Dimension 1 are rows (indexed), dimension 2 are values
     * @throws MySQLiQueryException if a MySQL-Error occures while executing the query
     * @throws MySQLiException if something else goes wrong e.g. invalid order of calls when using manual mysqli statements
     * @example examples.php 103 7 Usage Examples
     */
    public function queryAllRows($query) {
        $res = $this->_execute(func_get_args());
        $this->_bindRes();
        $this->_stmt->free_result();
        $this->_stmt->close();
        return $this->_res;
    }

    /**
     * Synonym for queryAllRows
     * @api NOTE: put your values as additional parameters behind $query!
     * @param string $query The absic MySQL-Query. Use ? for parameters - NOTE: put your values as additional parameters behind $query!
     * @param mixed $parameters...
     * @return mixed[][] array full result as two dimensional array. Dimension 1 are rows (indexed), dimension 2 are values
     * @throws MySQLiQueryException if a MySQL-Error occures while executing the query
     * @throws MySQLiException if something else goes wrong e.g. invalid order of calls when using manual mysqli statements
     * @see queryAllRows
     */
    public function queryFullResultSet($query) {
        $args = func_get_args();
        return call_user_func_array(array($this, 'queryAllRows'), $args);
    }

}
?>
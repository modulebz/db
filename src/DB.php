<?
namespace ModuleBZ;
use PDO;
use PDOStatement;

/**
 * Класс для работы с базами данных. Изначально только для PostgreSQL
 * Class DB
 * @package ModuleBZ
 */
class DB {
    /** @var PDO ссылка на подключение к БД */
    protected $DB = null;
    /** @var int переменная для подсчёта времени всех запросов всех соединений */
    protected static $totals_time = 0;
    /** @var int переменная для подсчёта времени всех запросов текущего соединения */
    protected $total_time = 0;
    /** @var int переменная для подсчёта времени сколько ушло на соединение с базой данных */
    protected $connect_time = 0;

    /** @var bool кэшировать ли все запросы, по умолчанию да */
    protected $isQueryLog = true;
    /** @var array кэшируем все запросы */
    protected $query_log = [];


    /** @var string название базы данных */
    protected $dbname;
    /** @var string имя пользователя */
    protected $username;
    /** @var string пароль пользователя */
    protected $password;
    /** @var string адрес базы данных */
    protected $host='127.0.0.1';
    /** @var int порт доступа к базе данных */
    protected $port=5432;
    /** @var array дополнительные опции соединения с базой данных */
    protected $options = [];


    /**
     * DB constructor.
     * @param string $dbname
     * @param string $username
     * @param string $password
     * @param string $host
     * @param int $port
     * @param array $options @see PDO
     */
    function __construct(string $dbname,
                         string $username,
                         string $password,
                         string $host = '127.0.0.1',
                         int    $port = 5432,
                         array  $options = []){
        $this->dbname    = $dbname;
        $this->username  = $username;
        $this->password  = $password;
        $this->host      = $host;
        $this->port      = $port;
        $this->options   = $options;

        $this->connect();
    }

    /**
     * Функция подключения к базе данных, с хранящимися настройками
     * @return DB
     */
    function connect(){
        $dsn = "pgsql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname;
        $time = microtime(true);
        $this->DB = new PDO($dsn,$this->username,$this->password, $this->options);
        $this->connect_time = microtime(true)-$time;
        return $this;
    }
    /**
     * Функция отключения от базы данных
     * @return DB
     */
    function disconnect():DB{
        $this->DB = null;
        return $this;
    }
    /**
     * функция переподключения к базе данных
     * @return DB
     */
    function reconnect():DB{
        $this->disconnect();
        $this->connect();
        return $this;
    }


    /**
     * Функция которая выводит логи в формате таблицы
     * @return string
     */
    function tableLogs():string{
        $table_id = "query_logs".time().rand(1,1000);
        $res =
             '<div>'
            .'<style>'
            .'#'.$table_id.'{font-family: Courier New;border-collapse: collapse;border:1px solid;border-spacing: 0;}'
            .'#'.$table_id.' th,td {padding:5px;border:1px solid black;font-size:13px}'
            .'</style>'
            .'<table id="'.$table_id.'" style="">'.
            '<thead><tr><th>Time</th><th>Success</th><th>Query</th><th>Data</th></tr></thead><tbody>';
        foreach ($this->query_log as $v){
            $res .=
                 '<tr>'
                .'<td style="text-align: right">'.number_format($v['time']*1000,5).'&nbsp;ms</td>'
                .'<td style="text-align: right">'.($v['success']?'true':'<span style="color:red;font-weight: bold">false</span>').'</td>'
                .'<td >'.htmlspecialchars($v['query']).'</td>'
                //.'<td ><pre>'.$data.'</pre></td>'
                .'<td ><pre>'.json_encode($v['data']).'</pre></td>'
                .'</tr>';
        }
        $res .=
             '</tbody>'
            .'<tfoot>'
            .'<th>'.number_format($this->total_time*1000,5).'&nbsp;ms</th>'
            .'</tfoot>'
            .'</table></div>';
        return $res;
    }




}


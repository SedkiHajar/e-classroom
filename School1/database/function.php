<?php define('DBINFO', 'mysql:host=localhost;dbname=school;charset=utf8');
    define('DBUSER','root');
    define('DBPASS','');

    //site
    /*define('DBINFO', 'mysql:host=localhost;dbname=bestmhro_school;charset=utf8');
    define('DBUSER','bestmhro');
    define('DBPASS','5vLY9Io72dKH');*/

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    ?>
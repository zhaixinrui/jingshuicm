<?php  
 
 
class MyMongo {  
    private $mongodb;
    private $dbname;
    private $collectionName;
    private $user;
    private $pass;
    private $mongoClient;
    private $mongoDB;
    private $mongoCollection;
    
    function __construct() {  
        $host                 = Yii::app()->params['mongoHost'];
        $port                 = Yii::app()->params['mongoPort'];
        $this->mongodb        = "mongodb://{$host}:{$port}";
        $this->dbname         = Yii::app()->params['mongoName'];
        $this->collectionName = Yii::app()->params['collectionName'];
        $this->user           = Yii::app()->params['mongoUser'];
        $this->pass           = Yii::app()->params['mongoPass'];
        $this->mongoClient     = null;
        $this->mongoDB         = null;
        $this->mongoCollection = null;
    }  

    function __destruct(){
        $this->disConnect();
    }

    function init() {
    }  

    private function getDb(){
        try{
            $mongoDB = $this->mongoClient->selectDB($this->dbname);
            if('' !== $this->user && '' !== $this->pass){
                $mongoDB->authenticate($this->user, $this->pass);
            }
            return $mongoDB;
        }catch (Exception $e) {
            return null;
        }
    }

    // 建立连接
    private function connect(){
        try{
            $this->mongoClient = new MongoClient($this->mongodb);
            $this->mongoDB     = $this->mongoClient->selectDB($this->dbname);
            if('' !== $this->user && '' !== $this->pass){
                $this->mongoDB->authenticate($this->user, $this->pass);
            }
            $this->mongoCollection = $this->mongoDB->selectCollection($this->collectionName);
        } catch (Exception $e) {
            Yii::log("Connect to mongo fail, Exception: ".$e->getMessage(), 
                     'error', 'application.components.MyMongo');
            $this->mongoClient     = null;
            $this->mongoDB         = null;
            $this->mongoCollection = null;
        }
    }  

    // 断开连接
    private function disConnect(){
        try{
            if(null !== $this->mongoClient){
                $this->mongoClient->close();
            }
        }catch(Exception $e) {
            Yii::trace("disConnect fail, Exception: ".$e->getMessage(), 
                       'application.components.MyMongo');
        }
        $this->mongoClient     = null;
        $this->mongoDB         = null;
        $this->mongoCollection = null;
    }

    // x => 插入点的经度
    // y => 插入点的纬度
    // arrData => 要插入的附加信息
    public function addPoint($x, $y, $arrData = array()){
        try{
            $this->connect();
            $arrData['coordinate']['longitude'] = $x;
            $arrData['coordinate']['latitude']  = $y;
            $ret = $this->mongoCollection->insert($arrData);
            $this->disConnect();
            if($ret['ok']){
                Yii::trace("insert into mongo success! data: ".json_encode($arrData), 
                           'application.components.MyMongo');
                return true;
            }else{
                Yii::log("insert into mongo fail! data:".json_encode($arrData)."ret: ".json_encode($ret), 
                       'error', 'application.components.MyMongo');
                return false;
            }
        } catch (Exception $e) {
            $this->disConnect();
            Yii::log("insert into mongo fail! data:".json_encode($arrData)."ret: ".json_encode($ret), 
                   'error', 'application.components.MyMongo');
            return false;
        }
    }

    // x => 中心点经度，
    // y => 中心点纬度，
    // distance => 距离中心点的距离，单位:千米
    public function findPoints($x, $y, $distance){
        try{
            $x = floatval($x);
            $y = floatval($y);
            $distance = floatval($distance);
            $this->connect();
            $query = array(
                'geoNear'     => $this->collectionName, 
                'near'        => array($x, $y), 
                'spherical'   => true,  
                'distanceMultiplier' => 6371,
                'maxDistance' => $distance/6371, 
                'num'         => 20);
            $query = sprintf('db.runCommand(%s)', json_encode($query));
            $ret = $this->mongoDB->execute($query);
            var_export($ret);
            $this->disConnect();
            if($ret['retval']['ok']){
                Yii::trace("find mongo by cmd: $query success! ret: ".json_encode($ret), 
                           'application.components.MyMongo');
                return $ret['retval'];
            }else{
                Yii::log("find mongo by cmd: $query fail! ret::".json_encode($ret), 
                       'error', 'application.components.MyMongo');
                return null;
            }
        } catch (Exception $e) {
            $this->disConnect();
            Yii::log("find mongo by cmd: $query Exception! err:".$e->getMessage(), 
                   'error', 'application.components.MyMongo');
            return null;
        }
    }

    public function actionIndex()
    {
        try {
            /*建立连接后，在进行集合操作前，需要先select使用的数据库，并进行auth*/
            $mongoClient = new MongoClient("mongodb://{$host}:{$port}");
            $mongoDB     = $mongoClient->selectDB($dbname);
            $mongoDB->authenticate($user, $pass);
         
            /*接下来就可以对该库上的集群进行操作了，具体操作方法请参考php-mongodb官方文档*/
            $mongoCollection = $mongoDB->selectCollection('test');
            $array = array(
                'key1' => 'value1',
            );
            $ret = $mongoCollection->insert($array);
            $mongoCursor = $mongoCollection->find();
            while($mongoCursor->hasNext()) {
                print_r($mongoCursor->getNext());
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}  

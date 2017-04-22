<?php
/*请替换为你自己的数据库名（可从管理中心查看到）*/
$dbname = 'kcsAwtCZlKiObruXGKqb';
 
/*从环境变量里取host,port,user,pwd*/
$host = 'mongo.duapp.com';
$port = '8908';
$user = 'urtgxzMPVigneEyOQF7yzg7C9';
$pwd = '1e0jDqkZ7fUwNgdFD5LzwPY4YAQURFGYM';
 
try {
    /*建立连接后，在进行集合操作前，需要先select使用的数据库，并进行auth*/
    $mongoClient = new MongoClient("mongodb://{$host}:{$port}");
    $mongoDB = $mongoClient->selectDB($dbname);
    $mongoDB->authenticate($user, $pwd);
 
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
?>
<?php
class Engaged extends Model{
    protected static $tableName = 'wp_app_engaged';
    protected static $columns = ['country','date','id_user','type','typeUser'];
    protected static $idTable = 'id_engaged';

}

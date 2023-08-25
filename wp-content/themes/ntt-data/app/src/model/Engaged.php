<?php
class Engaged extends Model{
    protected static $tableName = 'wp_app_engaged';
    protected static $columns = ['country','criation_date','engaged_date','id_engaged','id_user','trashint','type'];
    protected static $idTable = 'id_engaged';

}

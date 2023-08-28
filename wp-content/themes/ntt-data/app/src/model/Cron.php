<?php
class Cron extends Model
{
  const STOPPED = 'stopped';
  protected static $tableName = 'wp_app_time';
  protected static $columns = ['id_time', 'id_user', 'time_start', 'time_stop', 'date', 'trash', 'statis'];
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class verifyApp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // check is this app available
        $is_new = false;
        $file = file_get_contents('./.env', true);
        $content = explode(PHP_EOL, $file);
        $app_url = '';
        $db = '';
        $db_user = '';
        $db_password = '';
        for($i = 0; $i < count($content); $i++) {
            $item_arr = explode("=", $content[$i]);
            if (count($item_arr) > 0 && trim($item_arr[0]) == 'APP_URL') {
                $app_url = $item_arr[1];
            } else if (count($item_arr) > 0 && trim($item_arr[0]) == 'SAAS_APP_DATABASE') {
                $is_new = true;
                $db = $item_arr[1];
            } else if (count($item_arr) > 0 && trim($item_arr[0]) == 'SAAS_APP_DATABASE_USER') {
                $db_user = $item_arr[1];
            } else if (count($item_arr) > 0 && trim($item_arr[0]) == 'SAAS_APP_DATABASE_PASSWORD') {
                $db_password = $item_arr[1];
            }
        }
        if ($is_new) {
            // check database
            $con = mysqli_connect('localhost', $db_user, $db_password) or die('Error connecting to MySQL server: ' . mysql_error());
            // Select database
            mysqli_select_db($con, $db) or die('Error selecting MySQL database: ' . mysql_error());
            $query = "SELECT * FROM apps WHERE url='" . $app_url . "' and deleted_at IS null"; // . $app_url;
            $result = mysqli_query($con, $query);
            $app_id = 0;
            while($obj = $result->fetch_object()){
                $app_id = $obj->id;
            }
            if ($app_id > 0) {
                $query = "SELECT * FROM  app_plans WHERE app_id=" . $app_id . " AND end_date>='" . date("Y-m-d") . "'";
                $result = mysqli_query($con, $query);
                $allowed = false;
                while($obj = $result->fetch_object()){
                    $allowed = true;
                }
                if (!$allowed) {
                    echo "<h1>This app is not allowed</h1>";
                    exit();
                }
            }
        }
        return $next($request);
    }
}

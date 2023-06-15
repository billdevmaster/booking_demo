<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSubscribeController extends Controller
{
    public function index()
    {
        $mysql = $this->get_mysql_connection();
        $plans = [];
        $app = null;
        $app_plans = null;
        if ($mysql['con'] != null) {
            $query = "SELECT * FROM plans WHERE deleted_at IS null";
            $result = mysqli_query($mysql['con'], $query);
            while($obj = $result->fetch_object()){
                array_push($plans, $obj);
            }

            $query = "SELECT * FROM apps WHERE url='https://bookid.ee/test' AND deleted_at IS NULL";
            $result = mysqli_query($mysql['con'], $query);
            while($obj = $result->fetch_object()){
                $app = $obj;
            }
            if ($app) {
                $query = "SELECT * FROM app_plans WHERE app_id=" . $app->id . " ORDER BY end_date DESC limit 1";
                $result = mysqli_query($mysql['con'], $query);
                while($obj = $result->fetch_object()){
                    $app_plans = $obj;
                }
            }
            mysqli_close($mysql['con']);
        }
        $menu = "subscribe";
        return view('backend.subscribe.index', compact("menu", "plans", "app_plans"));
    }

    public function checkout(Request $request)
    {
        $id = $request->id;
        $mysql = $this->get_mysql_connection();
        $app_url = $mysql['app_url'];
        $plan = null;
        $app = null;
        if ($mysql['con'] != null) {
            $query = "SELECT * FROM plans WHERE id=" . $id;
            $result = mysqli_query($mysql['con'], $query);
            while($obj = $result->fetch_object()){
                $plan = $obj;
            }
            $query = "SELECT * FROM apps WHERE url='" . $app_url . "' AND deleted_at IS NULL";
            $result = mysqli_query($mysql['con'], $query);
            while($obj = $result->fetch_object()){
                $app = $obj;
            }
            mysqli_close($mysql['con']);
        }
        $menu = "subscribe";
        return view('backend.subscribe.checkout', compact("menu", "plan", "app"));
    }

    private function get_mysql_connection() {
        $file = file_get_contents('./.env', true);
        $content = explode(PHP_EOL, $file);
        $app_url = '';
        $db = '';
        $db_user = '';
        $db_password = '';
        $plans = [];
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
            mysqli_select_db($con, $db) or die('Error selecting MySQL database: ' . mysql_error());
        } else {
            $con = null;
        }

        return ["con" => $con, "app_url" => 'https://bookid.ee/test'];
    }
}

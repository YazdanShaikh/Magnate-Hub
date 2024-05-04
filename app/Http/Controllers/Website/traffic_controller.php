<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class traffic_controller extends Controller
{
    public function Insert(Request $request){
        if (!session()->get("traffic")) {
            if (Str::contains(request()->getHttpHost(), 'com') == true OR Str::contains(request()->getHttpHost(), 'au') == true) { $ip = $request->ip(); }else{
            $Ips = array("141.32.227.255", "121.71.125.69", "49.69.233.205", "19.121.115.248", "245.20.170.193", "9.88.219.130", "45.70.141.74", "250.153.53.133", "21.232.166.177", "67.211.27.184", "213.208.18.49", "4.156.10.102", "42.57.117.101", "36.47.124.61", "176.53.240.208", "192.131.198.159", "150.38.69.246", "55.191.67.178", "159.163.143.124", "216.109.42.17", "158.146.36.130", "8.178.36.134", "151.179.211.20", "79.129.106.55", "222.33.133.41", "192.47.108.244", "226.220.246.3", "197.183.135.110", "22.23.94.33", "28.32.195.159", "101.69.141.83", "135.145.36.110", "206.20.174.207", "255.0.198.68", "185.160.117.39", "69.5.228.97", "54.167.52.12", "48.6.91.185", "59.58.97.147", "2.102.235.157", "229.89.233.211", "232.42.182.243", "73.119.131.54", "154.228.185.175", "25.254.46.156", "102.149.205.83", "77.126.94.39", "208.235.175.163", "122.50.174.39", "189.210.82.192", "135.149.183.59", "39.145.201.73", "175.220.133.166", "224.4.45.151", "222.140.66.52", "48.27.56.234", "233.67.14.218", "72.214.42.83", "66.192.242.34", "157.145.195.251", "121.149.62.105", "245.70.245.116", "143.41.43.105", "59.215.49.220", "158.75.67.109", "70.223.119.206", "146.55.171.242", "236.25.57.14", "216.243.62.237", "79.147.5.206", "130.248.16.231", "57.202.63.39", "231.37.55.239", "75.84.98.11", "175.165.191.25", "221.254.224.81", "105.74.241.103", "9.166.155.72", "207.229.157.247", "84.70.113.192", "43.18.98.115", "86.108.41.238", "29.149.236.181", "230.219.6.250", "98.21.93.181", "157.61.131.1", "225.187.155.178", "71.98.239.85", "34.9.234.192", "210.74.98.191", "225.247.11.255", "99.123.98.203", "55.89.56.80", "69.111.19.121", "65.175.54.37", "22.46.155.227", "35.212.155.251", "161.52.224.0", "119.226.216.219", "124.105.127.144", "159.111.124.49", "55.110.116.14", "127.240.76.125", "137.16.156.92", "220.237.110.113", "209.22.28.81", "248.13.1.244", "166.166.175.193", "87.1.205.196", "237.12.174.164", "172.57.248.21", "73.45.201.184", "227.84.139.2", "216.254.153.160", "3.119.162.33", "138.64.111.169", "70.117.145.15", "179.132.227.242", "124.23.156.85", "80.53.243.44", "22.26.136.176", "82.219.72.78", "250.4.132.237", "243.197.119.226", "6.100.3.2", "85.203.46.98", "187.137.254.132", "36.166.1.130", "116.120.173.241", "20.202.249.228", "144.204.219.27", "120.189.195.164", "238.232.97.169", "141.252.190.23", "245.112.39.79", "177.122.179.220", "23.144.78.48", "94.243.81.228", "241.29.226.152", "40.144.142.79", "130.237.224.52", "180.189.229.56", "92.191.59.146", "253.216.204.247", "161.162.145.12", "60.126.19.8", "238.115.4.121", "226.29.24.21", "59.250.68.204", "145.112.109.83", "168.187.18.33", "238.75.123.93", "212.132.156.232", "112.91.190.115", "127.24.128.245", "102.187.158.94", "54.57.169.17", "58.67.78.123", "171.227.108.29", "207.250.16.232", "146.248.112.23", "70.51.118.244", "147.16.192.75", "103.255.26.117", "232.201.222.77", "122.102.209.0", "89.162.8.237", "57.165.36.130", "61.139.1.187", "97.230.139.205", "133.206.169.89", "238.90.164.17", "10.194.213.118", "114.98.242.143", "69.82.127.47", "201.236.160.100", "181.239.192.152", "37.42.46.55", "210.152.78.168", "35.193.141.196", "69.220.174.191", "68.199.108.92", "45.161.185.229", "212.48.96.96", "149.106.163.231", "251.20.100.114", "17.90.220.249", "37.249.18.115", "5.51.33.95", "15.159.248.22", "224.128.250.207", "152.139.104.172", "46.211.59.16", "223.55.133.5", "20.125.123.188", "170.212.43.138", "226.123.35.199", "137.77.175.50", "153.251.179.175", "227.12.97.99"); $ip = $Ips[mt_rand(0, 200)];}
                // dd($ip);
            $Info = Location::get($ip);
            $Insert = DB::table('traffic')->insert(['ip' => $ip,'country' => $Info->countryName,'city' => $Info->cityName,'day' => date('d'),'month' => date('m'),'year' => date('Y'),'date' => date('Y-m-d')]);
            $traffic_id = DB::getPdo()->lastInsertId(); $Update = DB::table('traffic')->wheretraffic_id($traffic_id)->update(['code' => md5($traffic_id)]);
            $request->session()->put('traffic', 'Done');
        }
    }
}

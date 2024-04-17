<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    private $bvmsDB;  // connect to bvms database
    private $zabbixDB;   // connect to zabbix DB

    public function __construct()
    {
        parent::__construct();

        $this->bvmsDB = $this->load->database("bvms", TRUE);  // connect to bvms database
        $this->zabbixDB = $this->load->database('zabbix', TRUE);   // connect to zabbix database
    }


    public function insertData($data)
    {
        $this->bvmsDB->insert('tbl_branch_cctv', $data);
    }

    public function getCCTVLogByID($cctvID)
    {
        
        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];

        $whereDate = '';
        if ($startDate != 0 && $endDate != 0) {
            $whereDate .= " AND e.clock BETWEEN '" . $startDate . "' AND '" . $endDate . "'";
        }

        $sql = "SELECT
                h.hostid,
                h.host,
                hg.groupid,
                it.ip as ip,
                DATE_FORMAT(FROM_UNIXTIME(e.clock), '%Y-%m-%d %H:%i:%s') as time,
                e.value as is_down
            FROM
                events e
            INNER JOIN triggers t ON e.objectid = t.triggerid
            INNER JOIN functions f ON t.triggerid = f.triggerid
            INNER JOIN items i ON f.itemid = i.itemid
            INNER JOIN hosts h ON i.hostid = h.hostid
            INNER JOIN hosts_groups hg ON h.hostid = hg.hostid
            INNER JOIN interface it ON h.hostid = it.hostid
            WHERE
                hg.groupid IN (23,24) and h.hostid = '".$cctvID."' " . $whereDate . " ";


        $queryTotal = $this->zabbixDB->query($sql);

        $result['total'] = $queryTotal->result_array();

        return $result;
    }

    public function deleteBranchCCTV($data)
    {

        $this->db->where('branchid', $data['branchid']);
        $this->db->where('hostid', $data['hostid']);

        $data = $this->db->delete('tbl_branch_cctv');

        return $data;
    }

    public function getCCTVTotalHistory($date, $nDate)
    {
        $dataSet = array();

        $sqlTotal = "SELECT count(h.hostid) as totalCCTV
        from hosts h 
        inner join hosts_groups hg on h.hostid = hg.hostid
        where hg.groupid in (22,23,24) 
        group by hg.groupid";

        $queryTotal = $this->zabbixDB->query($sqlTotal);
        $resultTotal = $queryTotal->result_array();

        $startDate = $date;
        for ($i = 1; $i <= $nDate; $i++) {
            $dayAdd = $i;
            $currDate = date('Y-m-d', strtotime("-$dayAdd day", strtotime($startDate)));

            $sqlHTTP = "SELECT COUNT(*) as cctvCount
        FROM (
            SELECT
                h.hostid,
                COUNT(h.hostid) AS ch
            FROM
                events e
            INNER JOIN triggers t ON e.objectid = t.triggerid
            INNER JOIN functions f ON t.triggerid = f.triggerid
            INNER JOIN items i ON f.itemid = i.itemid
            INNER JOIN hosts h ON i.hostid = h.hostid
            INNER JOIN hosts_groups hg ON h.hostid = hg.hostid
            INNER JOIN interface it ON h.hostid = it.hostid
            WHERE
                hg.groupid IN (24)
                AND DATE_FORMAT(FROM_UNIXTIME(e.clock), '%Y-%m-%d') = '$currDate'

            GROUP BY
                h.hostid
            HAVING
                COUNT(h.hostid) % 2 = 1
        ) AS odd_host_counts;
    
        ";

            $sqlHTTPS = "SELECT COUNT(*) as cctvCount
            FROM (
                SELECT
                    h.hostid,
                    COUNT(h.hostid) AS ch
                FROM
                    events e
                INNER JOIN triggers t ON e.objectid = t.triggerid
                INNER JOIN functions f ON t.triggerid = f.triggerid
                INNER JOIN items i ON f.itemid = i.itemid
                INNER JOIN hosts h ON i.hostid = h.hostid
                INNER JOIN hosts_groups hg ON h.hostid = hg.hostid
                INNER JOIN interface it ON h.hostid = it.hostid
                WHERE
                    hg.groupid IN (23)
                    AND DATE_FORMAT(FROM_UNIXTIME(e.clock), '%Y-%m-%d') = '$currDate'

                GROUP BY
                    h.hostid
                HAVING
                    COUNT(h.hostid) % 2 = 1
            ) AS odd_host_counts;
            

            ";

            $queryHTTP = $this->zabbixDB->query($sqlHTTP);
            $queryHTTPS = $this->zabbixDB->query($sqlHTTPS);

            $resultHTTP = $queryHTTP->result_array();
            $resultHTTPS = $queryHTTPS->result_array();

            $result['date'] = $currDate;
            $result['issue_http'] = $resultHTTP[0]['cctvCount'];
            $result['issue_https'] = $resultHTTPS[0]['cctvCount'];
            $result['issue_total'] = $resultHTTP[0]['cctvCount'] + $resultHTTPS[0]['cctvCount'];

            $result['available_https'] = $resultTotal[1]['totalCCTV'] - $resultHTTPS[0]['cctvCount'];
            $result['available_http'] = $resultTotal[2]['totalCCTV'] - $resultHTTP[0]['cctvCount'];
            $result['avaliavle_total'] = $result['available_https'] + $result['available_http'];

            array_push($dataSet, $result);
        }



        /* $result['total_cctv'] = $resultTotal[0]['totalCCTV'];
        $result['total_https'] = $resultTotal[1]['totalCCTV'];
        $result['total_http'] = $resultTotal[2]['totalCCTV']; */

        return $dataSet;
    }

    public function getCCTVIssue($branchID = null)
    {

        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];

        $whereDate = '';
        if ($startDate != 0 && $endDate != 0) {
            $whereDate .= " AND e.clock BETWEEN '" . $startDate . "' AND '" . $endDate . "'";
        }

        $sql = "SELECT
            h.hostid,
            h.host,
            hg.groupid,
            it.ip as ip,
            COUNT(h.hostid) AS ch
        FROM
            events e
        INNER JOIN triggers t ON e.objectid = t.triggerid
        INNER JOIN functions f ON t.triggerid = f.triggerid
        INNER JOIN items i ON f.itemid = i.itemid
        INNER JOIN hosts h ON i.hostid = h.hostid
        INNER JOIN hosts_groups hg ON h.hostid = hg.hostid
        INNER JOIN interface it ON h.hostid = it.hostid
        WHERE
            hg.groupid IN (23,24) " . $whereDate . " 
        GROUP BY
            h.hostid
        HAVING
            COUNT(h.hostid) % 2 = 1";

        $query = $this->zabbixDB->query($sql);
        $cctvIssueData = $query->result_array();

        $branchData = $this->getCCTVBranchData($branchID);

        $cctvData = $this->getCCTVData();

        $dataStatus = [];

        $total_http = [];
        $total_https = [];

        foreach ($branchData as $item2) {
            /* FIND TOTAL */
            if ($item2['groupid'] == '23') {
                $total_https[] = $item2;
            }
            if ($item2['groupid'] == '24') {
                $total_http[] = $item2;
            }
        }

        $issue_http = [];
        $issue_https = [];

        $data_total_issue = [];

        foreach ($cctvIssueData as $item1) {
            $id = $item1['hostid'];

            foreach ($branchData as $item2) {
                if ($item2['hostid'] === $id) {

                    $data_total_issue[] = array_merge($item1, $item2);

                    if ($item1['groupid'] == '23') {
                        $issue_https[] = array_merge($item1, $item2);
                        break;
                    }

                    if ($item1['groupid'] == '24') {
                        $issue_http[] = array_merge($item1, $item2);
                        break;
                    }
                }
            }
        }

        $joinData = [];
        foreach ($cctvData as $item1) {
            $hostid = $item1['hostid'];
            foreach ($branchData as $item2) {
                if ($item2['hostid'] === $hostid) {
                    $joinData[] = array_merge($item1, $item2);
                    break;
                }
            }
        }

        foreach ($joinData as $item) {
            $found = false;
            foreach ($data_total_issue as $issue_item) {
                if ($item['hostid'] === $issue_item['hostid']) {
                    $found = true;
                    break;
                }
            }
            $item['is_cctv_active'] = $found ? '0' : '1'; // Set status based on whether the hostid was found in $data_total_issue
            $dataStatus[] = $item;
        }


        $result['total'] = $dataStatus;

        $result['total_http'] = $total_http;
        $result['total_https'] = $total_https;

        $result['issue_http'] = $issue_http;
        $result['issue_https'] = $issue_https;

        $result['avaliable_http']  =  count($total_http) - count($issue_http);
        $result['avaliable_https']  =  count($total_https) - count($issue_https);

        $result['avaliable_total'] =   $result['avaliable_http'] +  $result['avaliable_https'];

        return $result;
    }

    public function getCCTVTotal()
    {
        $sqlHTTP = "SELECT COUNT(*) as cctvCount
        FROM (
            SELECT
                h.hostid,
                COUNT(h.hostid) AS ch
            FROM
                events e
            INNER JOIN triggers t ON e.objectid = t.triggerid
            INNER JOIN functions f ON t.triggerid = f.triggerid
            INNER JOIN items i ON f.itemid = i.itemid
            INNER JOIN hosts h ON i.hostid = h.hostid
            INNER JOIN hosts_groups hg ON h.hostid = hg.hostid
            WHERE
                hg.groupid IN (24)
            GROUP BY
                h.hostid
            HAVING
                COUNT(h.hostid) % 2 = 1
        ) AS odd_host_counts;
    
        ";

        $sqlHTTPS = "SELECT COUNT(*) as cctvCount
            FROM (
                SELECT
                    h.hostid,
                    COUNT(h.hostid) AS ch
                FROM
                    events e
                INNER JOIN triggers t ON e.objectid = t.triggerid
                INNER JOIN functions f ON t.triggerid = f.triggerid
                INNER JOIN items i ON f.itemid = i.itemid
                INNER JOIN hosts h ON i.hostid = h.hostid
                INNER JOIN hosts_groups hg ON h.hostid = hg.hostid
                WHERE
                    hg.groupid IN (23)
                GROUP BY
                    h.hostid
                HAVING
                    COUNT(h.hostid) % 2 = 1
            ) AS odd_host_counts;
            

            ";

        $sqlTotal = "SELECT count(h.hostid) as totalCCTV
        from hosts h 
        inner join hosts_groups hg on h.hostid = hg.hostid
        where hg.groupid in (22,23,24) 
        group by hg.groupid";


        $queryHTTP = $this->zabbixDB->query($sqlHTTP);
        $queryHTTPS = $this->zabbixDB->query($sqlHTTPS);

        $queryTotal = $this->zabbixDB->query($sqlTotal);


        $resultHTTP = $queryHTTP->result_array();
        $resultHTTPS = $queryHTTPS->result_array();
        $resultTotal = $queryTotal->result_array();


        $result['issue_http'] = $resultHTTP[0]['cctvCount'];
        $result['issue_https'] = $resultHTTPS[0]['cctvCount'];
        $result['issue_total'] = $resultHTTP[0]['cctvCount'] + $resultHTTPS[0]['cctvCount'];

        $result['total_cctv'] = $resultTotal[0]['totalCCTV'];
        $result['total_https'] = $resultTotal[1]['totalCCTV'];
        $result['total_http'] = $resultTotal[2]['totalCCTV'];

        $result['available_https'] = $resultTotal[1]['totalCCTV'] - $resultHTTPS[0]['cctvCount'];
        $result['available_http'] = $resultTotal[2]['totalCCTV'] - $resultHTTP[0]['cctvCount'];
        $result['avaliavle_total'] = $result['available_https'] + $result['available_http'];


        return $result;
    }



    public function getCCTVData()
    {
        $sql = "SELECT * FROM `hosts_groups` as hg
        JOIN hosts  as ho on hg.hostid = ho.hostid
        JOIN hstgrp as hst on hg.groupid = hst.groupid
        INNER JOIN interface it ON ho.hostid = it.hostid
        WHERE hg.groupid in (23,24)

        ;

        ";

        $query = $this->zabbixDB->query($sql);
        $result = $query->result_array();

        return $result;
    }

    public function getCCTVBranchData($branchid = NULL)
    {

        if (isset($branchid)) {

            $this->bvmsDB->where("branchid", $branchid);
        }

        $query = $this->bvmsDB->get("tbl_branch_cctv");
        $result = $query->result_array();

        return $result;
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM `hosts_groups` as hg
        JOIN hosts  as ho on hg.hostid = ho.hostid
        JOIN hstgrp as hst on hg.groupid = hst.groupid
        JOIN items as item on hg.hostid = item.hostid
        JOIN functions as fn on item.itemid = fn.itemid
        JOIN triggers as tg on fn.triggerid = tg.triggerid
        WHERE hg.groupid in (23,24);
        ";

        $query = $this->zabbixDB->query($sql);
        $result = $query->result_array();

        return $result;
    }
}

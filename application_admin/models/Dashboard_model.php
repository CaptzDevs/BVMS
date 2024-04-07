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

    public function deleteBranchCCTV($data)
    {

        $this->db->where('branchid', $data['branchid']);
        $this->db->where('hostid', $data['hostid']);

        $data = $this->db->delete('tbl_branch_cctv');

        return $data;
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
                AND DATE_FORMAT(FROM_UNIXTIME(e.clock), '%Y-%m-%d %H:%i:%s') < '2024-01-16 13:29:00'
            GROUP BY
                h.hostid
            HAVING
                COUNT(h.hostid) % 2 = 1
        ) AS odd_host_counts;
        ;

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
                    AND DATE_FORMAT(FROM_UNIXTIME(e.clock), '%Y-%m-%d %H:%i:%s') < '2024-01-16 13:29:00'
                GROUP BY
                    h.hostid
                HAVING
                    COUNT(h.hostid) % 2 = 1
            ) AS odd_host_counts;
            ;

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
        WHERE hg.groupid in (23,24)
        limit 100
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

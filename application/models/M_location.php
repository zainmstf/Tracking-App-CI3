<?php
class M_location extends CI_Model
{
    function getCities()
    {
        return $this->db
            ->join('ec_provinces', 'ec_cities.prov_id=ec_provinces.prov_id')
            ->get('ec_cities')
            ->result();
    }
    function getDistricts($cities_id)
    {
        return $this->db
            ->where('city_id', $cities_id)
            ->get('ec_districts')
            ->result();
    }
    function getSubdistricts($districts_id)
    {
        return $this->db
            ->where('city_id', $districts_id)
            ->get('ec_districts')
            ->result();
    }
}

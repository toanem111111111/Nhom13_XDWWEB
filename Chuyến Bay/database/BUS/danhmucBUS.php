<?php
require_once '../DAO/danhmucDAO.php';


class DanhMucBUS{

    public function getSanPhamByDanhMuc(){
        $dao = new DanhMucDAO();
        return $dao -> getSanPhamByDanhMuc();
    }

    public function get($id_danhmuc){
        $dao = new DanhMucDAO();
        if( is_numeric($id_danhmuc)){ 
            return  $dao -> get($id_danhmuc);
            
        }else{
            return "Khong hop le";
        }

    }

    public function insert($tendanhmuc){
        $dao = new DanhMucDAO();
        if($tendanhmuc != NULL){
            return $dao -> insert($tendanhmuc);           
        }else{
            return "Khong hop le";
        }
    }

    public function delete($id_danhmuc){
        $dao = new DanhMucDAO();
        if(is_numeric($id_danhmuc) ){
            return $dao -> delete($id_danhmuc);
        }else{
            return "Khong hop le";
        }
    }

    public function update($tendanhmuc, $id_danhmuc){
        $dao = new DanhMucDAO();
        if(is_numeric($id_danhmuc) && ($tendanhmuc != NULL)){
            return $dao -> update($tendanhmuc, $id_danhmuc);
        }else{
            return "Khong hop le";
        }
    }

    public function search($keyword){
        $dao = new DanhMucDAO();
        if($keyword != NULL ){
            return $dao -> search($keyword);
        }else{
            return "Khong hop le";
        }
    }

}
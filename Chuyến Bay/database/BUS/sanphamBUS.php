<?php
require_once '../DAO/sanphamDAO.php';

class SanPhamBUS{

    public function getAllSanPham(){
        $dao = new SanPhamDAO();
        return $dao -> getAllSanPham();
    }

    public function get($id_danhmuc, $id_sanpham){
        $dao = new SanPhamDAO();
        if( is_numeric($id_danhmuc) && is_numeric($id_sanpham)){
            return $dao -> get($id_danhmuc, $id_sanpham);
        }else{
            return "Khong hop le";
        }
    }

    public function insert( $tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang,$id_danhmuc){
        $dao = new SanPhamDAO();
        //convert string anh

        //lay kieu string
        //convert kieu blob
       if($tensanpham != NULL && $tensanpham != NULL && is_numeric($giasp) && is_numeric($soluong) && is_numeric($tinhtrang) && is_numeric($id_danhmuc)){
            return $dao -> insert( $tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang,$id_danhmuc);
        }else{
            return "Khong hop le";
        }
    }

    public function delete($id_sanpham){
        $dao = new SanPhamDAO();
        if(is_numeric($id_sanpham) ){
            return $dao -> delete($id_sanpham);
        }else{
            return "Khong hop le";
        }
    }

    public function update($id_sanpham,$tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang, $id_danhmuc){
        $dao = new SanPhamDAO();
        if($tensanpham != NULL && $masp != NULL && 
        is_numeric($id_sanpham)  && is_numeric($giasp) && 
        is_numeric($soluong) && is_numeric($tinhtrang) && 
        is_numeric($id_danhmuc)){
            return $dao -> update($id_sanpham, $tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang, $id_danhmuc);
        }else{
            return "Khong hop le";
        }
    }

    public function search($keyword){
        $dao = new SanPhamDAO();
        if($keyword != NULL){
            return $dao ->search($keyword);
        }else{
            return "Khong hop le";
        }
    }
}
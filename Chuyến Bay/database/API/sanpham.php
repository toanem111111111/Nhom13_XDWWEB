<?php
//Mở tất cả báo cáo lỗi
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//lấy tập tin từ BUS
require_once '../BUS/sanphamBUS.php';
//message trả về
$message = array();

$sanphamBUS = new sanphamBUS();

switch ($_GET["action"])
{
    //Lấy toàn bộ danh sách
    //localhost/database/API/sanpham.php?action=getAllSanPham
    case 'getAllSanPham':
        $result = $sanphamBUS -> getAllSanPham();
        $message = ["message" => json_encode($result)];
        break;
    //Lấy danh sách 
    //localhost/database/API/sanpham.php?action=get_sp&id_danhmuc=1&id_sanpham=2
    case 'get_sp':
        $id_danhmuc = $_GET["id_danhmuc"];
        $id_sanpham = $_GET["id_sanpham"];
        $message = $sanphamBUS -> get($id_danhmuc, $id_sanpham);
        break;
    
    //Chèn
    //localhost/database/API/sanpham.php?action=insert&tensanpham=abc&masp=AB&giasp=2222&soluong=1&hinhanh=1.jpg&tomtat=c&noidung=nnn&tinhtrang=1&id_danhmuc=2
    //thứ từ id tăng dần
    case 'insert':
        $tensanpham = $_GET["tensanpham"];
        $masp = $_GET["masp"];
        $giasp = $_GET["giasp"];
        $soluong = $_GET["soluong"];
        $hinhanh = $_GET["hinhanh"];
        $tomtat = $_GET["tomtat"];
        $noidung = $_GET["noidung"];
        $tinhtrang = $_GET["tinhtrang"];
        $id_danhmuc = $_GET["id_danhmuc"];
        $result = $sanphamBUS -> insert($tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang,$id_danhmuc);
        //Trả về biểu thức json
        $message = ["message" => json_encode($result)];
        break;
    
    //XOÁ 
    //localhost/database/API/sanpham.php?action=delete&id_sanpham=20
    case 'delete':
       
        $id_sanpham = $_GET["id_sanpham"];
        $result = $sanphamBUS ->delete($id_sanpham);
        //Trả về biểu thức json
        $message = ["message" => json_encode($result)];
        break;
    
    //Update 
    //localhost/database/API/sanpham.php?action=update&id_sanpham=22&tensanpham=thu&masp=thu444&giasp=4444&soluong=4&hinhanh=4.jpg&tomtat=thu444&noidung=thu&tinhtrang=4&id_danhmuc=4
    //localhost/luanvan/API/sanpham.php?action=updateSanPham&id_sanpham=21&tensanpham=thu&masp=thu444&giasp=4444&soluong=4&hinhanh=4.jpg&noidung=thu&id_danhmuc=4
    case 'update':
        $id_sanpham = $_GET["id_sanpham"];
        $tensanpham = $_GET["tensanpham"];
        $masp = $_GET["masp"];
        $giasp = $_GET["giasp"];
        $soluong = $_GET["soluong"];
        $hinhanh = $_GET["hinhanh"];
        $tomtat = $_GET["tomtat"];
        $noidung = $_GET["noidung"];
        $tinhtrang = $_GET["tinhtrang"];
        $id_danhmuc = $_GET["id_danhmuc"];
        $result = $sanphamBUS -> update($id_sanpham, $tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang,$id_danhmuc);
        //Trả về biểu thức json
        $message = ["message" => json_encode($result)];
        break;
        
    //search
    //localhost/database/API/sanpham.php?action=search&keyword=Kem
    case 'search':
        $key = $_GET["keyword"];
        $result = $sanphamBUS -> search($key);
        //trả về biểu thức json
        $message = ["message" => json_encode($result)];
        break;
    
    default:
        $message = ["message" => "Unknown method " . $_GET["action"]];
        break;

}
//Thông báo json
header('Content-type: application/json; charset=utf-8');

//clean xoá bộ đệm đầu ra
ob_clean();

//xuất biểu thức json
echo json_encode ($message);
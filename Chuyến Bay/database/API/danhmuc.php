<?php
//Mở tất cả báo cáo lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lấy tập tin từ BUS
require_once '../BUS/danhmucBUS.php';
//message trả về
$message = array();

$danhmucBUS = new DanhMucBUS();

switch($_GET["action"])
{
    //Lấy danh sách
    //localhost/database/API/danhmuc.php?action=getSanPhamByDanhMuc
    case 'getSanPhamByDanhMuc':
        // $id_danhmuc = $_GET["id_danhmuc"];
        $result = $danhmucBUS -> getSanPhamByDanhMuc();
        $message = ["message" => json_encode($result)];
        break;
    
    // //Chèn
    //localhost/database/API/danhmuc.php?action=insert&tendanhmuc=abc
    //thứ tự id cho tự tăng dần
    case 'insert':
        $tendanhmuc = $_GET["tendanhmuc"];
        $result = $danhmucBUS -> insert($tendanhmuc);
        //Trả về biểu thức json
        $message = ["message" => json_encode($result)];
        break;     

    //Xoá
    //localhost/database/API/danhmuc.php?action=delete&id_danhmuc=7
    case 'delete':
        $id_danhmuc = $_GET["id_danhmuc"];
        $result = $danhmucBUS -> delete($id_danhmuc);
        //Trả về biểu thức json
        $message = ["message" => json_encode($result)];
        break;

    //Update
    //localhost/database/API/danhmuc.php?action=update&id_danhmuc=14&tendanhmuc=thu
    case 'update':
        $tendanhmuc = $_GET["tendanhmuc"];
        $id_danhmuc = $_GET["id_danhmuc"];
        $result = $danhmucBUS -> update($tendanhmuc, $id_danhmuc);
        $message=["message" => json_encode($result)];
        break;

    //search
    //localhost/database/API/danhmuc.php?action=search&keyword=Kem
    case 'search':
        $key = $_GET["keyword"];
        $result = $danhmucBUS -> search($key);
        //Trả về biểu thức json
        $message = ["message" => json_encode($result)];
        break;

    default:
		$message = ["message" => "Unknown method " . $_GET["action"]];
		break;
    
}
//Thông báo json
header('Content-type: application/json; charset=utf-8');

//Clean xoá bộ đệm đầu ra
ob_clean();

//Xuất biểu thức json
echo json_encode ($message);


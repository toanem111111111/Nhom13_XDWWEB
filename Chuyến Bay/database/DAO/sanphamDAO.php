<?php
require_once '../util/dbconnection.php';
class SanPhamDAO{
    private DBConnection $conn;

    public function getAllSanPham()
    {
        //gán $db bằng một DBConnection() mới
        $dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
        $conn = $dbConnection->getConnection();
        
        //gán biến bằng câu lệnh sql lấy id và tên sản phẩm từ bảng sản phẩm khi xác đinh id_danhmuc
        $query = 'SELECT id_sanpham, tensanpham, masp, giasp, hinhanh FROM tbl_sanpham ';
        //statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //gán list bằng tạo một mảng
        // $stmt->bind_param();
        //gán list bằng tạo một mảng
        $list = array();
        //statement -> Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
        $stmt->execute();
        //gán biến $result để nhận kết quả
        $result = $stmt->get_result();
        //Báo đóng
        $stmt->close();
        while ($row = $result->fetch_assoc())
        {
            $list[] = $row;
        }
        return $list;
    }
     /**
     * Lấy danh sách sản phẩm theo từng danh mục
     * @param string id_danhmuc Id danh mục
     * @return array[] Danh sách sản phẩm
     */
    // public function __construct(){
    //     //$this->conn = new mysql($this->host, $this->username, $this->password, $this->db_name);
    // }
    public function get($id_danhmuc, $id_sanpham)
    {
       
        //gán $db bằng một DBConnection() mới
        $dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
        $conn = $dbConnection->getConnection();
        
        //gán biến bằng câu lệnh sql lấy id và tên sản phẩm từ bảng sản phẩm khi xác đinh id_danhmuc
        $query = 'SELECT id_sanpham, tensanpham FROM tbl_sanpham WHERE id_danhmuc = ? AND id_sanpham =?' ;
        //statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
        $stmt->bind_param("ss", $id_danhmuc, $id_sanpham);
        //gán list bằng tạo một mảng
        $list = array();
        //statement -> Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
        $stmt->execute();
        //gán biến $result để nhận kết quả
        $result = $stmt->get_result();
        //Báo đóng
        $stmt->close();
        while ($row = $result->fetch_assoc())
        {
            $list[] = $row;
        }
        return $list;
    }

    /**
     * Thêm một sản phẩm vào csdl
     * @param string id_danhmuc Id danh mục
     * @param string tensanpham Tên sản phẩm
     * @return int ID của sản phẩm mới được thêm
     */
    public function insert($tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang, $id_danhmuc)
    {
        //gán ret bằng 0
        $ret = 0;
        //gán $db bằng một DBConnection() mới
        $dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
        $conn = $dbConnection->getConnection();
        //gán biến bằng câu lệnh sql chèn tensanpham va id_danh mục vào bảng sản phẩm
        $query = 'INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) 
                  VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        //statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
        $stmt->bind_param("sssssssss",$tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang, $id_danhmuc);
        //statement -> Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
        $stmt->execute();
        //gán biến $ret để nhận kết quả insert_id
        $ret = $stmt->insert_id;
        //Báo đóng
        $stmt->close();
        //Trả giá trị về $ret
        return $ret;
    }

    /**
     * Xoá một sản phẩm
     * @param string id_danhmuc ID danh mục
     * @param integer id_sanpham ID sản phẩm
     * @return int Số sản phẩm đã xoá
     */
    public function delete($id_sanpham)
    {
        //gán ret bằng 0
        $ret = 0;
        //gán $db bằng một DBConnection() mới
		$dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
		$conn = $dbConnection->getConnection();
        //câu truy vấn
        $query = 'DELETE FROM tbl_sanpham WHERE  id_sanpham = ? ';
		//statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
		$stmt->bind_param("ss", $id_sanpham);
        //statement -> Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
		$stmt->execute();
        //gán biến $ret để nhận kết quả affected_rows
		$ret = $stmt->affected_rows;
        //Báo đóng
		$stmt->close();
        //Trả giá trị về $ret
		return $ret;
    }

    /**
     * update một sản phẩm
     * @param string id_danhmuc ID danh mục
     * @param integer id_sanpham ID sản phẩm
     * @return int Số sản phẩm đã xoá
     */
    public function update($id_sanpham, $tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang, $id_danhmuc)
    {
        //gán ret bằng 0
        $ret = 0;
        //gán $db bằng một DBConnection() mới
		$dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
		$conn = $dbConnection->getConnection();
        //câu truy vấn
        $query = 'UPDATE `tbl_sanpham` 
                    SET `tensanpham` = ? ,`masp` = ?, `giasp` =?, `soluong` = ? , `hinhanh` = ? , `tomtat` = ? , `noidung` = ? , `tinhtrang` = ? ,`id_danhmuc`=?
                    WHERE `tbl_sanpham`.`id_sanpham` = ?';
		//statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
        $stmt->bind_param("ssssssssss",$tensanpham, $masp, $giasp, $soluong, $hinhanh, $tomtat, $noidung, $tinhtrang, $id_danhmuc, $id_sanpham);
        //statement -> Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
		$stmt->execute();
        //gán biến $ret để nhận kết quả affected_rows
		$ret = $stmt->affected_rows;
        //Báo đóng
		$stmt->close();
        //Trả giá trị về $ret
		return $ret;
    }

    public function search($keyword){
        //gán $db bằng một DBConnection() mới
		$dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
		$conn = $dbConnection->getConnection();
        //
		$query = "SELECT * FROM `tbl_sanpham` WHERE `tensanpham` LIKE ? ";
        $keyword = "%".$keyword."%";
		//statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
        //báo lỗi 
		$stmt->bind_param("s", $keyword);
         //gán list bằng tạo một mảng
        $list = array();
        //statement -> Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
		$stmt->execute();
        //gán biến $ret để nhận kết quả affected_rows
		$result = $stmt->get_result();
        //Báo đóng
		$stmt->close();
        while ($row = $result->fetch_assoc())
        {
            $list[] = $row;
        }
		return $list;

    }

}
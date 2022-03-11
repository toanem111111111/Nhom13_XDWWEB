<?php
require_once '../util/dbconnection.php';
class DanhMucDAO{
    private DBConnection $conn;
    /**
     * Lấy danh sách sản phẩm theo từng danh mục
     * @param string id_danhmuc Id danh mục
     * @return array[] Danh sách sản phẩm
     */
    // public function __construct(){
    //     //$this->conn = new mysql($this->host, $this->username, $this->password, $this->db_name);
    // }
    public function getSanPhamByDanhMuc()
    {
        //gán $db bằng một DBConnection() mới
        $dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
        $conn = $dbConnection->getConnection();
        
        //gán biến bằng câu lệnh sql lấy id và tên sản phẩm từ bảng sản phẩm khi xác đinh id_danhmuc
        $query = 'SELECT * FROM tbl_danhmuc ';
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

    public function get($id_danhmuc)
    {
       
        //gán $db bằng một DBConnection() mới
        $dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
        $conn = $dbConnection->getConnection();
        
        //gán biến bằng câu lệnh sql lấy id và tên sản phẩm từ bảng sản phẩm khi xác đinh id_danhmuc
        $query = 'SELECT id_sanpham, tensanpham FROM tbl_sanpham WHERE id_danhmuc = ?';
        //statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
        $stmt->bind_param("s", $id_danhmuc);
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
    public function insert($ten)
    {
        //gán ret bằng 0
        $ret = 0;
        //gán $db bằng một DBConnection() mới
        $dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
        $conn = $dbConnection->getConnection();
        //gán biến bằng câu lệnh sql chèn tensanpham va id_danh mục vào bảng sản phẩm
        $query = 'INSERT INTO tbl_danhmuc (id, tendanhmuc) VALUES (NULL,?)';
        //statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
        $stmt->bind_param("s",$ten);
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
    public function delete($id_danhmuc)
    {
        //gán ret bằng 0
        $ret = 0;
        //gán $db bằng một DBConnection() mới
		$dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
		$conn = $dbConnection->getConnection();
        //câu truy vấn
        $query = 'DELETE FROM tbl_danhmuc WHERE  id = ?';
		//statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
		$stmt->bind_param("s", $id_danhmuc);
        //statement -> Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
		$stmt->execute();
        //gán biến $ret để nhận kết quả affected_rows
		$ret = $stmt->affected_rows;
        //Báo đóng
		$stmt->close();
        //Trả giá trị về $ret
		return $ret;
    }

    public function update($tendanhmuc, $id_danhmuc){
        //gán ret bằng 0
        $ret = 0;
        //gán $db bằng một DBConnection() mới
		$dbConnection = new DBConnection();
        //gán biến $conn bằng $dbConnection trỏ tới getConnection()
		$conn = $dbConnection->getConnection();
        //câu truy vấn
        $query = 'UPDATE `tbl_danhmuc` SET `tendanhmuc` = ? WHERE `tbl_danhmuc`.`id` = ?';
		//statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
		$stmt->bind_param("ss", $tendanhmuc, $id_danhmuc);
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
		$query = "SELECT * FROM `tbl_danhmuc` WHERE `tendanhmuc` LIKE ? ";
        $keyword = "%".$keyword."%";

		//statement bằng biến $conn -> chuẩn bị rà ràng buộc
        $stmt = $conn->prepare($query);
        //statement -> liên kết các biến
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
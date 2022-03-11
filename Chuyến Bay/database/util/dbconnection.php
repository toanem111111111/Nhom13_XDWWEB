<?php
class DBConnection{
    private $host = "localhost";
    private $db_name = "dbbanhngot";
    private $username = "root";
    private $password = "";
    private $conn;
    /**
	 * Khởi tạo - Mở kết nối đến database
	 * @param none
	 * @return database
	 */
    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
    }

    /** Huỷ - Đóng kết nối database
     * @param none
     * @return none
     */
    function _destruct()
    {
        $this->conn->close();
    }

    /**
     * Lấy Connection
     * @param none
     * @return none
     */
    public function getConnection(){
        return $this->conn;
    }

}
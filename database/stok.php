<?php
    include('connection.php');

    class Stok {

        function __construct()
        {
            $this->database = new ConnectionDatabase();
        }

        function getAll(){
            $query = "SELECT * FROM stok";
            $data = mysqli_query($this->database->connection, $query);
            
            $res = [];
    
            while($item = mysqli_fetch_array($data)) {
                $res[] = $item;
            }

            //$this->database->closeConnection();
    
            return $res;
        }

        function show($id){
            $result = null;
            $query = "SELECT * FROM stok WHERE id = ?";
            $process = $this->database->connection->prepare($query);
            
            if($process) {
                $process->bind_param('s', $id);
                $process->execute();

                $result = $process->get_result();
                $result = $result->fetch_assoc();
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                echo $error;
            }
            
            $process->close();
            $this->database->closeConnection();            

            return $result;
        }

        function getById($id) {
            $query = "SELECT * FROM stok WHERE id = ?";
            $process = $this->database->connection->prepare($query);
        
            if ($process) {
                $process->bind_param('i', $id);
                $process->execute();
                $result = $process->get_result();
                return $result->fetch_assoc();
            } else {
                throw new Exception("Database Error: " . $this->database->connection->error);
            }
        }

        function delete($id) {
            $query = "DELETE FROM stok WHERE id = ?";
            $process = $this->database->connection->prepare($query);
        
            if ($process) {
                $process->bind_param('i', $id);
                $process->execute();
            } else {
                throw new Exception("Database Error: " . $this->database->connection->error);
            }
        }

        function update($id, $Barang, $Kategori, $Ukuran, $Stok) {
            $query = "UPDATE stok SET barang = ?, kategori = ?, ukuran = ?, stok = ? WHERE id = ?";
            $process = $this->database->connection->prepare($query);
        
            if ($process) {
                $process->bind_param('ssssi', $Barang, $Kategori, $Ukuran, $Stok, $id);
                $process->execute();
        
                if ($process->affected_rows === 0) {
                    echo "Error: Tidak ada data yang diperbarui.";
                }
            } else {
                throw new Exception("Database Error: " . $this->database->connection->error);
            }
        }

        function store($Barang, $Kategori, $Ukuran, $Stok){
            $query = "INSERT INTO stok (barang, kategori, ukuran, stok) VALUES (?,?,?,?)";

            $process = $this->database->connection->prepare($query);

            if ($process) {
                $process->bind_param('sssi', $Barang, $Kategori, $Ukuran, $Stok);
                $process->execute();
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                throw new Exception("Database Error: " . $error);
            }
            
            $process->close();
            $this->database->closeConnection();

            return true;
        }
    }
?>

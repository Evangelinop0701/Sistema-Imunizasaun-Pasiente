<?php

session_start();

class database
{
    protected $servername = 'localhost';
    protected $hostname = 'root';
    protected $password = '';
    protected $dbname = 'imun';
    protected $conn;

    public function __construct()
    {
        if (!isset($this->conn)) {
            $this->conn = new mysqli($this->servername, $this->hostname, $this->password, $this->dbname) ;
        }

        if(!$this->conn) {
            echo 'Koneksaun Database La Susessu';
        }

        return $this->conn;

    }
}

class user extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function chek_login($username, $password)
    {
        $pass = sha1(md5($password));
        $sql = "SELECT * FROM t_user u, t_doutor d, t_aldeia a WHERE u.id_doutor=d.id_doutor
         AND d.id_aldeia=a.id_aldeia AND u.username='$username' AND u.password='$pass'" ;
        $query = $this->conn->query($sql);
        $result = $query->fetch_assoc();
        $num_rows = mysqli_num_rows($query);

        if ($num_rows > 0) {
            $_SESSION['username'] = true;
            $_SESSION['passwords'] = true;
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['nu_do'] = $result['id_doutor'];
            $_SESSION['naran_doutor'] = $result['naran_doutor'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['level_user'] = $result['level_user'];
            return true;
        } else {
            return false;
        }
    }

    public function get_sessi()
    {
        return $_SESSION['username'] and $_SESSION['password'];
    }



    public function dados_user()
    {

        $sql = "SELECT * FROM t_user u, t_doutor d, t_aldeia a WHERE u.id_doutor=d.id_doutor
         AND d.id_aldeia=a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function form_user($id)
    {


        $sql = "SELECT * FROM t_user u, t_doutor d, t_aldeia a WHERE u.id_doutor=d.id_doutor
         AND d.id_aldeia=a.id_aldeia AND u.id_user='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }


    }



}


class CRUD extends database
{
    public function __construct()
    {
        parent::__construct();
    }


    //To read data
    public function read_data($table, $id, $id_value)
    {
        $query = "SELECT * FROM $table";

        if ($id != null) {
            $query .= " WHERE $id='" . $id_value . "'";
        }


        $result = $this->conn->query($query);

        if(!$result) {
            return 'Akontese Erru iha Query!';
        }

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }


    //To update data
    public function update_data($table, $data, $id, $id_value)
    {
        $query = "UPDATE $table SET ";
        $query .= implode(',', $data);
        $query .= "WHERE $id='" . $id_value . "'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To delete data
    public function delete_data($table, $id, $id_value)
    {
        $query = "DELETE FROM $table WHERE $id='" . $id_value . "'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To insert data
    public function insert_data($table_name, $data)
    {
        $string = "INSERT INTO " . $table_name . "(";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";

        if(mysqli_query($this->conn, $string)) {
            return true;
        } else {
            echo mysqli_error($this->conn);
        }
    }


    //To get last id
    public function get_last_id($id, $table)
    {
        $query = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
        $result = $this->conn->query($query);
        $data = mysqli_fetch_array($result);

        return $data['id'];
    }


}

class pasiente extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dados_pasiente()
    {

        $sql = "SELECT p.id_pasiente,p.naran_pasiente, p.naran_aman, p.naran_inan, p.data_moris, 
        timestampdiff(year, p.data_moris, curdate()) as idade, p.sexu, p.no_tlf, p.id_aldeia, p.bairo,
         a.naran_aldeia FROM t_pasiente p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function dados_pasiente_periodo($id)
    {

        $sql = "SELECT DISTINCT i.id_pasiente, p.bairo, p.naran_pasiente, p.data_moris,p.sexu,p.naran_aman,p.naran_inan,p.no_tlf,p.id_aldeia, a.naran_aldeia, a.naran_suku FROM t_imunisasaun i, t_pasiente p, t_periodo pr, t_aldeia a
        WHERE p.id_aldeia=a.id_aldeia AND i.id_periodo=pr.id_periodo AND i.id_pasiente=p.id_pasiente AND pr.id_periodo='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function dados_pasiente_input($id)
    {

        $sql = "SELECT p.id_pasiente,p.naran_pasiente, p.naran_aman, p.naran_inan, p.data_moris, 
        timestampdiff(year, p.data_moris, curdate()) as idade, p.sexu, p.no_tlf, p.id_aldeia, p.bairo,
         a.naran_aldeia FROM t_pasiente p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.id_pasiente='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function select_form($id)
    {

        $sql = "SELECT p.id_pasiente,p.naran_pasiente,  p.naran_aman, p.naran_inan, p.data_moris, 
        timestampdiff(year, p.data_moris, curdate()) as idade, p.sexu, p.no_tlf, p.id_aldeia, p.bairo,
         a.naran_aldeia, a.naran_suku FROM t_pasiente p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.id_pasiente='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function total()
    {
        $sql = "SELECT COUNT(p.id_pasiente) as total FROM t_pasiente p";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function total_sexu_mane()
    {
        $sql = "SELECT p.sexu, COUNT(p.sexu) as total_sexu FROM t_pasiente p WHERE p.sexu='M'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function total_sexu_feto()
    {
        $sql = "SELECT p.sexu, COUNT(p.sexu) as total_sexu FROM t_pasiente p WHERE p.sexu='F'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


}
class aldeia extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dados_aldeia()
    {

        $sql = "SELECT * FROM  t_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function form_aldeia($id)
    {

        $sql = "SELECT * FROM  t_aldeia WHERE id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function total_adeia()
    {

        $sql = "SELECT a.naran_aldeia, COUNT(*) as Total_adeia FROM t_pasiente p, t_aldeia a
                        WHERE p.id_aldeia=a.id_aldeia GROUP BY a.naran_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
class doutor extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dados_doutor()
    {

        $sql = "SELECT d.naran_doutor, d.id_doutor, d.sexu,d.data_moris, d.area_espesifiku, d.hela_fatin, a.naran_aldeia, a.naran_suku, timestampdiff(year, d.data_moris, curdate()) as idade 
            FROM t_doutor d, t_aldeia a WHERE d.id_aldeia=a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function dados_doutor_res($id)
    {

        $sql = "SELECT DISTINCT dr.naran_doutor as naran_dr FROM t_dose d, t_imunisasaun i,
             t_pasiente p, t_tipu t, t_doutor dr WHERE d.id_imunisasaun=i.id_imunisasaun AND
              i.id_pasiente=p.id_pasiente AND
             i.id_tipo=t.id_tipo AND i.id_doutor=dr.id_doutor AND p.id_pasiente='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function form_doutor($id)
    {

        $sql = "SELECT d.naran_doutor, d.id_doutor, d.sexu,d.data_moris, d.area_espesifiku, d.hela_fatin, a.naran_aldeia, a.naran_suku, a.id_aldeia, timestampdiff(year, d.data_moris, curdate()) as idade 
            FROM t_doutor d, t_aldeia a WHERE d.id_aldeia=a.id_aldeia AND d.id_doutor='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
class tipo extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dados_tipu()
    {

        $sql = "SELECT * FROM t_tipu";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function form_tipu($id)
    {

        $sql = "SELECT * FROM t_tipu t WHERE t.id_tipo='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function tota_tipo()
    {

        $sql = "SELECT naran_tipo, COUNT(id_tipo) as total FROM t_tipu";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
class imun extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dados_imun()
    {

        $sql = "SELECT i.id_imunisasaun,i.id_pasiente, i.id_doutor, i.data_imunizasaun,
             i.id_tipo, i.data_durasaun, i.doses, i.obs, i.komentario,
              d.naran_doutor,d.area_espesifiku,d.sexu, t.naran_tipo, p.naran_pasiente,p.data_moris,p.sexu,
               p.naran_aman, p.naran_inan, p.no_tlf, a.id_aldeia, a.naran_aldeia,
                a.naran_suku FROM t_imunisasaun i, t_doutor d, t_tipu t, t_pasiente p, t_aldeia a 
                WHERE i.id_doutor=d.id_doutor AND
             i.id_tipo=t.id_tipo AND i.id_pasiente=p.id_pasiente  AND p.id_aldeia=a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function dados_imun_form($id)
    {

        $sql = "SELECT i.id_imunisasaun,i.id_pasiente, i.id_doutor, i.data_imunizasaun,
             i.id_tipo, i.data_durasaun, i.doses, i.obs, i.komentario,
              d.naran_doutor,d.area_espesifiku,d.sexu, t.naran_tipo, p.naran_pasiente,p.data_moris,p.sexu,
               p.naran_aman, p.naran_inan, p.no_tlf, a.id_aldeia, a.naran_aldeia,
                a.naran_suku FROM t_imunisasaun i, t_doutor d, t_tipu t, t_pasiente p, t_aldeia a 
                WHERE i.id_doutor=d.id_doutor AND
             i.id_tipo=t.id_tipo AND i.id_pasiente=p.id_pasiente  AND p.id_aldeia=a.id_aldeia AND i.id_imunisasaun='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function update_obs($id)
    {
        $sql = "UPDATE t_imunisasaun SET obs='Kompletu' WHERE id_imunisasaun='$id'";
        $this->conn->query($sql);
    }
    // nia funsaun atu update obs imunidade
    public function update_obs_dell($id)
    {
        $sql = "UPDATE t_imunisasaun SET obs=' ' WHERE id_imunisasaun='$id'";
        $this->conn->query($sql);
    }

    public function select_form($id)
    {
        $sql = "SELECT pr.id_periodo, pr.periodo, i.id_imunisasaun,i.id_pasiente, i.obs, i.id_doutor, i.data_imunizasaun,
             i.id_tipo, i.data_durasaun, i.doses, i.komentario,
              d.naran_doutor,d.area_espesifiku,d.sexu, t.naran_tipo, p.naran_pasiente,p.data_moris,p.sexu,
               p.naran_aman, p.naran_inan, p.no_tlf, a.id_aldeia, a.naran_aldeia,
                a.naran_suku FROM t_imunisasaun i, t_doutor d, t_tipu t, t_pasiente p, t_aldeia a, t_periodo pr
                WHERE i.id_doutor=d.id_doutor AND i.id_periodo=pr.id_periodo AND
             i.id_tipo=t.id_tipo AND i.id_pasiente=p.id_pasiente  AND p.id_aldeia=a.id_aldeia AND i.id_imunisasaun='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function detalho_kalender($id)
    {
        $sql = "SELECT p.id_pasiente, i.id_imunisasaun, i.id_tipo, t.naran_tipo, i.obs, i.data_imunizasaun, i.data_durasaun, i.doses FROM t_imunisasaun i, t_pasiente p, t_tipu t WHERE i.id_pasiente=p.id_pasiente AND i.id_tipo=t.id_tipo and p.id_pasiente='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function id_pasiente($id)
    {
        $sql = "SELECT * FROM t_pasiente p WHERE p.id_pasiente='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function total_tipo_graph()
    {
        $sql = "SELECT t.naran_tipo, COUNT(*) as total_tipo FROM t_imunisasaun i,
         t_pasiente p, t_tipu t, t_periodo per WHERE i.id_periodo=per.id_periodo AND i.id_pasiente=p.id_pasiente
         AND i.id_tipo=t.id_tipo AND per.status='Y' GROUP BY t.naran_tipo;";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function total_id_periodo($id)
    {
        $sql = "SELECT t.naran_tipo, COUNT(*) as total_tipo FROM t_imunisasaun i, t_pasiente p,
         t_tipu t, t_periodo tinan WHERE i.id_pasiente=p.id_pasiente AND i.id_tipo=t.id_tipo AND i.id_periodo=tinan.id_periodo
         AND tinan.id_periodo='$id' GROUP BY t.naran_tipo";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function select_sexu_pie()
    {
        $sql = "SELECT p.sexu, COUNT(*) as total_sexu FROM t_pasiente p GROUP BY p.sexu";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


}

class doses extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dados_doses($id)
    {

        $sql = "SELECT * FROM t_dose d, t_tipu t, t_imunisasaun i, t_pasiente p WHERE 
            d.id_imunisasaun=i.id_imunisasaun AND i.id_tipo=t.id_tipo AND i.id_pasiente=p.id_pasiente AND d.id_imunisasaun='$id' ORDER BY d.naran_dose DESC";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function print_report($id)
    {

        $sql = "SELECT * FROM t_dose d, t_imunisasaun i, t_pasiente p, t_tipu t WHERE d.id_imunisasaun=i.id_imunisasaun AND i.id_pasiente=p.id_pasiente
             AND i.id_tipo=t.id_tipo AND p.id_pasiente='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function form_doses($id)
    {

        $sql = "SELECT * FROM t_dose d, t_tipu t, t_imunisasaun i, t_pasiente p WHERE 
            d.id_imunisasaun=i.id_imunisasaun AND i.id_pasiente=p.id_pasiente AND i.id_tipo=t.id_tipo AND d.id_dose='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function id_doses($id)
    {

        $sql = "SELECT * FROM t_imunisasaun i, t_tipu t  WHERE i.id_tipo=t.id_tipo AND i.id_imunisasaun='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function update_status_obs()
    {
        $sql = "SELECT d.id_dose, i.id_imunisasaun, t.naran_tipo, i.doses, COUNT(*) total_vasina FROM t_dose d, 
            t_tipu t, t_imunisasaun i, t_pasiente p WHERE
             d.id_imunisasaun=i.id_imunisasaun AND i.id_pasiente=p.id_pasiente AND i.id_tipo=t.id_tipo GROUP BY i.id_imunisasaun";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function update_estatus_doses($id)
    {
        $sql = "UPDATE t_dose SET status='Kompletu' WHERE id_dose='$id'";
        $this->conn->query($sql);
    }
}

class info extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dados_info()
    {
        $sql = "SELECT * FROM t_informsasaun";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function form_info($id)
    {
        $sql = "SELECT * FROM t_informsasaun WHERE id_informasaun='$id'";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
class control extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function control_panel()
    {
        $sql = "SELECT * FROM t_control ORDER BY id_control DESC LIMIT 2";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function form_control($id)
    {
        $sql = "SELECT * FROM t_control WHERE id_control='$id'";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}

class periodo extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function periodo()
    {
        $sql = "SELECT * FROM t_periodo ORDER BY periodo DESC";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function periodo1()
    {
        $sql = "SELECT * FROM t_periodo WHERE status='Y'";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function update_status($id)
    {
        $sqlY = "UPDATE t_periodo SET status='Y' WHERE id_periodo='$id'";
        $query = $this->conn->query($sqlY);
        $sqlN = "UPDATE t_periodo SET status='' WHERE id_periodo !='$id'";
        $query = $this->conn->query($sqlN);
    }
}
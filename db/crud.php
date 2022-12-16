<?php
class crud{

    //private database object
    private $db;

    //constructor to initialize private variable to database connection 
    function __construct($conn)
    {
        $this ->db = $conn;
    }

    public function insert($fname, $lname, $dob, $email, $contact, $specialty)
    {
 
        try {
            $sql ="INSERT INTO attendee( fristname,lastname,dateofbirth,emailadress,contactnumber,specialty_id) VALUES (:fname, :lname,:dob,:email, :contact,:specialty)";
            $stmt = $this ->db->prepare($sql);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty',$specialty);

            //execute statement

            $stmt ->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty)
    {
        try{

            
        $sql = "UPDATE `attendee` SET `fristname`=:fname,`lastname`=:lname,
        `dateofbirth`= :dob,`emailadress`=:email,`contactnumber`=:contact,
        `specialty_id`=:specialty WHERE attendee_id = :id";
                $stmt = $this ->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->execute();
                return true;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    
    }

    public function getAttendess()
    {
        $sql ="SELECT * FROM `attendee` as a inner join specialties s on a.specialty_id = s.specialty_id";
        $result =$this->db->query($sql);
        return $result;
    }
    public function getAttendeeDetails($id)
    {
        $sql ="SELECT * FROM `attendee` as a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getSpecialties()
    {
        
        $sql ="SELECT * FROM `specialties`";
        $result =$this->db->query($sql);
        return $result;

    }

    public function deleteAttendee($id)
    {
        try{ 
            $sql ="delete from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt ->bindparam(':id',$id);
            $stmt->execute();
            return true;

        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
     
    }


}


?>
<?php

/**
 * Description of handShapeClass
 *
 * @author mackenzie
 */
class handShapeClass {

    private $_id;
    private $_description;
    private $_embrDescription;
    private $_imageLocation;
    private $_active;

    function __construct() {

        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 3:
                self::__construct3($argv[0], $argv[1], $argv[2]);
                break;
            case 4:
                self::__construct4($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
            case 5:
                self::__construct5($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
        }
    }

    function __construct1($id) {
        $this->_id = $id;
    }

    function __construct3($description, $embrDescription, $active) {
        $this->_description = $description;
        $this->_embrDescription = $embrDescription;
        $this->_active = $active;
    }
    function __construct4($description, $embrDescription, $image, $active) {
        $this->_description = $description;
        $this->_embrDescription = $embrDescription;
        $this->_imageLocation = $image;
        $this->_active = $active;
    }

    function __construct5($id, $description, $embrDescription, $image, $active) {
        $this->_id = $id;
        $this->_description = $description;
        $this->_embrDescription = $embrDescription;
        $this->_imageLocation = $image;
        $this->_active = $active;
    }

    function get_id() {
        return $this->_id;
    }

    function get_description() {
        return $this->_description;
    }

    function get_embrDescription() {
        return $this->_embrDescription;
    }

    function get_imageLocation() {
        return $this->_imageLocation;
    }

    function get_active() {
        return $this->_active;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_description($_description) {
        $this->_description = $_description;
    }

    function set_embrDescription($_embrDescription) {
        $this->_embrDescription = $_embrDescription;
    }

    function set_imageLocation($_imageLocation) {
        $this->_imageLocation = $_imageLocation;
    }

    function set_active($_active) {
        $this->_active = $_active;
    }

    /**
     * Function that is used to insert data from a handshape object into the hand_shape table
     * 
     * @return int that will say if there is an error to the user inserting the handshape
     */
    function insertHandShape() {

        // need to set up functionality to check and see if a user was inserted 
        $ret = TRUE;

        if (!$this->isDuplicate($this->_description, "", 1)) {
            //connection information for the database
            require '../../../bin/dbConnection.inc.php';

            //process to open a connection to the database
            include '../include/connection_open.inc.php';

            $sql = "INSERT INTO hand_shape(description, embr_description, image, active) " .
                    "VALUES(?,?,?,?)";
            $stmt = $conn->prepare($sql);            
            
            $stmt->bind_param("sssi", $this->get_description(), $this->get_embrDescription(), $this->get_imageLocation(), $this->get_active());
            $stmt->execute();
            $stmt->close();
            $conn->close();
        } else {
            $ret = FALSE; // still need to figure out if this is what will be used for this. 
        }
        return $ret;
    }

    function updateHandShapeImage() {
        if (!$this->isDuplicate($this->_description, $this->_id, 2)) {
            $sql = "UPDATE hand_shape SET description='" . $this->_description . "', embr_description='" . $this->_embrDescription . "'," . 
                    " image='" . $this->_imageLocation . "', active=" . $this->_active . 
                    " WHERE id = " . $this->_id;

            //connection information for the database
            require '../../../bin/dbConnection.inc.php';

            //process to open a connection to the database
            include '../include/connection_open.inc.php';

            if ($conn->query($sql) === TRUE) {
                $ret = "../pages/handshapes.php";
            } else {
                $ret = "../pages/handshape.php?&error=3";
            }
        } else {
            $ret = "../pages/handshapes.php?&error=1";
        }

        return $ret;
    }
    
    function updateHandShape() {
        if (!$this->isDuplicate($this->_description, $this->_id, 2)) {
            $sql = "UPDATE hand_shape SET description='" . $this->_description . "', embr_description='" . $this->_embrDescription . "', active = " . $this->_active . 
                    " WHERE id = " . $this->_id;
            
            //connection information for the database
            require '../../../bin/dbConnection.inc.php';

            //process to open a connection to the database
            include '../include/connection_open.inc.php';

            if ($conn->query($sql) === TRUE) {
                $ret = "../pages/handshapes.php";
            } else {
                $ret = "../pages/handshape.php?&error=3";
            }
        } else {
            $ret = "../pages/handshapes.php?&error=1";
        }

        return $ret;
    }

    //delete handshape from the database
    //function deleteHandShape(){}

    protected function isDuplicate($desc, $id, $iOrE) {
        $ok = FALSE;

        //connection information for the database
        require '../../../bin/dbConnection.inc.php';

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        
        //insert
        if ($iOrE == 1) {
            $sql = "SELECT id from hand_shape WHERE description = '" . $desc . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $ok = TRUE;
            }
        } else {
            //edit
            $sql = "SELECT description FROM hand_shape WHERE id = " . $id ;
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $description = $row["description"];
            }

            //this is showing that the description and the id match
            if ($desc == $description) {
                $ok = FALSE;
            } else {
                //the description does not match the one accosiated with this id
                //this means there is a name change
                $sql = "SELECT id FROM hand_shape WHERE description = '" . $desc . "'";
                $result = $conn->query($sql);
                
                $ck = $result->num_rows;
            //this means that there is another description with that id and this will be a duplicate username
                if ($ck > 0) {
                    $ok = TRUE;
                }
            }
        }

        //close the connection
        mysqli_close($conn);

        return $ok;
    }
    
   public function getHandshapeInfo() {
        $sql = "SELECT * FROM hand_shape WHERE hand_shape.id = " . $this->_id;

        //connection information for the database
        require '../../../bin/dbConnection.inc.php';

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            $this->_description = $row["description"];
            $this->_embrDescription = $row["embr_description"];
            $this->_imageLocation = $row["image"];
            $this->_active = $row["active"];
            
        }
        //close the connection
        mysqli_close($conn);
    }

    function deleteHandshape() {
        $sql = "DELETE FROM hand_shape WHERE description='" . $this->_description . "'";

        //connection information for the database
        require '../../../bin/dbConnection.inc.php';

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        if ($conn->query($sql) === TRUE) {
            $ret = TRUE;
        } else {
            $ret = FALSE;
        }
        //close the connection
        mysqli_close($conn);
        
        return ret;
    }

}

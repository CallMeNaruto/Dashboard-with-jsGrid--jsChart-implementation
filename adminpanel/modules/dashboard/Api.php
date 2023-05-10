<?php 
$urlParams = explode('/', $_SERVER['REQUEST_URI']);
$functionName = end($urlParams);

// remove any query parameters from the function name
$functionName = strtok($functionName, '?');

if (isset($functionName) && $functionName != '') {
    $obj = new Api();
    $obj->$functionName();
}

class Api {
    private $conn;
    
    public function __construct()
    {
        include('../../../config/config.php');
        $this->conn = $conn;
    }
    
    public function getanalatics() {
        // Query the total number of entries
        $totalenteries_query = "SELECT COUNT(*) FROM data";
        $totalenteries_result = $this->conn->query($totalenteries_query);
        $totalenteries= $totalenteries_result->fetch_row()[0];

        // entries in last three years
        $year = "SELECT SUM(count) FROM (
            SELECT COUNT(*) as count FROM data WHERE start_year = 2020
            UNION ALL
            SELECT COUNT(*) as count FROM data WHERE start_year = 2021
            UNION ALL
            SELECT COUNT(*) as count FROM data WHERE start_year = 2022
        ) as counts";
        $year_result = $this->conn->query($year);
        $lastyears = $year_result->fetch_row()[0];

        // total countries
        $total_countries = "SELECT COUNT(DISTINCT country) as country_count FROM data";
        $total_countries_result = $this->conn->query($total_countries);
        $total_countries = $total_countries_result->fetch_row()[0];

        // Asian Countries
        $asiancountries_query = "SELECT COUNT(DISTINCT country) as country_count FROM data WHERE region LIKE '%Asia%'";
        $asiancountries_result = $this->conn->query($asiancountries_query);
        $asiancountries = $asiancountries_result->fetch_row()[0];


        //Europian Countries
        $europiancountries_query =  "SELECT COUNT(DISTINCT country) as country_count FROM data WHERE region LIKE '%Europe%'";
        $europiancountries_result = $this->conn->query($europiancountries_query);
        $europiancountries = $europiancountries_result->fetch_row()[0];

        //American Countries
        $americancountries_query =  "SELECT COUNT(DISTINCT country) as country_count FROM data WHERE region LIKE '%America%'";
        $americancountries_result = $this->conn->query($americancountries_query);
        $americancountries = $americancountries_result->fetch_row()[0];

         //Antartica Region
         $africancountries_query =  "SELECT COUNT(DISTINCT country) as country_count FROM data WHERE region LIKE '%Africa%'";
         $africancountries_result = $this->conn->query($africancountries_query);
         $africancountries = $africancountries_result->fetch_row()[0];
 



         //Top 4 Sectors
         $sector_query =  "SELECT sector, COUNT(*) AS count FROM data WHERE sector IS NOT NULL AND sector != '' GROUP BY sector ORDER BY count DESC LIMIT 4";
         $sector_result = $this->conn->query($sector_query);
         $sectors = [];
         $count = [];
           while ($row = $sector_result->fetch_assoc()) {
              $sectors[] = $row['sector'];
              $count[] = $row['count'];
              }
              //var_dump($sectors);
              //var_dump($count);
              $energy=$count[0];
              $it=$count[1];
              $manufacturing=$count[2];
              $financialserives=$count[3];





        //Automotive
        $Automotive_query = "SELECT COUNT(*) FROM data WHERE sector = 'Automotive';";
        $Automotive_result = $this->conn->query($Automotive_query);
        $Automotive= $Automotive_result->fetch_row()[0];

        //Healthcare
        $Healthcare_query = "SELECT COUNT(*) FROM data WHERE sector = 'Healthcare';";
        $Healthcare_result = $this->conn->query($Healthcare_query);
        $Healthcare= $Healthcare_result->fetch_row()[0];
        
        //Retail
        $Retail_query = "SELECT COUNT(*) FROM data WHERE sector = 'Retail';";
        $Retail_result = $this->conn->query($Retail_query);
        $Retail= $Retail_result->fetch_row()[0];
 
        //Construction
        $Construction_query = "SELECT COUNT(*) FROM data WHERE sector = 'Construction';";
        $Construction_result = $this->conn->query($Construction_query);
        $Construction= $Construction_result->fetch_row()[0];

        // Build the response array
        $response = array(
            'response' => true,
            'totalenteries' => $totalenteries,
            'lastyears' => $lastyears,
            'total_countries' => $total_countries,
            'asiancountries' => $asiancountries,
            'europiancountries' => $europiancountries,
            'americancountries'=>$americancountries,
            'africancountries'=>$africancountries,
            'energy'=>$energy,
            'it'=>$it,
            'manufacturing'=>$manufacturing,
            'financialservices'=>$financialserives,
            'Automotive'=>$Automotive,
            'Healthcare'=>$Healthcare,
            'Retail'=>$Retail,
            'Construction'=>$Construction

        );

        // Output the response in JSON format
        echo json_encode($response);
    }



    public function getdetails()
    {
        $array = array();
        $data = array();
        $showdatalimit = (int) isset($_POST['showdatalimit']) ? mysqli_real_escape_string($this->conn, $_POST['showdatalimit']) : 10;
        $currentpage = (int) isset($_POST['currentpage']) ? mysqli_real_escape_string($this->conn, $_POST['currentpage']) : 1;
        $startfrom = ($currentpage - 1) * $showdatalimit;
    
        $query = "SELECT end_year, intensity, sector, insight, topic, title, url, region, pestle FROM data ";
        $where = "ORDER BY id DESC LIMIT $startfrom, $showdatalimit ";
    
        $document = mysqli_query($this->conn, $query . $where);
        if (mysqli_num_rows($document) > 0) {
            $totalrows = mysqli_num_rows(mysqli_query($this->conn, "SELECT * FROM data"));
            while ($row = mysqli_fetch_assoc($document)) {
                $array[] = $row;
            }
            $data = array('response' => true, 'message' => 'success', 'details' => $array, 'totalrows' => $totalrows);
        } else {
            $data = array('response' => false, 'message' => "No data found.");
        }
        echo json_encode($data);
    }
}
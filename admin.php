<?php

include "helpers/csv.php";
include "lib/config.php";

$params = [];

$auth = getAuthentication();
if($auth->type === 'admin'){


    if($_POST){
        $table = csvToTable($_POST['csv'], $_POST['delim']);
        foreach ($table as $row) {
            $status = $db->query('INSERT INTO persons SET 
                      student_id = ?,
                      `name` = ?,
                      email = ?, 
                      password = ?, 
                      team = ?, 
                      points = 0, 
                      agree = 0',
                [
                    $row['ID'],
                    $row['Meno'],
                    $row['Email'],
                    $row['Heslo'],
                    $row['Tím'],
                ])->affectedRows();

            $status = $db->query('INSERT INTO teams SET 
                      `number` = ?,
                      points = 0',
                [
                    $row['Tím'],
                ])->affectedRows();

        }

    }

    if($_GET){
        $status = $db->query('SELECT * FROM persons WHERE team = ?',
            [
                $_GET['team'],
            ])->fetchAll();

        if($status){
            echo '
                <table>
                    <tr>
                        <th>Email</th>
                        <th>'.$params['Full Name'].'</th>
                        <th>'.$params['Points'].'</th>
                        <th>'.$params['Agree'].'</th>
                    </tr>
                    
                    ';
            foreach ($status as $i => $row){
                echo '
                    <tr>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['points'].'</td>
                        <td>'.$row['agree'].'</td>
                    
                    </tr>
                
                ';
            }
            echo '
                
                
                </table>
            ';
        }
    }
}
?>

<body>
<a href="index.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>
<a href="index.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>

    <form method="post">
        <label><?php echo $params['Study year']?>:
            <select name="year" id="year">
                <option value="2008">2008/2009</option>
                <option value="2009">2009/2010</option>
                <option value="2010">2010/2011</option>
                <option value="2011">2011/2012</option>
                <option value="2012">2012/2013</option>
                <option value="2013">2013/2014</option>
                <option value="2014">2014/2015</option>
                <option value="2015">2015/2016</option>
                <option value="2016">2016/2017</option>
                <option value="2017">2017/2018</option>
                <option value="2018">2018/2019</option>
            </select>
        </label>
        <label><?php echo $params['Subject name']?>: <input type="text" name="subject" id="subject"></label>
        <label><?php echo $params['CSV file']?>: <input type="file" name="csv" id="csv"></label>
        Delimiter: <label>; <input type="radio"> :<input type="radio" name="delim" id="delim"></label>
        <input type="submit" title="<?php echo $params['Save']?>">
    </form>

    <form method="get">
        <label><?php echo $params['Team']?>: <input type="text" name="team" id="team"> </label>
        <input type="submit" title="<?php echo $params['Get team']?>">

    </form>

</body>

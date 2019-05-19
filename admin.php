<?php

include "frontend.php";
include "helpers/csv.php";

$params = [];

if($_POST){
    $table = csvToTable($_POST['csv'], $_POST['delim']);

}
?>

<body>

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
    </form>

</body>

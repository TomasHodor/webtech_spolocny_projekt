<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");
include 'helpers/csv.php';

require_once("config.php");

echo '<!DOCTYPE html>';
if ($_GET["lang"] == "en") {
    echo '<html lang="en">
    <head>
    <title>Final project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" media="print" href="print.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">
    </head>
    
    <body>
    <header>
    <h1>Portal</h1>
    <a href="zadanie2.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>
    <a href="zadanie2.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="index.php?lang=en">Home</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="zadanie1.php?lang=en">Results</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="zadanie2.php?lang=en">Teams</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="zadanie3.php?lang=en">Passwords</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="tasks.php?lang=en">Tasks</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="documentation.php?lang=en">Documentation</a>
    </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
    <a class="nav-link disabled" href="#">Logged in as: ' . getAuthentication()->name . '</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="index.php?lang=en&logout">Logout</a>
    </li>
    </ul>
    </div>
    </nav>
    <h2>Teams</h2>';

    switch (getAuthentication()->type) {
        case 'student':
            //student
            $mail = getAuthentication()->mail;
//            $mail = 'a3@aa.aa';

            if(isset($_POST)){
                $score = 0;
                foreach ($_POST as $id => $post) {
                    $score += $post;
                }

                $max = $db->query('SELECT `max`, agree from persons where 
                      `year` = ? AND 
                      email = ? AND 
                      subject = ?',
                    [
                        '2018',
                        $mail,
                        'WT2',
                    ])->fetchArray();



                if($max['max'] >= $score){
                    foreach ($_POST as $id => $post){


                        $status = $db->query('UPDATE persons SET 
                          points = ? 
                          where `year` = ? AND 
                          student_id = ? AND 
                          subject = ?',

                            [
                                $post,
                                '2018',
                                $id,
                                'WT2',
                            ])->affectedRows();
                    }

//                    team leader agrees
                    if($max['agree'] !== 3) {
                        $status = $db->query('UPDATE persons SET 
                          agree = 2 
                          where `year` = ? AND 
                          email = ? AND 
                          subject = ?',

                            [
                                '2018',
                                $mail,
                                'WT2',
                            ])->affectedRows();
                    }

                }else{
                    echo "invalid point destribution";
                }

            }

            if(isset($_REQUEST) && $_REQUEST['des'] == 'agree'){
                $status = $db->query('UPDATE persons SET 
                          agree = 2 
                          where `year` = ? AND 
                          email = ? AND 
                          subject = ?',

                    [
                        '2018',
                        $mail,
                        'WT2',
                    ])->affectedRows();
            }
            if(isset($_REQUEST) && $_REQUEST['des'] == 'disagree'){
                $status = $db->query('UPDATE persons SET 
                          agree = 1 
                          where `year` = ? AND 
                          email = ? AND 
                          subject = ?',

                    [
                        '2018',
                        $mail,
                        'WT2',
                    ])->affectedRows();
            }


            $person = $db->query('SELECT `name`, `max`, team, leader from persons where 
                      `year` = ? AND 
                      email = ? AND 
                      subject = ?',
                [
                    '2018',
                    $mail,
                    'WT2',
                ])->fetchArray();

            $members = $db->query('SELECT `name`, points, student_id, agree from persons where 
                      `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                [
                    '2018',
                    $person['team'],
                    'WT2',
                ])->fetchAll();

            $rest = $person['max'];
            foreach ($members as $member){
                $rest -= $member['points'];
            }


            //ukazka pohladu kapitana, treba doplnit udaje
            echo '<form action="#" method="POST">';
            echo '<h3>WT2 - team</h3>';
            echo '<h4>Points for team: '. $rest  .'</h4>';

            foreach ($members as $member) {
                echo '<div class="form-group row">';
                echo '<label for="clen1" class="col-sm-6 col-form-label">'.$member['name'].'</label>';
                echo '<div class="col-sm-6">';
                if($person['max'] > 0){
                    if($member['agree'] === 3) {
                        echo 'admin agreed to this mark (' . $member['points'] . ')';
                        switch ($member['agree']) {
                            case 1:
                                echo '<a href="#"><i class="far fa-thumbs-down"></i></a>';
                                break;
                            case 2:
                                echo '<a href="#"><i class="far fa-thumbs-up"></i></a>';
                                break;
                            case 3:
                                echo '<a href="#"><i class="far fa-thumbs-up"></i></a>';
                                break;
                            case 4:
                                echo '<a href="#"><i class="far fa-thumbs-down"></i></a>';
                                break;
                        }
                    }else if($mail === $person['leader']) {
                        echo '<input type="number" class="form-control" id="' . $member['student_id'] . '" name="' . $member['student_id'] . '" min="0" max="40" value="' . $member['points'] . '">';
                        echo $member['agree'];
                        switch ($member['agree']){
                            case 1: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                            case 2: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                            case 3: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                            case 4: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                        }
                    }else {
                        echo 'Points: '. $member['points'] . ' ';
                        if($person['name'] === $member['name']) {
                            echo '<a href="zadanie2.php?lang=en&des=agree"><i class="far fa-thumbs-up"></i></a>';
                            echo '<a href="zadanie2.php?lang=en&des=disagree"><i class="far fa-thumbs-down"></i></a>';
                            switch ($member['agree']){
                                case 1: echo "(you disagreed)"; break;
                                case 2: echo "(you agreed)"; break;
                                case 3: echo "(admin agreed)"; break;
                                case 4: echo "(admin disagreed)"; break;
                                default: break;
                            }
                        }else{
                            switch ($member['agree']){
                                case 1: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                                case 2: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                                case 3: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                                case 4: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                            }
                        }
                    }
                }else {
                    echo 'Points: '. $member['points'] . ' ';
                }
                echo '</div>';
                echo '</div>';

            }
            echo '<div class="form-group row">';
            echo '<div class="col-sm-12">';
            echo '<input type="submit" class="btn btn-primary" value="Save">';
            echo '</div>';
            echo '</div>';
            echo '</form>';

            break;
        case 'admin':

            //admin
            if (isset($_POST) && $_POST['submit'] === 'add') {
                $table = csvToTable(file_get_contents($_FILES['csv']['tmp_name']), $_POST['delim']);
                foreach ($table as $row) {
                    $status = $db->query('INSERT INTO persons SET 
                      student_id = ?,
                      `name` = ?,
                      email = ?, 
                      password = ?, 
                      team = ?, 
                      leader = ?, 
                      subject = ?, 
                      `year` = ?, 
                      points = 0, 
                      `max` = 0, 
                      agree = null',
                        [
                            $row['ID'],
                            $row['Meno'],
                            $row['Email'],
                            $row['Heslo'],
                            $row['Team'],
                            $row['Lider'],
                            $_POST['subject'],
                            $_POST['year'],
                        ])->affectedRows();
                    $status = $db->query('INSERT INTO users SET 
                      id = ?,
                      meno = ?,
                      email = ?, 
                      heslo = ?, 
                      tim = ?, 
                      login = ?',
                        [
                            $row['ID'],
                            $row['Meno'],
                            $row['Email'],
                            $row['Heslo'],
                            $row['Team'],
                            $row['ID'],
                        ])->affectedRows();

                }
            }
            if(isset($_POST) && $_POST['submit'] === 'change'){
                foreach ($_POST as $id => $post){
                $status = $db->query('UPDATE persons SET 
                      `max` = ? 
                      where `year` = ? AND 
                      team = ? AND 
                      subject = ?',

                    [
                        $post,
                        '2018',
                        substr($id, 4),
                        'WT2',
                    ])->affectedRows();
                }

            }

            if(isset($_REQUEST) && $_REQUEST['action'] === 'agree'){
                $status = $db->query('UPDATE persons SET 
                      agree = 3 
                      where `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        '2018',
                        $_REQUEST['team'],
                        'WT2',
                    ])->affectedRows();
            }
            if(isset($_REQUEST) && $_REQUEST['action'] === 'disagree'){
                $status = $db->query('UPDATE persons SET 
                      agree = 4 
                      where `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        '2018',
                        $_REQUEST['team'],
                        'WT2',
                    ])->affectedRows();
            }


            echo '

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group row">
        <label for="year" class="col-sm-4 col-form-label">Study year:</label>
            <div class="col-sm-8"><select class="form-control" name="year" id="year">
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
            </select></div>
        
        </div>
        <div class="form-group row">
            <label for="subject" class="col-sm-4 col-form-label">Subject title</label> 
            <div class="col-sm-8"><input type="text" class="form-control" name="subject" id="subject"></div>
        </div>
        <div class="form-group row">
            <label for="csv" class="col-sm-4 col-form-label">CSV file: </label>
            <div class="col-sm-8"><input type="file" class="form-control" name="csv" id="csv"></div>
        </div>
        <div class="form-group row">
        <label for="delim" class="col-sm-4 col-form-label">Delimiter: </label>
         <b>;</b> <input type="radio" name="delim" value=";" id="delim" class="col-sm-1 col-form-label">
         <b>:</b> <input type="radio" name="delim" value=":" id="delim" class="col-sm-1 col-form-label">
        </div>
       <div class="form-group row">
            <div class="col-sm-12"><input type="submit" class="btn btn-primary"  value="add" name="submit"></div>
        </div>
    </form>
';

//            echo '<select class="form-control" id="oddelovac">';
//            echo '<option name="ciarka">,</option>';
//            echo '<option name="bodkociarka">;</option>';
//            echo '</select>';



            $subject = 'WT2';
            $year = '2018';

            $teams = $db->query('SELECT DISTINCT team, `max` from persons where 
                      `year` = ? AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();


            echo '<form action="#" method="POST">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';

            foreach ($teams as $team){
                echo '<div class="form-group row">';
                echo '<label for="tim1" class="col-sm-3 col-form-label"> Team '. $team['team'] .'</label>';
                echo '<label for="tim1" class="col-sm-3 col-form-label">';
                $members = $db->query('SELECT `name` from persons where 
                      `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        $year,
                        $team['team'],
                        $subject,
                    ])->fetchAll();

                foreach ($members as $member){
                    echo $member['name'] . '<br>';
                }
                echo '</label>';
                echo '<div class="col-sm-6">';
                echo '<input type="number" class="form-control" id="tim1" name="team'.$team['team'].'" min="0" max="150" value="'.$team['max'].'">';
                echo '</div>';
                echo '</div>';

            }
            echo '<div class="form-group row">';
            echo '<div class="col-sm-12">';
            echo '<input type="submit" class="btn btn-primary" value="change" name="submit">';
            echo '</div>';
            echo '</div>';
            echo '</form>';

            foreach ($teams as $team) {
                echo '<div class="table-responsive-sm tab">';
                $members = $db->query('SELECT * from persons where 
                      `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        $year,
                        $team['team'],
                        $subject,
                    ])->fetchAll();
                echo '<h3>Team '.$team['team'].'</h3>';
                echo '<table class="table table-hover table-sm">';
                echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
                echo '<tr><th scope="col">Email</th>';
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Points</th>';
                echo '<th scope="col">Agree</th></tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($members as $member){
                    echo '<tr><td>'.$member['email'].'</td>';
                    echo '<td>'.$member['name'].'</td>';
                    echo '<td>'.$member['points'].'</td>';
                    echo '<td>';
                    switch ($member['agree']){
                        case 1: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                        case 2: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                        case 3: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                        case 4: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                        default: break;
                    }
                    echo '</td></tr>';

                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                if($members[0]['agree'] !== 3) {
                    echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 20%;">';
                    echo '
                        <button onclick="document.location.href=\'zadanie2.php?lang=en&action=agree&team='.$team['team'].'\'"><i class="far fa-thumbs-up"></i> I agree</button>
                        <button onclick="document.location.href=\'zadanie2.php?lang=en&action=disagree&team='.$team['team'].'\'"><i class="far fa-thumbs-down"></i> I disagree</button>
                    ';
                    echo '</div>';
                }else{
                    echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 20%;">';
                    echo "<p>You agreed with the decision</p>";
                    echo '</div>';
                }

            }

            $students_total = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();

            $students_agree = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      (agree = 2 OR agree = 3) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();

            $students_disagree = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      (agree = 1 OR agree = 4) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();

            $students_indifferent = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      (agree IS null) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();


            echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 10%;">';
            echo '<button type="button" class="btn btn-primary" onclick="document.location.href=\'export.php\'">Export</button>';
            echo '</div>';

            echo '<div class="table-responsive-sm tab">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<tbody>';
            echo '<tr><td>Count of students</td>';
            echo '<td>'.$students_total['c'].'</td></tr>';
            echo '<tr><td>Count of agreeing students</td>';
            echo '<td>'.$students_agree['c'].'</td></tr>';
            echo '<tr><td>Count of disagreeing students</td>';
            echo '<td>'.$students_disagree['c'].'</td></tr>';
            echo '<tr><td>Count of students without opinion</td>';
            echo '<td>'.$students_indifferent['c'].'</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            $teams = $db->query('SELECT distinct team from persons where 
                      `year` = ? AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams = sizeof($teams);

            $teams_clear = $db->query('SELECT distinct team from persons where 
                      `year` = ? AND 
                      (agree = 3) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams_clear = sizeof($teams_clear);

            $teams_comment = $db->query('SELECT distinct team  from persons where 
                      `year` = ? AND 
                      (agree = 4) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams_comment = sizeof($teams_comment);

            $teams_unknown = $db->query('SELECT distinct team  from persons where 
                      `year` = ? AND 
                      (agree IS NULL) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams_unknown = sizeof($teams_unknown);

            echo '<div class="table-responsive-sm tab">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<tbody>';
            echo '<tr><td>Count of teams</td>';
            echo '<td>'.$teams.'</td></tr>';
            echo '<tr><td>Count of closed teams</td>';
            echo '<td>'.$teams_clear.'</td></tr>';
            echo '<tr><td>Count of teams to comment</td>';
            echo '<td>'.$teams_comment.'</td></tr>';
            echo '<tr><td>Count of teams with students without opinion</td>';
            echo '<td>'.$teams_unknown.'</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            break;
        default:
            header('Location: index.php?lang=en&notallowed');
            break;
    }
} else {
    echo '<html lang="sk">';
    echo '<head>';
    echo '<title>Záverečný projekt</title>';
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">';
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
    echo '<link rel="stylesheet" type="text/css" media="print" href="print.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<h1>Portál</h1>';
    echo '<a href="zadanie2.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie2.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<nav class="navbar navbar-expand-lg navbar-dark">';
    echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
    echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
    echo '<ul class="navbar-nav mr-auto">';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="index.php?lang=sk">Domov</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="zadanie1.php?lang=sk">Výsledky</a>';
    echo '</li>';
    echo '<li class="nav-item active">';
    echo '<a class="nav-link" href="zadanie2.php?lang=sk">Tímy</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="zadanie3.php?lang=sk">Heslá</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="tasks.php?lang=sk">Úlohy</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="documentation.php?lang=sk">Dokumentácia</a>';
    echo '</li>';
    echo '</ul>';
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li class="nav-item">';
    echo '<a class="nav-link disabled" href="#">Prihlásený/á: ' . getAuthentication()->name . '</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="index.php?lang=sk&logout">Odhlásiť sa</a>';
    echo '</li>';
    echo '</ul>';
    echo '</div>';
    echo '</nav>';
    echo '<h2>Tímy</h2>';

    switch (getAuthentication()->type) {
        case 'student':
            //student
            $mail = getAuthentication()->mail;
//            $mail = 'a3@aa.aa';

            if(isset($_POST)){
                $score = 0;
                foreach ($_POST as $id => $post) {
                    $score += $post;
                }

                $max = $db->query('SELECT `max`, agree from persons where 
                      `year` = ? AND 
                      email = ? AND 
                      subject = ?',
                    [
                        '2018',
                        $mail,
                        'WT2',
                    ])->fetchArray();



                if($max['max'] >= $score){
                    foreach ($_POST as $id => $post){


                        $status = $db->query('UPDATE persons SET 
                          points = ? 
                          where `year` = ? AND 
                          student_id = ? AND 
                          subject = ?',

                            [
                                $post,
                                '2018',
                                $id,
                                'WT2',
                            ])->affectedRows();
                    }

//                    team leader agrees
                    if($max['agree'] !== 3) {
                        $status = $db->query('UPDATE persons SET 
                          agree = 2 
                          where `year` = ? AND 
                          email = ? AND 
                          subject = ?',

                            [
                                '2018',
                                $mail,
                                'WT2',
                            ])->affectedRows();
                    }

                }else{
                    echo "Nepovolene rozdelenie bodov";
                }

            }

            if(isset($_REQUEST) && $_REQUEST['des'] == 'agree'){
                $status = $db->query('UPDATE persons SET 
                          agree = 2 
                          where `year` = ? AND 
                          email = ? AND 
                          subject = ?',

                    [
                        '2018',
                        $mail,
                        'WT2',
                    ])->affectedRows();
            }
            if(isset($_REQUEST) && $_REQUEST['des'] == 'disagree'){
                $status = $db->query('UPDATE persons SET 
                          agree = 1 
                          where `year` = ? AND 
                          email = ? AND 
                          subject = ?',

                    [
                        '2018',
                        $mail,
                        'WT2',
                    ])->affectedRows();
            }


            $person = $db->query('SELECT `name`, `max`, team, leader from persons where 
                      `year` = ? AND 
                      email = ? AND 
                      subject = ?',
                [
                    '2018',
                    $mail,
                    'WT2',
                ])->fetchArray();

            $members = $db->query('SELECT `name`, points, student_id, agree from persons where 
                      `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                [
                    '2018',
                    $person['team'],
                    'WT2',
                ])->fetchAll();

            $rest = $person['max'];
            foreach ($members as $member){
                $rest -= $member['points'];
            }


            //ukazka pohladu kapitana, treba doplnit udaje
            echo '<form action="#" method="POST">';
            echo '<h3>WT2 - tím na vypracovanie záverečného projektu</h3>';
            echo '<h4>Body pridené tímu: '. $rest  .'</h4>';

            foreach ($members as $member) {
                echo '<div class="form-group row">';
                echo '<label for="clen1" class="col-sm-6 col-form-label">'.$member['name'].'</label>';
                echo '<div class="col-sm-6">';
                if($person['max'] > 0){
                    if($member['agree'] === 3){
                        echo 'Admin Suhlasi s touto znackou (' . $member['points'] . ')';
                        switch ($member['agree']){
                            case 1: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                            case 2: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                            case 3: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                            case 4: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                        }

                    }else if($mail === $person['leader']) {
                        echo '<input type="number" class="form-control" id="' . $member['student_id'] . '" name="' . $member['student_id'] . '" min="0" max="40" value="' . $member['points'] . '">';
                        echo $member['agree'];
                        switch ($member['agree']){
                            case 1: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                            case 2: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                            case 3: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                            case 4: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                        }
                    }else {
                        echo 'Points: '. $member['points'] . ' ';
                        if($person['name'] === $member['name']) {
                            echo '<a href="zadanie2.php?lang=sk&des=agree"><i class="far fa-thumbs-up"></i></a>';
                            echo '<a href="zadanie2.php?lang=sk&des=disagree"><i class="far fa-thumbs-down"></i></a>';
                            switch ($member['agree']){
                                case 1: echo "(Ste sa nesuhlasili)"; break;
                                case 2: echo "(Ste sa suhlasili)"; break;
                                case 3: echo "(Admin suhlasi)"; break;
                                case 4: echo "(Admin nesuhlasi)"; break;
                                default: break;
                            }
                        }else{
                            switch ($member['agree']){
                                case 1: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                                case 2: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                                case 3: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                                case 4: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                            }
                        }
                    }
                }else {
                    echo 'Points: '. $member['points'] . ' ';
                }
                echo '</div>';
                echo '</div>';

            }
            echo '<div class="form-group row">';
            echo '<div class="col-sm-12">';
            echo '<input type="submit" class="btn btn-primary" value="Save">';
            echo '</div>';
            echo '</div>';
            echo '</form>';

            break;
        case 'admin':
            //admin
            if (isset($_POST) && $_POST['submit'] === 'add') {
                $table = csvToTable(file_get_contents($_FILES['csv']['tmp_name']), $_POST['delim']);
                foreach ($table as $row) {
                    $status = $db->query('INSERT INTO persons SET 
                      student_id = ?,
                      `name` = ?,
                      email = ?, 
                      password = ?, 
                      team = ?, 
                      leader = ?, 
                      subject = ?, 
                      `year` = ?, 
                      points = 0, 
                      `max` = 0, 
                      agree = null',
                        [
                            $row['ID'],
                            $row['Meno'],
                            $row['Email'],
                            $row['Heslo'],
                            $row['Team'],
                            $row['Lider'],
                            $_POST['subject'],
                            $_POST['year'],
                        ])->affectedRows();
                    $status = $db->query('INSERT INTO users SET 
                      id = ?,
                      meno = ?,
                      email = ?, 
                      heslo = ?, 
                      tim = ?, 
                      login = ?',
                        [
                            $row['ID'],
                            $row['Meno'],
                            $row['Email'],
                            $row['Heslo'],
                            $row['Team'],
                            $row['ID'],
                        ])->affectedRows();

                }
            }
            if(isset($_POST) && $_POST['submit'] === 'change'){
                foreach ($_POST as $id => $post){
                    $status = $db->query('UPDATE persons SET 
                      `max` = ? 
                      where `year` = ? AND 
                      team = ? AND 
                      subject = ?',

                        [
                            $post,
                            '2018',
                            substr($id, 4),
                            'WT2',
                        ])->affectedRows();
                }

            }

            if(isset($_REQUEST) && $_REQUEST['action'] === 'agree'){
                $status = $db->query('UPDATE persons SET 
                      agree = 3 
                      where `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        '2018',
                        $_REQUEST['team'],
                        'WT2',
                    ])->affectedRows();
            }
            if(isset($_REQUEST) && $_REQUEST['action'] === 'disagree'){
                $status = $db->query('UPDATE persons SET 
                      agree = 4 
                      where `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        '2018',
                        $_REQUEST['team'],
                        'WT2',
                    ])->affectedRows();
            }


            echo '

    <form method="POST" enctype="multipart/form-data">
        <h3>Pridávanie študentov</h3>
        <div class="form-group row">
        <label for="year" class="col-sm-4 col-form-label">Školský rok:</label>
            <div class="col-sm-8"><select class="form-control" name="year" id="year">
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
            </select></div>
        
        </div>
        <div class="form-group row">
            <label for="subject" class="col-sm-4 col-form-label">Názov predmetu</label> 
            <div class="col-sm-8"><input type="text" class="form-control" name="subject" id="subject"></div>
        </div>
        <div class="form-group row">
            <label for="csv" class="col-sm-4 col-form-label">CSV file: </label>
            <div class="col-sm-8"><input type="file" class="form-control" name="csv" id="csv"></div>
        </div>
        <div class="form-group row">
        <label for="delim" class="col-sm-4 col-form-label">Delimiter: </label>
         <b>;</b> <input type="radio" name="delim" value=";" id="delim" class="col-sm-1 col-form-label">
         <b>:</b> <input type="radio" name="delim" value=":" id="delim" class="col-sm-1 col-form-label">
        </div>
       <div class="form-group row">
            <div class="col-sm-12"><input type="submit" class="btn btn-primary"  value="add" name="submit"></div>
        </div>
    </form>
';

//            echo '<select class="form-control" id="oddelovac">';
//            echo '<option name="ciarka">,</option>';
//            echo '<option name="bodkociarka">;</option>';
//            echo '</select>';



            $subject = 'WT2';
            $year = '2018';

            $teams = $db->query('SELECT DISTINCT team, `max` from persons where 
                      `year` = ? AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();


            echo '<form action="#" method="POST">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';

            foreach ($teams as $team){
                echo '<div class="form-group row">';
                echo '<label for="tim1" class="col-sm-3 col-form-label"> Tím '. $team['team'] .'</label>';
                echo '<label for="tim1" class="col-sm-3 col-form-label">';
                $members = $db->query('SELECT `name` from persons where 
                      `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        $year,
                        $team['team'],
                        $subject,
                    ])->fetchAll();

                foreach ($members as $member){
                    echo $member['name'] . '<br>';
                }
                echo '</label>';
                echo '<div class="col-sm-6">';
                echo '<input type="number" class="form-control" id="tim1" name="team'.$team['team'].'" min="0" max="150" value="'.$team['max'].'">';
                echo '</div>';
                echo '</div>';

            }
            echo '<div class="form-group row">';
            echo '<div class="col-sm-12">';
            echo '<input type="submit" class="btn btn-primary" value="change" name="submit">';
            echo '</div>';
            echo '</div>';
            echo '</form>';

            foreach ($teams as $team) {
                echo '<div class="table-responsive-sm tab">';
                $members = $db->query('SELECT * from persons where 
                      `year` = ? AND 
                      team = ? AND 
                      subject = ?',
                    [
                        $year,
                        $team['team'],
                        $subject,
                    ])->fetchAll();
                echo '<h3>Tím '.$team['team'].'</h3>';
                echo '<table class="table table-hover table-sm">';
                echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
                echo '<tr><th scope="col">Email</th>';
                echo '<th scope="col">Meno</th>';
                echo '<th scope="col">Body</th>';
                echo '<th scope="col">Súhlas</th></tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($members as $member){
                    echo '<tr><td>'.$member['email'].'</td>';
                    echo '<td>'.$member['name'].'</td>';
                    echo '<td>'.$member['points'].'</td>';
                    echo '<td>';
                    switch ($member['agree']){
                        case 1: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                        case 2: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                        case 3: echo '<a href="#"><i class="far fa-thumbs-up"></i></a>'; break;
                        case 4: echo '<a href="#"><i class="far fa-thumbs-down"></i></a>'; break;
                        default: break;
                    }
                    echo '</td></tr>';

                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                if($members[0]['agree'] !== 3) {
                    echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 20%;">';
                    echo '
                        <button onclick="document.location.href=\'zadanie2.php?lang=sk&action=agree&team='.$team['team'].'\'"><i class="far fa-thumbs-up"></i> Súhlasim</button>
                        <button onclick="document.location.href=\'zadanie2.php?lang=sk&action=disagree&team='.$team['team'].'\'"><i class="far fa-thumbs-down"></i> Nesúhlasim</button>
                    ';
                    echo '</div>';
                }else{
                    echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 20%;">';
                    echo "<p>Súhlasili ste sa s bodovanim</p>";
                    echo '</div>';
                }

            }

            $students_total = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();

            $students_agree = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      (agree = 2 OR agree = 3) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();

            $students_disagree = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      (agree = 1 OR agree = 4) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();

            $students_indifferent = $db->query('SELECT count(*) as c from persons where 
                      `year` = ? AND 
                      (agree IS null) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchArray();


            echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 10%;">';
            echo '<button type="button" class="btn btn-primary" onclick="document.location.href=\'export.php\'">Export</button>';
            echo '</div>';

            echo '<div class="table-responsive-sm tab">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<tbody>';
            echo '<tr><td>Počet študentov</td>';
            echo '<td>'.$students_total['c'].'</td></tr>';
            echo '<tr><td>Počet súhlasiacich študentov</td>';
            echo '<td>'.$students_agree['c'].'</td></tr>';
            echo '<tr><td>Počet nesúhlasiacich študentov</td>';
            echo '<td>'.$students_disagree['c'].'</td></tr>';
            echo '<tr><td>Počet študentov, ktorý sa nevyjadrili</td>';
            echo '<td>'.$students_indifferent['c'].'</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';



            $teams = $db->query('SELECT distinct team from persons where 
                      `year` = ? AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams = sizeof($teams);

            $teams_clear = $db->query('SELECT distinct team from persons where 
                      `year` = ? AND 
                      (agree = 3) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams_clear = sizeof($teams);

            $teams_comment = $db->query('SELECT distinct team  from persons where 
                      `year` = ? AND 
                      (agree = 4) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams_comment = sizeof($teams);

            $teams_unknown = $db->query('SELECT distinct team  from persons where 
                      `year` = ? AND 
                      (agree IS null) AND 
                      subject = ?',
                [
                    $year,
                    $subject,
                ])->fetchAll();

            $teams_unknown = sizeof($teams);

            echo '<div class="table-responsive-sm tab">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<tbody>';
            echo '<tr><td>Počet tímov</td>';
            echo '<td>'.$teams.'</td></tr>';
            echo '<tr><td>Počet uzavretých tímov</td>';
            echo '<td>'.$teams_clear.'</td></tr>';
            echo '<tr><td>Počet tímov, ku ktorým sa treba vyjadriť</td>';
            echo '<td>'.$teams_comment.'</td></tr>';
            echo '<tr><td>Počet tímov s nevyjadrenými študentami</td>';
            echo '<td>'.$teams_unknown.'</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            break;

        default:
            //header('Location: index.php?notallowed');
            break;
    }
}
echo '</body>';
echo '</html>';
?>
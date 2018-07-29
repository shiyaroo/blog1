<!doctype html>
<html lang=''>
<?php include('dbconnect.php');?>

<head>

    <style>
        *{margin:0px; padding:0px}
        body{ font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif; text-align:center }
        h1 {  font-family: Helvetica, Arial, sans-serif;  text-align: center; font-size:50px; margin-top:80px; color:#fff;
            text-shadow: 2px 2px 0px rgba(255,255,255,.7), 5px 7px 0px rgba(107, 79, 198, 0.68); margin-bottom:40px;
        }
        #difull p{ color: black; font-size:20px; margin:5px; }
        .pagination {
            padding: 6px;
        }
        div.pagination a {
            padding: 5px 12px;
            margin:6px;
            border: 2px inset #AAAADD;
            text-decoration: none;
            color: #109fff;
            background:#fff;
            border-radius: 5px;


        }
        div.pagination a:hover, div.pagination a:active {
            border: 2px inset #000;
            color: #fff;
            background: #61ffee;
            border-radius: 5px;

        }
        div.pagination span.current {
            padding: 5px 12px;
            margin: 2px;
            border: 2px outset #14c5ff;
            font-weight: bold;
            background-color: #7ab8ff;
            color: #fff;  border-radius: 5px;
        }
        div.pagination span.disabled {
            padding: 5px 12px;
            margin: 2px;
            border: 1px outset #EEE;
            color: #fff;
            background: #71a930;  border-radius: 5px;  display: flex;
            flex-wrap: wrap;
            align-content: space-between;
        }


    </style>
</head>

<body>
<div id="difull">
    <?php
    $tbl_name="info"; //your table name
    $adjacents = 3; // How many adjacent pages should be shown on each side?
    $query = "SELECT COUNT(*) as num FROM $tbl_name";
    $total_pages = mysql_fetch_array(mysql_query($query));
    $total_pages = $total_pages["num"];			//$total_pages = $total_pages[num];//
    $targetpage = "pagination.php"; 					//your file name  (the name of this file)//
    $limit =5;
    //how many items to show per page

        $page = isset ( $_GET['page']);


    if($page)
        $start = ($page - 1) * $limit; 			//first item to display on this page
    else
        $start = 0;								//if no page var is given, set start to 0
    $sql = "SELECT id as id , name as name , address as address  FROM $tbl_name LIMIT $start, $limit";
    $result = mysql_query($sql);
    if ($page == 0) $page = 1;					//if no page var is given, default to 1.
    $prev = $page - 1;							//previous page is page - 1
    $next = $page + 1;							//next page is page + 1
    $lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;						//last page minus 1
    /*
        Now we apply our rules and draw the pagination object.
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {
        $pagination .= "<div class=\"pagination\">";

//previous button
        if ($page > 1)
            $pagination.= "<a href=\"$targetpage?page=$prev\">Previous</a>";
        else
            $pagination.= "<span class=\"disabled\">Previous</span>";

//pages
        if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
        {
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
            }

//in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
            }

//close to end; only hide early pages
            else
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                }
            }
        }

//next button
        if ($page < $counter - 1)
            $pagination.= "<a href=\"$targetpage?page=$next\">Next</a>";
        else
            $pagination.= "<span class=\"disabled\">Next</span>";
        $pagination.= "</div>\n";
    }
    ?>

    <?php
    $sql = "SELECT id as id , name as name , address as address  FROM $tbl_name LIMIT $start, $limit";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result))
    {
        // Your while loop here
    }
    ?>


    <?php
    $query = mysql_query("SELECT id as id , name as name , address as address   FROM info LIMIT $start, $limit");
    if (!$query){die (''.mysql_error());
    }
    while ($data = mysql_fetch_array($query)) {
        $id=$data['id'];
        ?>
        <div class="contain">
    <table >
      <div >  <thead>
        <tr>
            <th>ID</th>

            <th>Name</th>
            <th>Address</th>
        </tr>
        </thead></div>
        <thead>
        <tr>
            <th><?php echo $data['id' ]; ?></th>
            <th><?php echo $data['name' ]; ?></th>
            <th><?php echo $data['address' ]; ?></th>
        </tr>
        </thead>
    </table></div>
        <?php
    }
    ?>
    <div style="margin-top:60px"> <?=$pagination?></div>
</div>
</body>
<html>
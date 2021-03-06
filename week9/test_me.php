<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/30/2015
 * Time: 7:01 PM
 */

require_once('includes/constants.php');
require_once('includes/db_constants.php');
include_once('includes/NamePopularityRecord.php');
include_once('includes/NamePopularitySet.php');
include_once('includes/NameSet.php');
include_once('includes/MetaphoneSet.php');
require_once('includes/code.php');
require_once('includes/BarChart.php');



//$marc = new NamePopularityRecord('Marc', 'M', 1962, 1500, 900000, metaphone('Marc'));
//$marc->setName('Marc');
//$marc->setGender('M');
//$marc->setYear(1962);
//$marc->setCount(1500);
//$marc->setTotal(900000);

//$jill = new NamePopularityRecord('Jill', 'F', 1990, 3000, 1000000, metaphone('Jill'));
//$jill->setName('Jill');
//$jill->setGender('F');
//$jill->setYear(1990);
//$jill->setCount(3000);
//$jill->setTotal(100000);

//$records = new NameSet('Keith', 'M', 'MRK');
$records = new MetaphoneSet('MRK', 'M', 50);
//$chart = new BarChart($records->getRecords(), 400);

?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Week 9 Object-Orientated Programming</title>
     <link rel="stylesheet" href="includes/week9.css.php" type="text/css">
     <script src="includes/week9.js.php"></script>
</head>
<body>
<pre>
     <?php
     foreach ($records->getRecords() as $record) {
          MetaphoneSet::$count++;
          $record->setRank(MetaphoneSet::$count);
     }
     print_r($records);
     MetaphoneSet::whatAmI();
     ?>
</pre>
</body>
</html>

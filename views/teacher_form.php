<?php


//define the variables
$teacher_id = $_GET['teacher'];
$time = $_GET['time'];
//display the form
echo '<form class="app_form" id="appointment" method="post" action="index.php?form">';

echo '<div class="errors"></div>';
echo 'Parent: ';

echo '<select id="parent" name="parent">';
$sql = 'SELECT * FROM users WHERE desc != "" AND status='.USER_PARENT.' ORDER BY uid ASC';
$stmt = $dbHandle->prepare($sql);
$stmt->execute();
while($row = $stmt->fetch()) {
  echo '<option value="'.$row['id'].'">'.$row['lname'].' ('.$row['desc'].')</option>';
}
echo '</select>';

echo '<br />';

echo 'Time: '.date('l j F Y h:i A',$time);
echo '<input id="time" type="hidden" name="time" value="'.$time.'" />';
echo '<br />';

echo '<input id="hash" type="hidden" name="hash" value="'.md5($secure_hash.$time).'  " />';

echo '<input type="submit" id="submit" value="Submit" />';
echo '</form>';

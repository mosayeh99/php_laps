<?php

echo nl2br("I \nLove \nPHP");
echo '<br>';

echo '******************************';
$arr = [
   0 => 12,
   1 => 45,
   2 => 10,
   3 => 25
];

echo '<pre>';
print_r($arr);
echo '</pre>';
echo "Sum = ".array_sum($arr);
echo '<br>';
echo "Arg = ".(array_sum($arr) / count($arr));
echo '<br>';
echo '<br>';
echo 'Array in reverse order:';
echo '<pre>';
Krsort($arr);
print_r($arr);
echo '</pre>';

echo '******************************';
$arr2 = array(
   "Sara"=>31,
   "John"=>41,
   "Walaa"=>39,
   "Ramy"=>40
);
echo '<br>';
echo 'ascending order sort by value:';
echo '<pre>';
sort($arr2);
print_r($arr2);
echo '</pre>';

echo 'ascending order sort by Key:';
echo '<pre>';
ksort($arr2);
print_r($arr2);
echo '</pre>';

echo 'descending order sorting by Value:';
echo '<pre>';
rsort($arr2);
print_r($arr2);
echo '</pre>';

echo 'descending order sorting by Key:';
echo '<pre>';
krsort($arr2);
print_r($arr2);
echo '</pre>';

echo '******************************';
$students = [
   ['name' => 'Alaa', 'email' => 'alaa@test.com', 'status' => 'PHP'],
   ['name' => 'Shamy', 'email' => 'shamy@test.com', 'status' => '.Net'],
   ['name' => 'Youssef', 'email' => 'youssef@test.com', 'status' => 'Testing'],
   ['name' => 'Waleid', 'email' => 'waleid@test.com', 'status' => 'PHP'],
   ['name' => 'Rahma', 'email' => 'rahma@test.com', 'status' => 'Front End'],
];
?>
<table>
   <thead>
      <tr>
         <td>Name</td>
         <td>Email</td>
         <td>Status</td>
      <tr>
   </thead>
   <tbody>
   <?php foreach($students as $substudents){ ?>
      <?php if ($substudents['status'] == 'PHP') { ?>
   <tr style="color:red">
      <?php foreach($substudents as $key=>$value){ ?>
      <td><?php echo $value; ?></td>
      <?php } ?>
   <tr>
      <?php }else{?>
   <tr>
      <?php foreach($substudents as $key=>$value){ ?>
      <td><?php echo $value; ?></td>
      <?php } ?>
   <tr>
      <?php }?>
   <?php }?>
</tbody>
</table>



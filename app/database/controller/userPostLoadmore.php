<?php 

$sernamename = "localhost"; 

$username = "root"; 

$passoword = ""; 

$databasename= "blog"; 

$con = new mysqli($sernamename, $username,$passoword,$databasename); 

if ($con->connect_error) { 

die("Connection failed". $con->connect_error); 

} 

$limit = 2; 

if (isset($_POST['page_no'])) { 

$page = $_POST['page_no']; 

}else{ 

$page = 0; 

} 

$sql = "SELECT * FROM posts WHERE user_id= 2 LIMIT $page, $limit"; 

$query = $con->query($sql); 

if ($query->num_rows > 0) { 

$output = ""; 

$output .= "<tbody>"; 

while ($row = $query->fetch_assoc()) { 

$last_id = $row['id']; 

$output.="<tr> 


<td>{$row["id"]}</td> 

<td>{$row["created_at"]}</td> 

<td>{$row["user_id"]}</td> 

<td>{$row["topic_id"]}</td> 

<td>{$row["title"]}</td> 

</tr>"; 

} 

$output .= "<tbody>"; 

$output .= "<tbody id='pagination'> 

<tr> 

<td colspan='5'><button class='btn btn-success loadbtn' data-id='{$last_id}' style='margin-left:500px'>Load More</button></td> 

</tr> 

</tbody>"; 

echo $output; 

} 

?>

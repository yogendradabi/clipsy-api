<?php
//Migrate raw data to core database
$servername = "localhost:3306";
$username = "homestead";
$password = "secret";
$dbname="clipsy";
$resultArrayCount=0;
// For resultant array
$resultArrayDataEntry=array();
// Create connection1
$conn1 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
} 

$sql = "SELECT * FROM RAWITEMS";
$result = $conn1->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $resultArrayDataEntry["product_id"][$resultArrayCount]=$row["product_id"];
         $resultArrayDataEntry["title"][$resultArrayCount]=$row["title"];
         $resultArrayDataEntry["product_description"][$resultArrayCount]=$row["productDescription"];
         $resultArrayDataEntry["image_url_01"][$resultArrayCount]=$row["small"];
         $resultArrayDataEntry["image_url_02"][$resultArrayCount]=$row["medium"];
         $resultArrayDataEntry["image_url_03"][$resultArrayCount]=$row["large"];
         $resultArrayDataEntry["maximum_retail_price"][$resultArrayCount]=$row["maximumRetailPrice"];
         $resultArrayDataEntry["selling_price"][$resultArrayCount]=$row["sellingPrice"];
         $resultArrayDataEntry["product_url"][$resultArrayCount]=$row["productUrl"];
         $resultArrayDataEntry["product_brand"][$resultArrayCount]=$row["productBrand"];
         $resultArrayDataEntry["size"][$resultArrayCount]=$row["size"];
         $resultArrayDataEntry["color"][$resultArrayCount]=$row["color"];
         $resultArrayDataEntry["category"][$resultArrayCount]=$row["category"];
         $resultArrayCount++;
    }
} else {
    echo "0 results";
}
$conn1->close();
// Create connection2
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
} 

	//Information of jason database
	for($itr=0;$itr<$resultArrayCount;$itr++)
	{
		$product_id = $resultArrayDataEntry['product_id'][$itr];
		$title = $resultArrayDataEntry['title'][$itr];
		$productDescription = $resultArrayDataEntry['product_description'][$itr];
		$small = $resultArrayDataEntry['image_url_01'][$itr];
		$medium = $resultArrayDataEntry['image_url_02'][$itr];	
		$large = $resultArrayDataEntry['image_url_03'][$itr];
		$sellingPrice= $resultArrayDataEntry['selling_price'][$itr];
		$maximumRetailPrice = $resultArrayDataEntry['maximum_retail_price'][$itr];
		$productUrl = $resultArrayDataEntry['product_url'][$itr];
		$productBrand = $resultArrayDataEntry['product_brand'][$itr];
		$size = $resultArrayDataEntry['size'][$itr];
		$category=$resultArrayDataEntry['category'][$itr];
		$color=$resultArrayDataEntry['color'][$itr];
//	    echo "product_id: ".$product_id."title: ".$title."productDescription: ".$productDescription."url: ".$small;
		//sql query
		$sql1 = "INSERT INTO ITEMS (productId, affiliateUrl, imagePath,price,rating,color) VALUES ('$product_id','$productUrl','home/image/','$sellingPrice',1,'$color');";
//		$sql1 = "INSERT INTO ITEM_CATEGORIES (itemId, categoryId) VALUES ('$product_id','$category');";

		if (mysqli_query($conn2, $sql1)) {
		    echo "Record #".$itr."created successfully into ITEMS"."\r\n";
		} else {
		    echo "Error: " . $sql1 . mysqli_error($conn2)."\r\n";
		}
		$sql2 = "SELECT  categoryId FROM  CATEGORIES where categoryName='".$category."'";
		$sql3 = "SELECT  itemId FROM  ITEMS where productId='".$product_id."'";
		$result2 = $conn2->query($sql2);
		$result3 = $conn2->query($sql3);
		$itemIdCategories=0;
		$categoryIdCategories=0;

		if ($result2->num_rows > 0) {
		    // output data of each row
		    while($row = $result2->fetch_assoc()) {
		         $categoryIdCategories=$row["categoryId"];

		    }
		} else {
		    echo "0 results for categoryId";
		}	
		if ($result3->num_rows > 0) {
		    // output data of each row
		    while($row = $result3->fetch_assoc()) {
		         $itemIdCategories=$row["itemId"];

		    }
		} else {
		    echo "0 results for itemId";
		}			
		$sql4 = "INSERT INTO ITEM_CATEGORIES (itemId, categoryId) VALUES ('$itemIdCategories','$categoryIdCategories');";
				if (mysqli_query($conn2, $sql4)) {
		    echo "Record #".$itr."created successfully into ITEMS_CATEGORIES"."\r\n";
		} else {
		    echo "Error: " . $sql1 . mysqli_error($conn2)."\r\n";
		}
}
$conn2->close();
<?php
$modules = $_GET['module'];
$data = ['book','staff','member','taker','return','add_book_data','edit_book_data'];
$book = ['book','add_book_data','edit_book_data'];
$module = isset($_GET['module']) ? $_GET['module'] : '';
$bookCode = isset($_GET['book']) ? $_GET['book'] : '';
$staffId = isset($_GET['staff']) ? $_GET['staff'] : '';
$memberId = isset($_GET['member']) ? $_GET['member'] : '';
$takerId = isset($_GET['taker']) ? $_GET['taker'] : '';
$bookId = isset($_GET['bookId']) ? $_GET['bookId'] : '';
$returnId = isset($_GET['return']) ? $_GET['return'] : '';

//Title
if($modules=="book"){
    $title = "Book Data";
} elseif ($modules=="staff") {
    $title = "Staff Data";
}  elseif ($modules=="member") {
    $title = "Member Data";
}  elseif ($modules=="taker") {
    $title = "Taker Data";
}  elseif ($modules=="return") {
    $title = "Return Data";
} elseif ($modules=="report") {
    $title = "Report";
} 

elseif ($modules=="add_book_data") {
    $title = "Add Book";
} elseif ($module === 'edit_book' && !empty($bookCode)) {
    $title = "Edit Book";
}

elseif ($modules=="add_staff_data") {
    $title = "Add Staff";
} elseif ($module === 'edit_staff' && !empty($memberId)) {
    $title = "Edit Staff";
} 

elseif ($modules=="add_member_data") {
    $title = "Add Member";
} elseif ($module === 'edit_member' && !empty($memberId)) {
    $title = "Edit Member";
} 


elseif ($modules=="add_taker_data") {
    $title = "Add Taker";
} elseif ($module === 'edit_taker' && !empty($takerId)) {
    $title = "Edit Taker";
} elseif ($module === 'taker_detail' && !empty($takerId)) {
    $title = "Taker Detail";
} elseif ($module === 'add_taker_book' && !empty($takerId)) {
    $title = "Add Taker Book";
} elseif ($module === 'edit_taker_book' && !empty($takerId) && !empty($bookId)) {
    $title = "Edit Taker Book";
} 


elseif ($modules=="add_return_data") {
    $title = "Add Return";
} elseif ($module === 'edit_return' && !empty($returnId)) {
    $title = "Edit Return";
} 


else {
    $title = "Dashboard";
}

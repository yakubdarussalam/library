<?php
// Menerima parameter 'module' dan 'book' dari URL
$module = isset($_GET['module']) ? $_GET['module'] : '';
$bookCode = isset($_GET['book']) ? $_GET['book'] : '';
$staffId = isset($_GET['staff']) ? $_GET['staff'] : '';
$memberId = isset($_GET['member']) ? $_GET['member'] : '';
$takerId = isset($_GET['taker']) ? $_GET['taker'] : '';
$bookId = isset($_GET['bookId']) ? $_GET['bookId'] : '';
$returnId = isset($_GET['return']) ? $_GET['return'] : '';
$returnDetail = isset($_GET['return_detail']) ? $_GET['return_detail'] : '';

if($_GET['module']=="book"){
    include "data/book.php";
} else if ($_GET['module'] == "add_book_data") {
    include "module/book/add_book.php";
} else if ($module === 'edit_book' && !empty($bookCode)) {
    $Code = $_GET['book']; // Ambil nilai 'book' dari URL
    include "module/book/edit_book.php";
} else if($module === 'delete_book' && !empty($bookCode)){
    include "module/book/delete_book_action.php";
}

else if($_GET['module']=="staff"){
    include "data/staff.php";
} else if ($_GET['module'] == "add_staff_data") {
    include "module/staff/add_staff.php";
} else if ($module === 'edit_staff' && !empty($staffId)) {
    $Staff = $_GET['staff']; // Ambil nilai 'book' dari URL
    include "module/staff/edit_staff.php";
} else if($module === 'delete_staff' && !empty($staffId)){
    include "module/staff/delete_staff_action.php";
}

else if($_GET['module']=="member"){
    include "data/member.php";
} else if ($_GET['module'] == "add_member_data") {
    include "module/member/add_member.php";
} else if ($module === 'edit_member' && !empty($memberId)) {
    $Member = $_GET['member']; // Ambil nilai 'book' dari URL
    include "module/member/edit_member.php";
} else if($module === 'delete_member' && !empty($memberId)){
    include "module/member/delete_member_action.php";
}

else if($_GET['module']=="taker"){
    include "data/taker.php";
} else if ($_GET['module'] == "add_taker_data") {
    include "module/taker/add_taker.php";
} else if ($module === 'edit_taker' && !empty($takerId)) {
    $Taker = $_GET['taker']; // Ambil nilai 'book' dari URL
    include "module/taker/edit_taker.php";
} else if ($module === 'taker_detail' && !empty($takerId)) {
    $Taker = $_GET['taker']; // Ambil nilai 'book' dari URL
    include "module/taker/taker_detail.php";
} else if ($module === 'add_taker_book' && !empty($takerId)) {
    $Taker = $_GET['taker']; 
    include "module/taker/add_taker_book.php";
} else if($module === 'edit_taker_book' && !empty($takerId) && !empty($bookId)){
    $Taker = $_GET['taker'];
    $Book = $_GET['bookId'];
    include "module/taker/edit_taker_book.php";
} else if($module === 'delete_taker' && !empty($takerId)){
    include "module/taker/delete_taker_action.php";
} else if($module === 'delete_taker_book' && !empty($takerId) && !empty($bookId)){
    include "module/taker/delete_taker_book_action.php";
} 



else if($_GET['module']=="return"){
    include "data/return.php";
} else if ($_GET['module'] == "add_return_data") {
    include "module/return/add_return.php";
} else if ($module === 'edit_return' && !empty($returnId)) {
    $Return = $_GET['return']; // Ambil nilai 'book' dari URL
    include "module/return/edit_return.php";
} else if($module === 'delete_return' && !empty($returnId)){
    include "module/return/delete_return_action.php";
} else if ($module === 'return_detail' && !empty($returnId)) {
    $Return = $_GET['return']; // Ambil nilai 'book' dari URL
    include "module/return/return_detail.php";
} else if ($module === 'add_return_book' && !empty($returnId)) {
    $Return = $_GET['return']; 
    include "module/return/add_return_book.php";
} else if($module === 'edit_return_book' && !empty($returnId) && !empty($returnDetail)){
    $Return = $_GET['return'];
    $Detail = $_GET['return_detail'];
    include "module/return/edit_return_book.php";
} else if($module === 'delete_return_book' && !empty($returnId) && !empty($returnDetail)){
    include "module/return/delete_return_book_action.php";
} 


else if ($_GET['module'] == "report") {
    include "module/report/taker_report.php";
} else if ($_GET['module'] == "taker_book_report") {
    include "module/report/taker_book_report.php";
} 
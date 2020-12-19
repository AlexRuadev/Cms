<?php

// function to check if our query is working
function confirmQuery($result)
{
    global $con;

    if (!$result) {
        die("QUERY FAILED" . mysqli_error($con));
    }
}

function insert_categories()
{
    global $con;

    // CREATE new category
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}') ";

            $create_category_query = mysqli_query($con, $query);

            if (!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($con));
            }
        }
    }
}


function findAllCategories()
{
    global $con;
    // READING query (display all data)
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories_admin.php?edit={$cat_id}'>Edit</a></td>";
        echo "<td><a href='categories_admin.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";
    }
}


function deleteCategory()
{
    global $con;
    // DELETE query
    if (isset($_GET['delete'])) {
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
        $delete_query = mysqli_query($con, $query);
        // refresh the page
        header("Location: categories_admin.php");
    }
}

//////////////////////////////////// COMMENTS //////////////////////////////////////

function deleteComment()
{
    global $con;
    if (isset($_GET['delete'])) {
        $get_comment_id = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id = {$get_comment_id} ";
        $delete_query = mysqli_query($con, $query);

        header("Location: comments_admin.php");
    }
}

function approveComment()
{
    global $con;
    if (isset($_GET['approve'])) {
        $get_comment_id = $_GET['approve'];

        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $get_comment_id ";
        $approve_comment_query = mysqli_query($con, $query);

        header("Location: comments_admin.php");
    }
}

function unapproveComment()
{
    global $con;
    if (isset($_GET['unapprove'])) {
        $get_comment_id = $_GET['unapprove'];

        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $get_comment_id ";
        $unapprove_comment_query = mysqli_query($con, $query);

        header("Location: comments_admin.php");
    }
}

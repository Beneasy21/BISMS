<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/rexult/index.php'));
}
$id = $_GET['id'];

$rexult = Rexult::find_by_id($id);
$subjects = Subjects::find_by_id($rexult->subjects);
//$students = Student::find_by_id($rexult->studId);
$acadYr = AcadYr::find_by_id($rexult->acadYr);
$term = Term::find_by_id($rexult->term);

if($rexult == false){
  redirect_to(urlFor('/admin/rexult/index.php')); 
}

if(is_post_request()) {

  $result = $rexult->delete();
  $session->message('Result deleted Successfully.');
  redirect_to(urlFor('/admin/rexult/index.php'));
} else {
  //Display Form
}

?>

<?php $page_title = 'Delete Rexult'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h1>Delete Result</h1>
        </div>        
      </div>
      <div class="row">
        <div class="col">
          <a class="mr-2 back-link" href="<?php echo urlFor('/admin/rexult/index.php'); ?>">&laquo; Back to List</a> || 
          <a  href="<?php echo urlFor('/admin/rexult/new.php'); ?>"> Add New</a>
          <hr>
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col text-left">
          <p>Are you sure you want to delete the listed Result?</p>
          <p class="item"><?php echo h($subjects->subName) . " for " . $acadYr->acadYrName . '  '. $term->termName; ?></p>

          <form action="<?php echo urlFor('/admin/rexult/delete.php?id=' . h(u($rexult->id))); ?>" method="post">
            <div><input class="btn btn-primary" type="submit" name="commit" value="Delete Result" /></div>
          </form>
        </div>        
      </div>

    </div>      
  </div>
  </main>
    <?php include(SHARED_PATH .'/adminFooter.php');?>  
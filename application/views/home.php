<?php
if($this->session->userdata('userdata')){
    include 'includings/header.php';
}
else{
    include 'includings/headerGuest.php';
}
?>

<div class="container" style="margin-left: 20%">
    <?php if ($this->session->flashdata('msg')){ echo "<h4>".$this->session->flashdata('msg')."</h4>";} ?>

    <form class="form-inline" action="<?php echo (base_url("index.php/Home/search")) ?>" method = post>
        <div class="form-group">
            <label for="SearchBy">Search by</label>
            <select class="form-control" name="searchId" size="small">
                <option value="*">All</option>
                <option value="display_name">Person</option>
                <option value="category">Category</option>
                <option value="location">Location</option>
            </select>
        </div>
        <div class="form-group" >
            <label for="value">Value</label>
            <input class="form-control" name="searchValue" placeholder="Value">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
</div>

<hr>

<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12" style="margin-left: 20%">
    <?php
    if (empty($query)) {
        echo "<h3>No Posts</h3>";
    }else{
        foreach ($query as $service ) { ?>
            <div class="panel panel-primary">
                <div class="panel-heading" style="height: 4em"><img src=""><a style="font-size: large" href="<?php echo (base_url("index.php/Home/friends")) ?>"><?php  echo $service->display_name; ?></a></div>
                <div class="panel-body">
                    <h3><?php  echo $service->title; ?></h3>
                    <p id="details"><?php  echo $service->description; ?></p>
                    <p id="contact_numer"><?php  if($service->mobile_number){echo "Contact Number:    ".($service->mobile_number);} ?></p>
                    <p id="contact_numer"><?php  if($service->location){echo "Location:    ".($service->location);} ?></p>
                    <span id="quantity"><?php  if($service->quantity){echo "Quantity";} ?></span> :
                    <span style="color : #0B779B;">
                            <?php
                            $str = "0".$service->quantity;
                            $parts = str_split($str, 3);
                            echo $service->quantity;
                            ?> |
                            </span>
                    </span>
                    <span id="cat">Category</span> :
                    <span style="color : #0B779B;"><?php  echo $service->category; ?></span>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i><span class="glyphicon glyphicon-thumbs-up"></span></button>
                    <button type="button" class="btn btn-info btn-sm"><i class="fa fa-comment"></i>  Comment</button>
                </div>
            </div>
        <?php } }?>
</div>

<?php include 'includings/footer.php' ?>

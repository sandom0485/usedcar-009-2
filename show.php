<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Show Car all</h1>
    </div>
</div> 
<div class="row">
<?php
    if(isset($_SESSION['id'])){
    ?>
    <div class="col-lg-12">
    <p align="right">
        <a href="index.php?menu=insert" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add a car</a></p>
    </div>
    <?php
    }
    ?>
    <div class="container">
            <div class="row">
            <?php
                $sql = "SELECT * FROM car ORDER BY id";
                $result = $conn->query($sql);
                if(!$result){
                    echo "Error during data retrieval";
                }
                else{
                    //fetch data
                    while($prd = $result->fetch_object()){
                        ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-sx-12">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $prd->carpic ?>"alt="">
                            </a>
                            <div class="caption">
                                <h3><?php echo $prd->brand; ?></h3>
                                <p><?php  echo $prd->model; ?></p>
                                <p><?php echo $prd->modelYear;?></p>
                                <p><?php  echo $prd->color; ?></p>
                                <p><?php  echo $prd->province; ?></p>
                                <p><?php  echo $prd->price; ?> บ.</p>
                                <p>
                            </div>
                                <?php
                                if(isset($_SESSION['id'])){
                                ?>
                                    <a href="index.php?menu=edit&pid=<?php echo $prd->id ?>" class="btn btn-warning"><i class="glyphicon glyphicon-road"> Edit</i></a>
                                    <a href="delete.php?pid=<?php echo $prd->id ?>" class="btn btn-danger lnkDelete"><i class="glyphicon glyphicon-trash"> Delete</i></a>
                                </p>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
            <?php
                    }
                }
            ?>
        </div>
        <script>
                            $(document).ready(function(){
                                $(".lnkDelete").click(function(){
                                    return confirm("Confirm Delete?");
                                });
                            });
                            </script>
    </div>
</div>
<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">HomePage</div>
            <div class="card-body">
               
                <p>Steps needs to follow to setup in your end.</p>
                <p>1. After install laravel successfully.</p>
                <p>2. Copy the code into the folder anywhere</p>
                <p>3. Create database name 'supplier'</p>
                <p>4. Run command 'php artisan migrate'</p>
                <p>5. Run command 'php artisan db:seed'</p>
                <!-- <p>6. Also run 'php artisan db:seed --class=UserSeeder'</p>
                <p>7. Also run 'php artisan db:seed --class=LoanDetailSeeder'</p> -->
                <p>8. Run the command 'php artisan serve'</p>
                <p>9. Then oprn url 'http://127.0.0.1:8000/' </p>
                
                
               
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center mt-5">
    <div class="col-md-11">
    <button class='btn btn-primary processbtn'>Fetch Data</button>
        <div class="card">
            <div class="card-header">(A) All products along with their category names and supplier names.</div>
            <div class="card-body" style="overflow-x:auto;">
               

                <table class="table table-bordered" id="mytable1" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ProductName</th>
                            <th scope="col">CategoryName</th>
                            <th scope="col">SupplierName</th>
                        </tr>
                    </thead>
                    
                </table>
                <span id="msg">**Note:- Please click the Fetch button**</span>
            </div>
        </div>

        <hr>

        <div class="card">
            <div class="card-header">(B) All products along with their prices, including products that do not have prices.</div>
            <div class="card-body" style="overflow-x:auto;">
                <table class="table table-bordered" id="table2" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ProductName</th>
                            <th scope="col">ProductPrice</th>
                        </tr>
                    </thead>
                    
                </table>
                <span id="msg">**Note:- Please click the Fetch button**</span>
            </div>
        </div>

        <hr>

        
        <div class="card">
            <div class="card-header">(C) All products, their category names, supplier names, and their current prices (do not show the ones that do not have a price.</div>
            <div class="card-body" style="overflow-x:auto;">
                <table class="table table-bordered" id="thirdTable" >
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                            <th scope="col">ProductName</th>
                            <th scope="col">CategoryName</th>
                            <th scope="col">SupplierName</th>
                            <th scope="col">Price</th>
                           
                            
                        </tr>
                    </thead>
                    
                </table>
                <span id="msg">**Note:- Please click the Fetch button**</span>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">(D) The total number of products and the average value of products for each supplier.</div>
            <div class="card-body" style="overflow-x:auto;">
                <table class="table table-bordered" id="fourthTable" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">SupplierName</th>
                            <th scope="col">TotalProduct</th>
                            <th scope="col">AveragePrice</th>
                        </tr>
                    </thead>
                    
                </table>
                <span id="msg">**Note:- Please click the Fetch button**</span>
            </div>
        </div>
    </div>    
</div>
</div>
    
<?php $__env->stopSection(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

$(function() {
    $('.processbtn').click(function(){
         mytable();
    });

    function mytable(){
        $("#mytable1 > tbody").html("");
        $("#table2 > tbody").html("");
        $('#thirdTable > tbody').html("");
        $('#fourthTable > tbody').html("");
        $("#msg").html('');
        $.ajax({
               type:'POST',
               url:"<?php echo e(route('tableOne')); ?>",
               data: {"_token": "<?php echo e(csrf_token()); ?>"},
               success:function(data) {
                    $.each(data.table1, function(key, value){
                        $("#mytable1").append(
                            "<tbody><td>"+key+"</td><td>"+value.product_name+"</td><td>"+value.category_name+"</td><td>"+value.supplier_name+"</td></tr></tbody>"
                        );
                                  
                    });

                    $.each(data.table2, function(key, value){
                        $("#table2").append(
                            "<tbody><td>"+key+"</td><td>"+value.product_name+"</td><td>"+value.price+"</td></tr></tbody>"
                        );
                                  
                    });


                    $.each(data.table3, function(key, value){
                        $("#thirdTable").append(
                            "<tbody><td>"+key+"</td><td>"+value.product_name+"</td><td>"+value.category_name+"</td><td>"+value.supplier_name+"</td><td>"+value.price+"</td></tr></tbody>"
                        );
                                  
                    });

                    $.each(data.table4, function(key, value){
                        $("#fourthTable").append(
                            "<tbody><td>"+key+"</td><td>"+value.supplier_name+"</td><td>"+value.total_product+"</td><td>"+value.price+"</td></tr></tbody>"
                        );
                                  
                    });

               }
        });
    }

   
});
</script>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\msr\SupplierChain\resources\views\home.blade.php ENDPATH**/ ?>
<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
?>

<!--DASHBOARD AREA-->
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <span>WELCOME TO QSDECOR MANAGEMENT</span>
            <img src="/Resource/img/profile-1.jpg" alt="">
        </div>

        <div class="boddyy">
            <div class="container">
                <div class="title">Add New Order</div>

                <form action="#">
                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Product Name</span>
                            <input list="product_list" name="product_name">
                            <datalist id="product_list">
                                <option value="Sofa">Sofa</option>
                                <option value="Giuong">Giuong</option>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Sell Chanel</span>
                            <input list="chanel_list" name="chanel">
                            <datalist id="chanel_list">
                                <option value="Facebook">Facebook</option>
                                <option value="Cho Tot">Cho Tot</option>
                                <option value="Zalo">Zalo</option>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Collaborator</span>
                            <input list="collab_list" name="collab">
                            <datalist id="collab_list">
                                <option value="1">Tran Dinh Duy</option>
                                <option value="2">Tran Dinh Van</option>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Sell Price</span>
                            <input type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Shipping Fee</span>
                            <input type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input type="text" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Deposit</span>
                            <input type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Address</span>
                            <input type="text" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Others Fee</span>
                            <input type="text"required>
                        </div>
                        
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"></textarea>
                    </div>
                    <div class="button">
                        <input class="btn btn-primary" type="submit" value="ADDING">
                    </div>
                </form>
                
            </div>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>
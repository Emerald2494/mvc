<nav id="sidebar">
        <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo URLROOT; ?>/public/images/logo.jpg);"></a>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                        <a href="<?php echo URLROOT;?>/expenses/create">Add New</a>
                </li>

                <li class="active">
                <a href="#incomeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Income</a>
                <ul class="collapse list-unstyled" id="incomeSubmenu">
                    <li>
                        <a href="<?php echo URLROOT;?>/incomes">View All</a>
                    </li>
                   
                   
                </ul>
                </li>
                
                <li>
                <a href="#expenseSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Expenses</a>
                <ul class="collapse list-unstyled" id="expenseSubmenu">
                    <li>
                        <a href="<?php echo URLROOT;?>/expenses">View All</a>
                    </li>
                   
                    
                </ul>

                <li>
                <a href="#categorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category</a>
                <ul class="collapse list-unstyled" id="categorySubmenu">
                    <li>
                        <a href="<?php echo URLROOT;?>/categories/">View All</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/categories/create">Add New</a>
                    </li>
                    
                </ul>

                </li>
                <li>
                <a href="#">Setting</a>
                </li>
                <li>
                <a href="#">Contact Us</a>
                </li>
            </ul>

        <div class="footer">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>

    </div>
</nav>
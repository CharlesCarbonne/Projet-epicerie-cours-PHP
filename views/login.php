<?php
//use Entity\Product;
include __DIR__ . '/partials/header.php'; ?>
    <form class="col-md-6 offset-3"  method="POST">
        <div class="form-group">
            <label>Login</label>
            <input name="login" type="text" class="form-control"
                   placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php
include __DIR__ . '/partials/footer.php'; ?>
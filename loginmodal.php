

<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginmodalLabel">login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Name</label> -->
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="mb-4">
                        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                        <input type="password" class="form-control" name="password" placeholder=" password">
                    </div>
                    <input type="submit" value=submit>
                </form>

            </div>
        </div>
    </div>
</div>
<form action="./fakerouter.php?ctrl=user&meth=register" method="post" enctype="multipart/form-data">
    <div>
        <input type="text" name="nom" placeholder="Nom">
        <span class="error"></span>
    </div>
    <div>
        <input type="text" name="email" placeholder="Email">
        <span class="error"></span>
    </div>
    <div>
        <input type="text" name="pwd" placeholder="Password">
        <span class="error"></span>
    </div>
    <div>
        <input type="text" name="confpwd" placeholder="Confirm password">
        <span class="error"></span>
    </div>
    <div>
        <input type="file" name="avatar">
        <span class="error"></span>
    </div>
    <div>
        <input type="submit" name="submit" value="Register">
        <span class="error"></span>
    </div>
</form>

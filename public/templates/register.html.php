<style>
    form {
        padding: 1rem;
        border: 0.1rem solid lightgray;
        background-color: #AAAAAA;
        width: fit-content;
        border-radius: 1rem;
    }

    input {
        background-color: lightgray;
        padding: 0.5rem;
        margin: 0.2rem 0;
        border: none;
    }

    input[type="submit"] {
        background-color: lightpink;
        padding: 0.5rem 2rem;
        border-radius: 0.5rem;
    }

    input[type="submit"]:hover {
        background-color: lightcoral;
        cursor: pointer;
    }

    .validation-container {
        text-align: center;
        margin-top: 1rem;
    }
</style>

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
    <div class="validation-container">
        <input type="submit" name="submit" value="Register">
        <span class="error"></span>
    </div>
</form>

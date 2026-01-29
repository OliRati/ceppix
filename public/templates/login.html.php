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

<form action="./fakerouter.php?ctrl=user&meth=login" method="post">
    <div>
        <input type="text" placeholder="Email" name="email">
        <span class="error"></span>
    </div>
    <div>
        <input type="text" placeholder="Password" name="pwd">
        <span class="error"></span>
    </div>
    <div class="validation-container">
        <input type="submit" name="submit" value="Login">
        <span class="error"></span>
    </div>
</form>
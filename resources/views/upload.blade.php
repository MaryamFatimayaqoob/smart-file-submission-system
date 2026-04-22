<h2>Smart File Submission System</h2>

<form id="form" action="/upload" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Name -->
    <input type="text" id="name" name="name" placeholder="Name" required minlength="3">
    <span id="nameError" style="color:red"></span><br><br>

    <!-- Email -->
    <input type="email" id="email" name="email" placeholder="Email" required>
    <span id="emailError" style="color:red"></span><br><br>

    <!-- File -->
    <input type="file" id="file" name="file" required>
    <span id="fileError" style="color:red"></span><br><br>

    <button type="submit">Submit</button>
</form>

<!-- JavaScript Validation -->
<script>
document.getElementById("form").addEventListener("submit", function(e) {

    let valid = true;

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let file = document.getElementById("file").files[0];

    nameError.innerText = "";
    emailError.innerText = "";
    fileError.innerText = "";

    if (name.length < 3) {
        nameError.innerText = "Name must be at least 3 characters";
        valid = false;
    }

    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!pattern.test(email)) {
        emailError.innerText = "Enter valid email";
        valid = false;
    }

    if (!file) {
        fileError.innerText = "File required";
        valid = false;
    } else {
        let allowed = ["image/jpeg", "image/png", "application/pdf"];

        if (!allowed.includes(file.type)) {
            fileError.innerText = "Only JPG, PNG, PDF allowed";
            valid = false;
        }

        if (file.size > 2 * 1024 * 1024) {
            fileError.innerText = "Max file size is 2MB";
            valid = false;
        }
    }

    if (!valid) e.preventDefault();
});
</script>